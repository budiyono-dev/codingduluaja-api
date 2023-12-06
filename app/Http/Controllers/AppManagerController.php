<?php

namespace App\Http\Controllers;

use App\Constants\ResponseCode;
use App\Constants\TableName;
use App\Dto\TokenDto;
use App\Enums\ExpUnit;
use App\Exceptions\TokenException;
use App\Helper\ResponseHelper;
use App\Jwt\JwtHelper;
use App\Models\ClientApp;
use App\Models\ClientResource;
use App\Models\ExpiredToken;
use App\Models\Token;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AppManagerController extends Controller
{
    public function __construct(
        protected ResponseHelper $responseHelper,
        protected JwtHelper      $jwtHelper
    ) {
    }

    public function index(): View
    {
        // craete token for user with expired

        $userId = Auth::user()->id;
        $listApp = DB::table(TableName::CLIENT_APP . ' as cap')
            ->join(TableName::CONNECTED_APP . ' as conap', 'conap.client_app_id', '=', 'cap.id')
            ->join(TableName::CLIENT_RESOURCE . ' as cr', 'conap.client_resource_id', '=', 'cr.id')
            ->join(TableName::MASTER_RESOURCE . ' as mr', 'cr.master_resource_id', '=', 'mr.id')
            ->select(
                'cap.name as app_name',
                'mr.name as resource_name',
                'cap.id as client_app_id',
                'cr.id as client_resource_id'
            )
            ->where('cap.user_id', $userId)
            ->orderBy('mr.name')
            ->orderBy('cap.name')
            ->get();
        $expList = ExpiredToken::all();

        return view('page.app-manager', ['listApp' => $listApp, 'expList' => $expList]);
    }

    public function generateToken(Request $req): JsonResponse
    {
        Log::info('generateToken');
        try {
            DB::transaction(function () use ($req) {
                $validatedReq = $req->validate([
                    'client_app_id' => 'required',
                    'client_resource_id' => 'required',
                    'exp_id' => 'required'
                ]);

                $user = Auth::user();
                $userId = $user->id;
                $clientAppId = $validatedReq['client_app_id'];
                $clientResId = $validatedReq['client_resource_id'];
                $expId = $validatedReq['exp_id'];

                ClientResource::findOrFail($clientResId);
                $exp = ExpiredToken::findOrFail($expId);
                $clientApp = ClientApp::where('id', $clientAppId)
                    ->where('user_id', $userId)
                    ->firstOrFail();
                $identifier = "{$userId};{$clientAppId};{$clientResId}";
                $countActiveToken = Token::where('identifier', $identifier)->count();

                if ($countActiveToken >= 1) {
                    // throw new TokenException('you have active token');
                    throw TokenException::limit();
                }

                $sub = base64_encode($identifier);
                $fullname = "{$user->first_name} {$user->last_name}";
                $appKey = $clientApp->app_key;

                $expiredTime = $this->calculateExpiredToUnixTime($exp->exp_value, ExpUnit::tryFrom($exp->unit));

                $token = $this->jwtHelper->createToken($sub, $fullname, $appKey, $expiredTime);

                Token::create([
                    'token' => $token,
                    'identifier' => $identifier,
                    'exp' => $expiredTime
                ]);
                return response()->json(['token' => $token]);
            });
        } catch (ValidationException | TokenException $e) {
            Log::info("Error generateToken {$e->getMessage()}");
            $errors = [];
            if ($e instanceof ValidationException) {
                $errors = $e->validator->errors()->toArray();
            } elseif ($e instanceof TokenException) {
                $errors = ['token' => [$e->getMessage()]];
            }
            return $this->responseHelper
                ->validationError(
                    '',
                    ResponseCode::FORM_VALIDATION,
                    $errors
                );
        } catch (Exception $e) {
            Log::info("Error generateToken {$e->getMessage()}");
            return $this->responseHelper
                ->serverError(
                    '',
                    ['error' => $e->getMessage()]
                );
        }
    }

    public function showToken(string $clientResId, string $clientAppId): JsonResponse
    {
        try {
            $userId = Auth::user()->id;

            $identifier = "{$userId};{$clientAppId};{$clientResId}";
            $token = Token::where('identifier', $identifier)
                ->where('exp', '>=', time())
                ->get()
                ->map(fn ($t) => TokenDto::fromToken($t))
                ->first();

            if (is_null($token)) {
                return $this
                    ->responseHelper
                    ->notFound('', 'Token Not Found', ResponseCode::MODEL_NOT_FOUND);
            }

            Log::info("show token of user_id = {$userId}, c_app = {$clientAppId}, c_res = {$clientResId}");
            return $this
                ->responseHelper
                ->success('', 'succces get data token', ResponseCode::SUCCESS_GET_DATA, $token);
        } catch (Exception $e) {
            Log::info("Error showToken {$e->getMessage()}");
            return $this->responseHelper->serverError('', ['error' => $e->getMessage()]);
        }
    }

    public function revokeToken(Request $req): JsonResponse
    {
        Log::info('revokeToken');
        try {

            $validatedReq = $req->validate([
                'client_app_id' => 'required',
                'client_resource_id' => 'required'
            ]);

            $user = Auth::user();
            $userId = $user->id;
            $clientAppId = $validatedReq['client_app_id'];
            $clientResId = $validatedReq['client_resource_id'];

            $cRes = ClientResource::find($clientResId);
            if (is_null($cRes)) {
                return $this->tokenNotFoundError();
            }
            $cApp = ClientApp::where('id', $clientAppId)
                ->where('user_id', $userId)
                ->get();
            if (is_null($cApp)) {
                return $this->tokenNotFoundError();
            }

            $identifier = "{$userId};{$clientAppId};{$clientResId}";
            $token = Token::where('identifier', $identifier)->first();

            if (is_null($token)) {
                return $this->tokenNotFoundError();
            }
            DB::transaction(function () use ($token) {
                $token->delete();
            });

            return $this
                ->responseHelper
                ->success('', 'succces revoke token', ResponseCode::SUCCESS_REVOKE_TOKEN, null);
        } catch (Exception $e) {
            Log::info("Error revokeToken {$e->getMessage()}");
            return $this->responseHelper
                ->serverError(
                    '',
                    ['error' => $e->getMessage()]
                );
        }
    }

    private function tokenNotFoundError(): JsonResponse
    {
        return $this
            ->responseHelper
            ->notFound('', 'Token Not Found', ResponseCode::MODEL_NOT_FOUND);
    }

    private function calculateExpiredToUnixTime(int $expValue, ExpUnit $unit): int
    {
        $now = Carbon::now();
        $result = match ($unit) {
            ExpUnit::DAY => $now->addDays($expValue),
            ExpUnit::MONTH => $now->addMonths($expValue),
            ExpUnit::YEAR => $now->addYears($expValue),
            ExpUnit::HOUR => $now->addHours($expValue)
        };

        return $result->timestamp;
    }
}

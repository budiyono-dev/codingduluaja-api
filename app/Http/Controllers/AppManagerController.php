<?php

namespace App\Http\Controllers;

use App\Constants\TableNameConstant;
use App\Http\Requests\AddResourceRequest;
use App\Http\Requests\ConnectClientRequest;
use App\Http\Requests\CreateTokenRequest;
use App\Http\Requests\DisconnectClientRequest;
use App\Http\Requests\GenerateTokenRequest;
use App\Jwt\JwtHelper;
use App\Models\ClientApp;
use App\Models\ClientResource;
use App\Models\Token;
use App\Enums\ExpUnit;
use Illuminate\Contracts\View\View;
use App\Models\MasterResource;
use App\Models\ExpiredToken;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Helper\ResponseHelper;
use Exception;

class AppManagerController extends Controller
{
    public function __construct(
        protected ResponseHelper $responseHelper,
        protected JwtHelper $jwtHelper

    ) {
    }
    
    public function index(): View
    {
        // craete token for user with expired

        $userId = Auth::user()->id;
        $listApp = DB::table(TableNameConstant::CLIENT_APP.' as cap')
             ->join(TableNameConstant::CONNECTED_APP.' as conap', 'conap.client_app_id', '=', 'cap.id')
             ->join(TableNameConstant::CLIENT_RESOURCE.' as cr', 'conap.client_resource_id', '=','cr.id')
             ->join(TableNameConstant::MASTER_RESOURCE.' as mr', 'cr.master_resource_id', '=', 'mr.id' )
             ->select('cap.name as app_name', 'mr.name as resource_name',
                     'cap.id as client_app_id', 'cr.id as client_resource_id')
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

            $sub = base64_encode($userId.';'.$clientAppId.'.'.$clientResId);
            $fullname = $user->first_name.' '.$user->last_name;
            $appKey = $clientApp->app_key;

            $expiredTime = $this->calculateExpiredToUnixTime($exp->exp_value, ExpUnit::tryFrom($exp->unit));
            
            $token = $this->jwtHelper->createToken($sub, $fullname, $appKey, $expiredTime);

            Token::create([
                'token' => $token,
                'exp' => $expiredTime
            ]);
            return response()->json(['token' => $token]);
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->toArray();
            return $this->responseHelper->validationErrorResponse('CDA_R14', $errors);
        } catch (Exception $e) {
            return $this->responseHelper->serverErrorResponse(['error' => $e->getMessage()]);
        }
        
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

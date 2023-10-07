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
use Illuminate\Contracts\View\View;
use App\Models\MasterResource;
use App\Models\ExpiredToken;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AppManagerController extends Controller
{
    public function __construct(
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

    public function generateToken(GenerateTokenRequest $request): JsonResponse
    {
        $validatedReq = $request->validated();
        $user = Auth::user();
        $userId = $user->id;
        $clientAppId = $validatedReq['client_app_id'];
        $clientResId = $validatedReq['client_resource_id'];
        $expId = $validatedReq['exp_id'];

        ClientApp::findOrFail($clientAppId);
        ClientResource::findOrFail($clientResId);
        ExpiredToken::findOrFail($expId);


        $sub = base64_encode($userId.';'.$clientAppId.'.'.$clientResId);
        $name = $user->first_name.' '.$user->last_name;

        $appKey = ClientApp::
        dd($request);
        return response()->json(['token' => 'asd']);
    }
}

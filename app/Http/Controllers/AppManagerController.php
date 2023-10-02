<?php

namespace App\Http\Controllers;

use App\Constants\TableNameConstant;
use App\Http\Requests\AddResourceRequest;
use App\Http\Requests\ConnectClientRequest;
use App\Http\Requests\CreateTokenRequest;
use App\Http\Requests\DisconnectClientRequest;
use App\Http\Requests\GenerateTokenRequest;
use App\Jwt\JwtHelper;
use App\Models\AppClient;
use App\Models\ClientResource;
use Illuminate\Contracts\View\View;
use App\Models\MasterResource;
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
                     'cap.id as client_id', 'cr.id as resource_id')
             ->where('cap.user_id', $userId)
             ->orderBy('mr.name')
             ->orderBy('cap.name')
             ->get();
         //dd($listAppClient);

        return view('page.app-manager', ['listApp' => $listApp]);
    }

    public function generateToken(GenerateTokenRequest $request): JsonResponse
    {

        // craete token for user with expired
        $user = Auth::user();
        $username = $user->username;
        $applicationId = $request->validated()['applicationId'];
        
        dd($username, $applicationId);
        return response()->json(['token' => $this->jwtHelper->createToken()]);
    }
}

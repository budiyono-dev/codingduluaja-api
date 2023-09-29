<?php

namespace App\Http\Controllers;

use App\Constants\TableNameConstant;
use App\Http\Requests\AddResourceRequest;
use App\Http\Requests\ConnectClientRequest;
use App\Http\Requests\DisconnectClientRequest;
use App\Models\AppClient;
use App\Models\ClientResource;
use Illuminate\Contracts\View\View;
use App\Models\MasterResource;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AppManagerController extends Controller
{
    public function index(): View
    {
        // craete token for user with expired
        $user = Auth::user();
        $userId = $user->id;

        $listAppClient = AppClient::where('user_id', $userId)->get();

        $tbConnClient = TableNameConstant::CONNECTED_APP;
        $tbAppClient = TableNameConstant::CLIENT_APP;
        $userId = Auth::user()->id;

        $idResource = ClientResource::select('master_resource_id')->where('user_id', )->get()->toArray();
        $listResource = ClientResource::with('masterResource', 'connectedApp')->get();
        $listAppClient = DB::table($tbAppClient)
             ->join($tbConnClient, $tbConnClient.'.client_app_id', '=', $tbAppClient.'.id')
             ->select($tbAppClient.'.id', $tbAppClient.'.name')
             ->where($tbAppClient.'.user_id', $userId)
             ->get();
         dd($listAppClient);

        return view('page.app-manager');
    }
}

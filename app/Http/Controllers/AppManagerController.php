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

        $userId = Auth::user()->id;
        $listApp = DB::table(TableNameConstant::CLIENT_APP.' as ac')
             ->join(TableNameConstant::CONNECTED_APP.' as ca', 'ca.client_app_id', '=', 'ac.id')
             ->join(TableNameConstant::CLIENT_RESOURCE.' as cr', 'ca.client_resource_id', '=','cr.id')
             ->join(TableNameConstant::MASTER_RESOURCE.' as mr', 'cr.master_resource_id', '=', 'mr.id' )
             ->select('ac.name as app_name', 'mr.name as resource_name',
                     'ac.id as client_id', 'cr.id as resource_id')
             ->where('ac.user_id', $userId)
             ->orderBy('mr.name')
             ->orderBy('ac.name')
             ->get();
         //dd($listAppClient);

        return view('page.app-manager', ['listApp' => $listApp]);
    }
}

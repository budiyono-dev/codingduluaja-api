<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateAppClientRequest;
use App\Models\AppClient;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
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

        // dd($listAppClient);

        return view('page.app-manager');
    }
}

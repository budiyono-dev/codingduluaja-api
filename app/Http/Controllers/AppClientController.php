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

class AppClientController extends Controller
{
    public function index(): View
    {
        // craete token for user with expired
        $user = Auth::user();
        $userId = $user->id;

        $listAppClient = AppClient::where('user_id', $userId)->get();

        // dd($listAppClient);

        return view('page.app-client', ['listAppClient'=> $listAppClient]);
    }

    public function createApp(CreateAppClientRequest $req): RedirectResponse
    {
        DB::transaction(function () use ($req) {
            $validated = $req->validated();
            
            $userId = Auth::user()->id;
            
            $c = new AppClient();
            $c->user_id = $userId;
            $c->name = $validated['name'];
            $c->app_key = Str::replace('-', '', Str::uuid());

            $c->save();
        });

        return redirect()->route('page.appClient');
    }
}

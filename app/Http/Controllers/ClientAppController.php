<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateClientAppRequest;
use App\Models\ClientApp;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClientAppController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        $userId = $user->id;

        $listClientApp = ClientApp::where('user_id', $userId)->get();

        return view('page.client-app', ['listClientApp' => $listClientApp]);
    }

    public function createApp(CreateClientAppRequest $req): RedirectResponse
    {
        Log::info('Create Client App');
        DB::transaction(function () use ($req) {
            $validated = $req->validated();

            $userId = Auth::user()->id;

            $c = new ClientApp();
            $c->user_id = $userId;
            $c->name = $validated['name'];
            $c->app_key = Str::replace('-', '', Str::uuid());

            $c->save();
            Log::info($c);
        });

        return redirect()->route('page.clientApp');
    }

    public function delete(int $id): RedirectResponse
    {
        Log::info('Delete Client App : '.$id);
        DB::transaction(function () use ($id) {
            $clientApp = ClientApp::find($id);
            $clientApp->delete();
        });
        return redirect()->route('page.clientApp');
    }
}
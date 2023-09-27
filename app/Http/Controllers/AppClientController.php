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

class AppClientController extends Controller
{
    public function index(): View
    {
        // craete token for user with expired
        $user = Auth::user();
        $userId = $user->id;

        $listAppClient = AppClient::where('user_id', $userId)->get();

        // dd($listAppClient);

        return view('page.app-client', ['listAppClient' => $listAppClient]);
    }

    public function createApp(CreateAppClientRequest $req): RedirectResponse
    {
        Log::info('Create Client App');
        DB::transaction(function () use ($req) {
            $validated = $req->validated();

            $userId = Auth::user()->id;

            $c = new AppClient();
            $c->user_id = $userId;
            $c->name = $validated['name'];
            $c->app_key = Str::replace('-', '', Str::uuid());

            $c->save();
            Log::info($c);
        });

        return redirect()->route('page.appClient');
    }

    public function delete(int $id): RedirectResponse
    {
        Log::info('Delete Client App : '.$id);
        DB::transaction(function () use ($id) {
            $appClient = AppClient::find($id);
            $appClient->delete();
        });
        return redirect()->route('page.appClient');
    }
}

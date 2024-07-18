<?php

namespace App\Http\Controllers;

use App\Mail\TestSMPTP;
use App\Models\Configuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class AdminController
{
    public function pageMigration()
    {
        return view('page.admin.migration');
    }

    public function pageLogging()
    {
        return view('page.admin.logging');
    }

    public function index(string $id)
    {
        $value = config('cda.init_su_url');

        if (Schema::hasTable('configuration')) {
            $config = Configuration::where('group', 'admin')->where('key', 'su.url')->first();

            if (! is_null($config) && ! is_null($config['value']) && ! $config['value'] !== '') {
                $value = $config['value'];
            }
        }

        if ($value !== $id) {
            abort(404);
        }

        return view('page.super-user', ['id' => $id]);
    }

    public function refreshAdminConfig()
    {
        DB::transaction(function () {
            Log::info('[DEPLOYMENT] refrech id for admin console');
            $conf = Configuration::where('group', 'admin')->where('key', 'su.url')->first();
            if (is_null($conf)) {
                $conf = new Configuration();
                $conf->group = 'admin';
                $conf->key = 'su.url';
            }
            $conf->value = Str::random(32);
            $conf->save();
        });

        return 'key berhasil di update ';
    }

    public function sendTestMail()
    {
        Mail::to('budiyono.dev@gmail.com')->send(new TestSMPTP());
    }

    public function doAction(Request $req, string $id)
    {
        $vReq = $req->validate([
            'sel_action' => 'required|string',
            'sel_seed_class' => 'string',
        ]);
        $output = '';

        $action = $vReq['sel_action'];
        Log::info("[DEPLOYMENT] artisan comand run $action");

        if ($action === 'migrate:fresh') {
            $output = $this->migrateFresh();
        } elseif ($action === 'migrate') {
            $output = $this->migrateDB();
        } elseif ($action === 'down') {
            $output = $this->downApp();
        } elseif ($action === 'up') {
            $output = $this->upApp();
        } elseif ($action === 'seed') {
            $class = $vReq['sel_seed_class'];
            if (is_null($class) || $class === '') {
                $output = "class $class not found";
            } else {
                $output = $this->seedingClass($class);
            }
        } else {
            abort(404);
        }
        Log::info("[DEPLOYMENT] artisan comand run $output");

        return redirect()->route('page.su', ['id' => $id])->with('command-output', $output);
    }

    private function migrateFresh(): string
    {
        Artisan::call('migrate:fresh', [
            '--force' => true,
        ]);

        return Artisan::output();
    }

    private function migrateDB(): string
    {
        Artisan::call('migrate', [
            '--force' => true,
        ]);

        return Artisan::output();
    }

    private function downApp(): string
    {
        Artisan::call('down');

        return Artisan::output();
    }

    private function upApp(): string
    {
        Artisan::call('up');

        return Artisan::output();
    }

    private function seedingClass(string $class): string
    {
        Artisan::call('db:seed', [
            '--force' => true,
            '--class' => $class,
        ]);

        return Artisan::output();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Helper\ArtisanHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MigrationController extends Controller
{
    public function __construct(
        protected ArtisanHelper $artisanHelper,
    ) {}

    public function index()
    {
        return view('page.admin.migration');
    }

    public function doMigrate(Request $request)
    {
        $req = $request->validate([
            'selMigrate' => 'required|string',
        ]);

        $action = $req['selMigrate'];
        Log::info("[Migration] artisan comand run $action");

        if ($action === 'fresh') {
            $output = $this->artisanHelper->migrateFresh();
        } elseif ($action === 'migrate') {
            $output = $this->artisanHelper->migrate();
        } elseif ($action === 'rolback') {
            $output = $this->artisanHelper->rolback();
        } elseif ($action === 'status') {
            $output = $this->artisanHelper->migrateStatus();
        } else {
            abort(404);
        }

        Log::info("[DEPLOYMENT] artisan comand run $output");

        return redirect()->route('page.admin.migration')
            ->with('command-output', $output);
    }

    public function doSeed(Request $request)
    {
        $req = $request->validate([
            'selSeed' => 'required|string',
        ]);

        $output = $this->artisanHelper->seedingClass($req['selSeed']);

        return redirect()->route('page.admin.migration')
            ->with('command-output', $output);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Helper\ArtisanHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OptimizeController extends Controller
{
    public function __construct(
        protected ArtisanHelper $artisanHelper,
    ) {}

    public function index()
    {
        return view('page.admin.optimize');
    }

    public function optimize(Request $request)
    {
        $req = $request->validate([
            'selOptimize' => 'required|string|in:optimize,optimize_clear,token_hk',
        ]);

        $action = $req['selOptimize'];
        Log::info("[optimize.CONTROLLER] command run $action");

        if ($action === 'optimize') {
            $output = $this->artisanHelper->optimize();
        } elseif ($action === 'optimize_clear') {
            $output = $this->artisanHelper->optimizeClear();
        } elseif ($action === 'token_hk') {
            $output = $this->artisanHelper->tokenHK();
        } else {
            abort(404);
        }

        Log::info("[optimize.CONTROLLER] command run $output");

        return redirect()->route('admin.optimize')
            ->with('command-output', $output);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Helper\ArtisanHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SiteController extends Controller
{
    public function __construct(
        protected ArtisanHelper $artisanHelper
    ) {}

    public function index()
    {
        return view('page.admin.site');
    }

    public function down()
    {
        $secret = Str::random(32);
        $this->artisanHelper->down($secret);
        Log::info("[SITE] down site $secret");

        return redirect->route('/'.$secret);
    }

    public function up()
    {
        $this->artisanHelper->up();

        return redirect()->route('page.admin.site')
            ->with('status', 'website is running|success');
    }
}

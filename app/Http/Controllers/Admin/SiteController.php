<?php

namespace App\Http\Controllers\Admin;

use App\Helper\ArtisanHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SiteController extends Controller
{
    public function __construct(
        protected ArtisanHelper $artisanHelper
    ) {}

    public function index()
    {

        return view('page.admin.site', [
            'isDown' => $this->isSiteDown(),
        ]);
    }

    private function isSiteDown(): bool
    {
        $value = Storage::disk('local')->path('');
        $basePath = str_replace('app'.DIRECTORY_SEPARATOR, '', $value);
        $finalPath = $basePath.implode(DIRECTORY_SEPARATOR, ['framework', 'down']);

        return File::exists($finalPath);
    }

    public function down()
    {
        if ($this->isSiteDown()) {
            return redirect->route('page.admin.ste')->with('status', 'site alreaddy down');
        }
        $secret = Str::random(32);
        $this->artisanHelper->down($secret);
        Log::info("[SITE] down site ($secret)");

        return redirect('/'.$secret); //->route('/'.$secret);
    }

    public function up()
    {
        if (! $this->isSiteDown()) {
            return redirect->route('page.admin.ste')->with('status', 'site alreaddy up');
        }
        $this->artisanHelper->up();
        Log::info('[SITE] up site');

        return redirect()->route('page.admin.site')
            ->with('status', 'website is running|success');
    }
}

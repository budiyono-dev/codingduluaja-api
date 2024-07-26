<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class LoggingController extends Controller
{
    public function index()
    {
        return view('admin.logging');
    }

    public function doDownloadLogs()
    {
        $dirUser = implode(DIRECTORY_SEPARATOR, ['logs', 'laravel.log']);
        $path = Storage::disk('local')->path($dirUser);
        $finalPath = str_replace(DIRECTORY_SEPARATOR.'app', '', $path);

        return response()->download($finalPath);
    }
}

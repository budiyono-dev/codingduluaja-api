<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class LoggingController extends Controller
{
    public function index()
    {
        return view('page.admin.logging');
    }

    public function doDownloadLogs()
    {
        $dirUser = implode(DIRECTORY_SEPARATOR, ['logs', 'laravel.log']);
        $storagePath = storage_path($dirUser);
        
        return response()->download($storagePath);
    }
}

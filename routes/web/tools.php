<?php

use App\Http\Controllers\ToolsController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth', 'verified', 'menuAccess'],
    'controller' => ToolsController::class,
    'prefix' => '/app/tools',
], function () {
    Route::get('/base64', 'base64')->name('page.tools.base64');

});

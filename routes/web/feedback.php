<?php

use App\Http\Controllers\Feedback\ReportController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth', 'verified', 'menuAccess'],
    'controller' => ReportController::class,
    'prefix' => '/app/feedback',
], function () {
    Route::get('/report', 'index')->name('feedback.report');
    Route::post('/report', 'post')->name('feedback.report.post');

});

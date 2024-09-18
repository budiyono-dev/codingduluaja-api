<?php

// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/example', function () {
//     return view('example');
// });

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// breeze
require __DIR__.'/auth.php';

require __DIR__.'/web/admin.php';
require __DIR__.'/web/app.php';
require __DIR__.'/web/doc.php';
require __DIR__.'/web/res.php';
require __DIR__.'/web/tools.php';
require __DIR__.'/web/feedback.php';
require_once __DIR__.'/../app/Domain/Raport/Routes/web.php';

/**
 * Public Route
 */
Route::view('/', 'page.landing-page')->name('page.langind-page');

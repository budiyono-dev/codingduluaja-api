<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientAppController;
use App\Http\Controllers\AppResourceController;
use App\Http\Controllers\AppManagerController;

Route::middleware('auth')->group(function () {
    Route::view('/', 'page.welcome')->name('page.dashboard');
    Route::get('/home', function () {
        return 'this is home route';
    });

    Route::get('/navbar', function () {
        return view('navbar');
    });

    Route::get('/get-data', function () {
        return trans('validation.required', ['field' => 'first name', 's' => 'skdjbfksjd']);
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('do.logout');
    // Route::post('/create-token', [AuthController::class, 'createToken'])->name('do.createToken');

    Route::get('/app-resource', [AppResourceController::class, 'index'])->name('page.appResource');
    Route::post('/app-resource', [AppResourceController::class, 'addResource'])->name('do.addResource');
    Route::post('/app-resource/delete/{id}', [AppResourceController::class, 'delete'])->name('do.deleteResource');
    Route::post('/app-resource/connect/{id}', [AppResourceController::class, 'connectClient'])->name('do.connectClient');
    Route::post('/app-resource/disconnect/{id}', [AppResourceController::class, 'disconnectClient'])->name('do.disconnectClient');
        
    Route::get('/app-client', [ClientAppController::class, 'index'])->name('page.clientApp');
    Route::post('/app-client', [ClientAppController::class, 'createApp'])->name('do.createApp');
    Route::post('/app-client/delete/{id}', [ClientAppController::class, 'delete'])->name('do.deleteClientApp');
    
    Route::get('/app-manager', [AppManagerController::class, 'index'])->name('page.appManager');
    Route::post('/app-manager/create-token', [AppManagerController::class, 'generateToken'])->name('do.generateToken');
});

Route::middleware('non-auth')->group(function () {
    Route::view('/login', 'page.login')->name('page.login');
    Route::view('/register', 'page.register')->name('page.register');
    Route::post('/register', [AuthController::class, 'register'])->name('do.register');
    Route::post('/login', [AuthController::class, 'login'])->name('do.login');
});


Route::get('/user/check-username/{username}', [AuthController::class, 'checkUsername'])->name('checkUsername');
Route::get('do-something', function(){
        $menu1 = \App\Models\MenuParent::where('sequence', 1)->first();
        
        $subMenus = \App\Models\MenuItem::where('menu_parent_id', $menu1->id);
        $subMenus->delete();
    return "OK";
});

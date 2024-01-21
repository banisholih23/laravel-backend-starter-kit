<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthAdminController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\Auth\UserAuthController;
use App\Http\Controllers\User\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('admin')->group(function () {

    Route::post('/login', [AuthAdminController:: class, 'adminLogin'])->name('admin.login');
    
    Route::group(['middleware' => 'auth:admin-api'], function () {
        Route::post('register', [AuthAdminController::class, 'register']);
        Route::get('list', [AdminController::class, 'list']);
        Route::post('logout', [AuthAdminController::class, 'logout']);
    });
});

Route::prefix('user')->group(function () {

    Route::post('/login', [UserAuthController:: class, 'userLogin'])->name('user.login');
    
    Route::group(['middleware' => 'auth:user-api'], function () {
        Route::post('register', [UserAuthController::class, 'register']);
        Route::get('list', [UserController::class, 'list']);
        Route::post('logout', [UserAuthController::class, 'logout']);
    });
});



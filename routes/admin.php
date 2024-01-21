<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthAdminController;
use App\Http\Controllers\Admin\AdminController;

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

Route::post('admin/login',[AuthAdminController::class, 'adminLogin'])->name('admin.login');

Route::group( ['prefix' => 'admin','middleware' => ['auth:admin-api','scopes:admin'] ],function(){

    Route::get('dashboard',[AuthAdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('list',[AdminController::class, 'list'])->name('admin.dashboard');
    Route::get('list/kelurahan',[AdminController::class, 'kelurahan']);
    Route::get('list/kecamatan',[AdminController::class, 'kecamatan']);
    Route::get('list/kabupaten',[AdminController::class, 'kabupaten']);
    Route::get('list/provinsi',[AdminController::class, 'provinsi']);
}); 


<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::view('/', 'welcome')->name('login');

Route::get('/{provider}/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('{provider}/callback', [AuthController::class, 'handleCallback'])->name('auth.callback');

Route::middleware(['auth'])->group(function(){
    Route::get('admin', [DashboardController::class, 'index'])->name('admin');
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
});

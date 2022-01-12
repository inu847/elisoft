<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('user')->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('dasboard');
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
    
    Route::get('product-api', [DashboardController::class, 'api'])->name('dashboard.api');
    Route::get('edit/{id}', [AuthController::class, 'edit'])->name('auth.edit');
    Route::post('update/{id}', [AuthController::class, 'update'])->name('auth.update');
    Route::post('delete/{id}', [AuthController::class, 'delete'])->name('auth.delete');
});

Route::get('login', [AuthController::class, 'todoLogin'])->name('auth.todoLogin');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('register', [AuthController::class, 'todoRegister'])->name('auth.todoRegister');
Route::post('register', [AuthController::class, 'register'])->name('auth.register');
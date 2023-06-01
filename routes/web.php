<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Login Routes
Route::get('admin/login', [\App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('admin.login.submit');

// Admin Registration Routes
Route::get('admin/register', [\App\Http\Controllers\Admin\AuthController::class, 'showRegistrationForm'])->name('admin.register');
Route::post('admin/register', [\App\Http\Controllers\Admin\AuthController::class, 'register'])->name('admin.register.submit');

Route::get('/invoice/{id}', [\App\Http\Controllers\InvoiceController::class, 'generateInvoice'])->name('invoice.generate');


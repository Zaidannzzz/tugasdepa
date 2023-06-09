<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('admin/dashboard', [\App\Http\Controllers\UserController::class, 'index'])->name('admin.dashboard');
Route::get('admin/customerservice', [\App\Http\Controllers\CustservController::class, 'show'])->name('admin.custservadmin');
// Route::get('admin/invoice', [\App\Http\Controllers\PhotoController::class, 'show'])->name('admin.invoiceadmin');

// Admin Registration Routes
Route::get('admin/register', [\App\Http\Controllers\Admin\AuthController::class, 'showRegistrationForm'])->name('admin.register');
Route::post('admin/register', [\App\Http\Controllers\Admin\AuthController::class, 'register'])->name('admin.register.submit');

Route::delete('admin/destroy/{id}',[App\Http\Controllers\UserController::class, 'destroy'])->name('admin.destroy');

Route::resource('/customerservice', \App\Http\Controllers\CustservController::class);

Route::post('/invoice', [\App\Http\Controllers\InvoiceController::class, 'generateInvoice'])->name('invoice');

Route::get('/tentangkami', [\App\Http\Controllers\TentangkamiController::class, 'index'])->name('kami');
Route::get('/visimisi', [\App\Http\Controllers\VisimisiController::class, 'index'])->name('visimisi');

// Route::get('/bukti/create', [\App\Http\Controllers\PhotoController::class, 'create'])->name('bukti.create');
// Route::post('/bukti', [\App\Http\Controllers\PhotoController::class, 'store'])->name('bukti.store');

Route::resource('/bukti', \App\Http\Controllers\PhotoController::class);

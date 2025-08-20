<?php

use App\Http\Controllers\BillingController;
use App\Http\Controllers\monthlyreportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('loginpost');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('registerpost');



Route::resource('clients', ClientController::class);
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/create_clients', [ClientController::class, 'create'])->name('create_clients');
Route::post('/clients/store', [ClientController::class, 'store'])->middleware('auth')->name('saveStore');
Route::get('/clients/{id}/edit_clients', [ClientController::class, 'edit'])->name('edit_clients');
Route::put('/clients/{id}', [ClientController::class, 'update'])->name('update');

Route::resource('billings', BillingController::class);
Route::get('/billings', [BillingController::class, 'index'])->name('billings.index');
Route::get('/create_billing', [BillingController::class, 'create'])->name('create_billing');
Route::post('/billings', [BillingController::class, 'store'])->middleware('auth')->name('billing.store');
Route::get('/billings/{id}/edit_billing', [BillingController::class, 'edit'])->name('edit_billing');
Route::put('/billings/{id}', [BillingController::class, 'update'])->name('update.billing');
Route::delete('/billings', [BillingController::class, 'destroy'])->name('destroy');
Route::get('/billings/{id}', [BillingController::class, 'showReceipt'])->name('billings.showReceipt');

Route::get('/home', [ClientController::class, 'user'])->middleware('auth')->name('main.home');

Route::get('/monthly_report', [monthlyreportController::class, 'monthlyreport'])->name('monthly_report');
Route::post('/monthly_report', [MonthlyReportController::class, 'monthlyreport'])->name('monthlyreport.monthly_report');
Route::post('/monthly_report', [monthlyreportController::class, 'generateMonthlyReport'])->name('monthlyreport.monthly_report');








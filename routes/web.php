<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DebtController;
use App\Http\Controllers\DebtPagesController;
use App\Http\Controllers\TransactionController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'confirm']);

Route::get('email/verify', [App\Http\Controllers\Auth\VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [App\Http\Controllers\Auth\VerificationController::class, 'resend'])->name('verification.resend');

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('stock/managment/{id}', [App\Http\Controllers\StockController::class, 'stock'])->name('stock');
Route::get('stock/products/{id}', [App\Http\Controllers\StockController::class, 'products'])->name('stock.product');
Route::get('cart/{id}', [CartController::class, 'index']);
Route::post('add_to_cart/{id}', [CartController::class, 'addToCart'])->name('add_to_cart');
Route::post('decrement', [CartController::class, 'decrement'])->name('decrement');
Route::post('increment', [CartController::class, 'increment'])->name('increment_cart');
Route::post('delete_cart_item', [CartController::class, 'deleteCartItem'])->name('delete_cart_item');
Route::get('print_invoice/{id}',[TransactionController::class,'printInvoice'])->name('print_invoice');
Route::resource('payments/{id}/',App\Http\Controllers\TransactionController::class);
Route::get('/get_transaction', [TransactionController::class, 'getTransaction'])->name('get_transaction');
Route::get('/stock_history/{id}', [TransactionController::class, 'stockHistory'])->name('get_transaction');
Route::get('/create_debt/{id}',[DebtController::class,'create']);
Route::post('debt_store/{id}',[DebtController::class, 'store']);
Route::get('/debt_history/{id}', [DebtController::class, 'index'])->name('get_transaction');
Route::get('debt_cart/{id}', [DebtPagesController::class,'getProducts']);
Route::post('addtoDebt',[DebtPagesController::class, 'addtoDebt']);
Route::get('debt_preview',[DebtPagesController::class, 'debtPreview']);
Route::get('settle/{id}',[DebtPagesController::class,'settle']);
Route::resource('clients/{nom}',App\Http\Controllers\ClientsController::class);


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\login\LoginController;
use App\Http\Controllers\login\LogoutController;
use App\Http\Controllers\register\RegisterController;
use App\Http\Controllers\customers\CustomerLoginController;
use App\Http\Controllers\customers\CustomersLogoutController;
use App\Http\Controllers\customers\CustomerDashboardController;


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


/* Home Page */

Route::get('/', [HomeController::class, 'home'])->name('home');

/* About Page */

Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/pin', [HomeController::class, 'pin'])->name('pin');
Route::post('/pin', [HomeController::class, 'storepin']);

/* Login */

Route::get('/auth/login', [LoginController::class, 'index'])->name('auth.login')->middleware('guest');
Route::post('/auth/login', [LoginController::class, 'login'])->middleware('guest');


/* Register */

Route::get('/auth/register', [RegisterController::class, 'index'])->name('auth.register')->middleware('guest');
Route::post('/auth/register', [RegisterController::class, 'register'])->middleware('guest');



/* Dashboard */
Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/user/complain/reply/{id}/{title}', [DashboardController::class, 'complainReply'])->name('complain.reply')->middleware('auth');
Route::post('/user/complain/reply/{id}/{title}', [DashboardController::class, 'complainReplyStore'])->middleware('auth');

Route::get('/user/logout', [LogoutController::class, 'logout'])->name('user.logout')->middleware('auth');


/* Customers */


Route::get('/customers/login', [CustomerLoginController::class, 'index'])->name('customers.index')->middleware('guest:customers');
Route::post('/customers/login', [CustomerLoginController::class, 'login'])->middleware('guest');

Route::get('/customers/register', [CustomerLoginController::class, 'indexRegister'])->name('customers.index.register')->middleware('guest:customers');
Route::post('/customers/register', [CustomerLoginController::class, 'register'])->middleware('guest');

/* Customers Dashboard */

Route::get('/customers/dashboard', [CustomerDashboardController::class, 'index'])->name('customers.dashboard')->middleware('auth:customers');

Route::get('/customers/profile', [CustomerDashboardController::class, 'profile'])->name('customers.profile')->middleware('auth:customers');
Route::post('/customers/profile', [CustomerDashboardController::class, 'storeProfile'])->middleware('auth:customers');


Route::get('/customers/password', [CustomerDashboardController::class, 'password'])->name('customers.password')->middleware('auth:customers');
Route::post('/customers/password', [CustomerDashboardController::class, 'storePassword'])->middleware('auth:customers');

Route::get('/customers/complaint/{id}/{title}/delete', [CustomerDashboardController::class, 'deleteComplain'])->name('customers.complaint.delete')->middleware('auth:customers');

Route::get('/customers/complaint/replies/{id}/{title}/', [CustomerDashboardController::class, 'repliesComplain'])->name('customers.complaint.replies')->middleware('auth:customers');


Route::get('/customers/logout', [CustomersLogoutController::class, 'logout'])->name('customers.logout')->middleware('auth:customers');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


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


Route::middleware(['auth'])->group(function () {
    // Show the profile page
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

    // Update profile
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Update password
    Route::put('/password', [ProfileController::class, 'updatePassword'])->name('password.update');

    // Logout
    Route::post('/logout', [ProfileController::class, 'logout'])->name('logout');
});


route::get('/',[HomeController::class,'index'])->name("welcome");
Route::get('/solve.html', [HomeController::class, 'sqlsolve'])->name('solve');
Route::get('/tables', [HomeController::class, 'showTables']);
Route::get('/get-table-contents/{tableName}', [HomeController::class, 'getTableContents']);
Route::post('/update-status', [HomeController::class, 'updateStatus'])->name('update.status');
Route::post('/request-otp', [HomeController::class, 'sendOtp']);

// Login route (POST request for login)
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');

// Logout route (POST request for logout)
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
route::get('/redirect',[HomeController::class,'index'])->middleware('auth','verified');

Route::get('auth/redirect', [GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/callback', [GoogleController::class, 'handleCallback']);

// Other Routes
Route::get("/mycompiler", [HomeController::class, "compiler"])->name("mycompiler");
Route::post('/compile', [HomeController::class, 'compile'])->name('compile');
Route::get('/problem', [HomeController::class, 'problem'])->name('problem');

// Payment Routes
Route::post('/create-checkout-session', [PaymentController::class, 'createCheckoutSession'])->name('create.checkout.session');
Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');

// Problem Solving Route
Route::post('/probsolve', [HomeController::class, 'solve'])->name('probsolve');
Route::post('/uploademail', [HomeController::class, 'uploademail'])->name('uploademail');


Route::post('/trackrecord', [HomeController::class, 'trackrecord'])->name('trackrecord');


Route::get('/track', [HomeController::class, 'track'])->name('track');

Route::get('/tracker', [HomeController::class, 'tracker'])->name('tracker');

Route::get('/rank', [HomeController::class, 'rank'])->name('rank');

Route::get('/progress', [HomeController::class, 'progress'])->name('progress');










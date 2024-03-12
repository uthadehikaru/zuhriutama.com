<?php

use App\Http\Controllers\LoginController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', App\Http\Controllers\Welcome::class)->name('home');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::resource('login', LoginController::class)->only(['index','store']);
Route::get('/privacy', function(){
    return view('privacy');
})->name('privacy');
Route::resource('/post', App\Http\Controllers\PostController::class)->only(['index','show']);

Route::get('/google/redirect', [App\Http\Controllers\GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [App\Http\Controllers\GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');

Route::get('lara-logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect()->route('home', ['verified' => true])->withFragment('subcription');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::middleware('auth')->group(function(){
    Route::get('logout', function() {
        Auth::logout();
        return redirect()->route('home');
    })->name('logout');
});
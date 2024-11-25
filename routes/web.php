<?php

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', function(){
    if ( Auth::user()->isAdmin() ) {
        return redirect(route('dashboard'));
    }
    if ( Auth::user()->isCoordinator() ) {
        return redirect(route('dashboard'));
    }
    if ( Auth::user()->isRecruiter() ) {
        return redirect(route('dashboard'));
    }
    if ( Auth::user()->isStudent() ) {
        return redirect(route('dashboard'));
    }
})->name('dashboard');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/registration', [App\Http\Controllers\HomeController::class, 'registration'])->name('registration');
Route::resource('student',\App\Http\Controllers\resource\student::class);
Route::get('/getlanguages', [\App\Http\Controllers\resource\student::class, 'getLanguages']);
Route::resource('recruiter',\App\Http\Controllers\resource\recruiter::class);

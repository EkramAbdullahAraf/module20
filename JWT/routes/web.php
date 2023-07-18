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
Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::get('/signup', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('signup');

Auth::routes();
Route::group(['middleware' => 'jwt.auth'], function () {
    // Add your protected routes here.
});
Route::get('/', function () {
    return 'Welcome to the homepage!'; // Replace with your desired view or functionality
})->middleware('auth');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

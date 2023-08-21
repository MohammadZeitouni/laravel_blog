<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [PagesController::class,'index']);
Route::resource('/blog',PostsController::class);
Route::resource('/tag',TagController::class);
Route::get('/Notification/markASRead', [PostsController::class,'markASRead'])->name('Notification.read');
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

<?php

use App\Http\Controllers\NewsElementController;
use App\Http\Controllers\NewsSectionController;
use Illuminate\Support\Facades\Auth;
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

Route::any('/', function () {
    return  redirect('/news');
});
Route::any('/news', [NewsSectionController::class, 'index'])->name("sections");
Route::any('/news/{section}', [NewsSectionController::class, 'section'])->name("section");
Route::any('/news/{section}/{element}', [NewsElementController::class, 'index'])
    ->name("section");
Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

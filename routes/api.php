<?php

use App\Http\Controllers\NewsSectionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'namespace' => 'App\Http\Controller',
    'prefix'    => '/section',
    'as'        => 'section',
], function () {
    Route::get('/index', [NewsSectionController::class, 'index'])->name('index');
    Route::get('/show', [NewsSectionController::class, 'show'])->name('show');
});

Route::group([
    'namespace' => 'App\Http\Controller',
    'prefix'    => '/element',
    'as'        => 'element',
], function () {
    Route::get('/index', [NewsSectionController::class, 'index'])->name('index');
    Route::get('/show', [NewsSectionController::class, 'show'])->name('show');
});

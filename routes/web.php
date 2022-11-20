<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ptController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;

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
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::controller(ptController::class)->prefix('practice/')->name('practice.')->group(function () {

        Route::get('index', 'index')->name('index');

        Route::get('creat', 'creat')->name('creat');

        Route::post('insert', 'insert')->name('insert');

        Route::get('view/{blog}', 'view')->name('view');

        Route::get('edit/{blog}', 'edit')->name('edit');

        Route::put('update/{blog}', 'update')->name('update');

        Route::delete('delete/{blog}', 'delete')->name('delete');
    });

    Route::resource('category', CategoryController::class)->except('creat');

    Route::get('/home', [HomeController::class, 'index'])->name('home');

});

Auth::routes(['verify' => true]);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('home',[Controller::class,'home'])->name('home');
    //User
    Route::group(['prefix' => 'user','as'=>'user.'], function() {
        Route::get('',[UserController::class,'getAll'])->name('getAll');
        Route::get('insert',[UserController::class,'insert'])->name('insert');
        Route::post('processInsert',[UserController::class,'processInsert'])->name('processInsert');
        Route::get('update/{id}',[UserController::class,'update'])->name('update');
        Route::get('processUpdate/{id}',[UserController::class,'processUpdate'])->name('processUpdate');
        Route::get('delete/{id}',[UserController::class,'delete'])->name('delete');
    });
//Category
    Route::group(['prefix' => 'category','as'=>'category.'], function() {
        Route::get('',[CategoryController::class,'getAll'])->name('getAll');
        Route::get('insert',[CategoryController::class,'insert'])->name('insert');
        Route::post('processInsert',[CategoryController::class,'processInsert'])->name('processInsert');
        Route::get('update/{id}',[CategoryController::class,'update'])->name('update');
        Route::get('processUpdate/{id}',[CategoryController::class,'processUpdate'])->name('processUpdate');
        Route::get('delete/{id}',[CategoryController::class,'delete'])->name('delete');
        });

});

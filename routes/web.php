<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageProductController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\CheckUser;

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



    Route::group(['prefix' => 'page_admin', 'as' => 'page_admin.'], function () {
        Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('', [Controller::class, 'home'])->name('home');
    //User
    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('', [UserController::class, 'getAll'])->name('getAll');
        Route::get('getAll', [UserController::class, 'show'])->name('show');
        Route::get('insert', [UserController::class, 'insert'])->name('insert');
        Route::post('processInsert', [UserController::class, 'processInsert'])->name('processInsert');
        Route::get('update/{id}', [UserController::class, 'update'])->name('update');
        Route::post('processUpdate/{id}', [UserController::class, 'processUpdate'])->name('processUpdate');
        // Route::delete('deleteAJ', [UserController::class, 'deleteAJ'])->name('deleteAJ');
        Route::get('delete/{id}', [UserController::class, 'delete'])->name('delete');
    });
    //Sản phẩm
    Route::group(['prefix' => 'product','as'=>'product.'], function() {
        Route::get('',[ProductController::class,'getAll'])->name('getAll');
        Route::get('insert',[ProductController::class,'insert'])->name('insert');
        Route::post('processInsert',[ProductController::class,'processInsert'])->name('processInsert');
        Route::get('update/{id}',[ProductController::class,'update'])->name('update');
        Route::post('processUpdate/{id}',[ProductController::class,'processUpdate'])->name('processUpdate');
        Route::delete('delete', [ProductController::class, 'delete'])->name('delete');


    });
//ảnh sản phẩm
    Route::group(['prefix' => 'image_product','as'=>'image_product.'], function() {
        Route::get('',[ImageProductController::class,'getAll'])->name('getAll');
        Route::get('insert',[ImageProductController::class,'insert'])->name('insert');
        Route::post('processInsert',[ImageProductController::class,'processInsert'])->name('processInsert');
        Route::get('update',[ImageProductController::class,'update'])->name('update');
        Route::post('processUpdate',[ImageProductController::class,'processUpdate'])->name('processUpdate');
        Route::delete('delete', [ImageProductController::class, 'delete'])->name('delete');
        Route::post('dl', [ImageProductController::class, 'dl'])->name('dl');



    });

});
});

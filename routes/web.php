<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
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
        Route::post('processUpdate/{id}',[UserController::class,'processUpdate'])->name('processUpdate');
       // Route::delete('deleteAJ', [UserController::class, 'deleteAJ'])->name('deleteAJ');
        Route::get('delete/{id}', [UserController::class, 'delete'])->name('delete');
    });
//Category
    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('', [CategoryController::class, 'getAll'])->name('getAll');
        Route::get('insert', [CategoryController::class, 'insert'])->name('insert');
        Route::post('processInsert', [CategoryController::class, 'processInsert'])->name('processInsert');
        Route::get('update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::post('processUpdate/{id}', [CategoryController::class, 'processUpdate'])->name('processUpdate');
        Route::delete('delete', [CategoryController::class, 'delete'])->name('delete');

    });
    //Task
    Route::group(['prefix' => 'task', 'as' => 'task.'], function () {
        Route::get('', [TaskController::class, 'getAll'])->name('getAll');
        Route::get('insert', [TaskController::class, 'insert'])->name('insert');
        Route::post('processInsert', [TaskController::class, 'processInsert'])->name('processInsert');
        Route::get('update/{id}', [TaskController::class, 'update'])->name('update')->middleware(CheckUser::class);
        Route::get('processUpdate/{id}', [TaskController::class, 'processUpdate'])->name('processUpdate');
        Route::post('updateStatus', [TaskController::class, 'updateStatus'])->name('updateStatus');
        Route::get('updateStatusAll', [TaskController::class, 'updateStatusAll'])->name('updateStatusAll');
        Route::delete('delete', [TaskController::class, 'delete'])->name('delete');
    });

});

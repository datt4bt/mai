<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Api\UserController;
use App\Http\Middleware;

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

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->get('viewLogin', [UserController::class,'viewLogin']);
    $api->post('login', [UserController::class,'login'])->name('login');
    $api->group(['middleware' => 'jwt.auth'], function ($api) {
        $api->get('user-info',  [UserController::class,'getUserInfo']);
        $api->group(['prefix' => 'user','as'=>'user.'], function($api) {
            $api->get('/',  [UserController::class,'getAll']);
            $api->get('/{id}',  [UserController::class,'show']);
            $api->post('update/{id}',  [UserController::class,'update']);
            $api->get('delete/{id}',  [UserController::class,'delete']);
        });
    });
});



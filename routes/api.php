<?php

use Illuminate\Http\Request;

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


// guest
Route::middleware(['guest'])->group(function () {
    // -- welcome
    Route::get('/', function () { return ('Welcome to API!'); });

    // -- auth
    Route::post('/auth/register', 'Auth\RegisterController@register');
    Route::post('/auth', 'Auth\LoginController@login');    
    Route::apiResource('/types_user', 'TypeUserController', ['only' => ['index']]);  
});


// authenticated
Route::middleware(['auth:api'])->group(function () {
    Route::get('/auth', 'Auth\LoginController@show');
    Route::delete('/auth', 'Auth\LoginController@logout');

    // routes type admin
    Route::middleware('type.admin')->group(function () {
        Route::apiResource('/tickets', 'TicketController');
        Route::apiResource('/users', 'UserController', ['only' => ['index']]);
    });
    
    // routes type user
    Route::middleware('type.user')->group(function () {
        Route::apiResource('/tickets_user', 'TicketUserController', ['only' => ['index', 'update']]);
    });
});
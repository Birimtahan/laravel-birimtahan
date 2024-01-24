<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'auth', 'as' => 'api::auth.'], function () {
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('register', 'AuthController@register')->name('register');
});

Route::apiResource('exams', 'ExamController', ['as' => 'api::exams.', 'only' => ['index', 'show']]);
Route::apiResource('exams', 'ExamController', [
    'as' => 'api::exams.', 
    'middleware' => ['auth:api', 'verified'] , 
    'only' => ['store', 'update', 'destroy']
]);

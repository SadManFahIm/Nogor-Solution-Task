<?php

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



Route::get('/','BlogController@viewIndex');
Route::post('user/info/submit','BlogController@submitInfo');
Route::get('user/details/{uid}','BlogController@getEditUserInfo');
Route::post('user/info/update/{uid}','BlogController@postEditUserInfo');
Route::get('user/delete/{uid}','BlogController@deleteInfo');
<?php

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
Auth::routes();

Route::redirect("/","/timers");

Route::get("/timers","TimersController@index")->middleware("auth");

Route::get('/timers/create', "TimersController@create")->middleware("auth");
Route::post('/timers', "TimersController@store")->middleware("auth");

Route::get('/timers/{timer}/edit', "TimersController@edit");
Route::patch('/timers/{timer}', "TimersController@update");

Route::delete('/timers/{timer}', "TimersController@destroy");



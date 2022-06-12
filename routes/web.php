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



Route::get('/', function () {
    return view('index');
});

Route::name('dashboard')->get('/dashboard','App\Http\Controllers\AppController@dashboard');
Route::name('login')->post('/login','App\Http\Controllers\AppController@login');
Route::name('logout')->get('/logout','App\Http\Controllers\AppController@logout');

Route::name('clients')->get('/clients','App\Http\Controllers\ClientsController@index');
Route::name('new_client')->post('/new_client','App\Http\Controllers\ClientsController@new_client');

Route::name('fleet')->get('/fleet','App\Http\Controllers\FleetController@index');
Route::name('new_truck')->post('/new_truck','App\Http\Controllers\FleetController@new_truck');

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\customers;
use App\Models\fleet;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Fetch a specific clients details
Route::get('/user_details/{customer}','App\Http\Controllers\ClientsController@customer_details');
Route::get('/home_stats','App\Http\Controllers\AppController@home_stats');

// Delete a client
Route::get('/delete_customer/{customer}','App\Http\Controllers\ClientsController@delete_customer');

// Fetch a specific clients details
Route::post('/update_user/','App\Http\Controllers\ClientsController@update_customer');

// Create new order
Route::post('/add_order/','App\Http\Controllers\OrdersController@add_order');
Route::get('/assign_truck/{order}/{truck}','App\Http\Controllers\OrdersController@assign_truck');
Route::get('/dispatch/{id}','App\Http\Controllers\OrdersController@dispatch');
Route::get('/deliver/{id}','App\Http\Controllers\OrdersController@deliver');

// Fetch truck details
Route::get('/truck_details/{truck}','App\Http\Controllers\FleetController@truck_details');
Route::post('/update_truck/','App\Http\Controllers\FleetController@update_truck');
Route::get('/delete_truck/{truck}','App\Http\Controllers\FleetController@delete_truck');
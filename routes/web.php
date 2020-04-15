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
    return view('welcome');
});
//inserieamo le rotte admin
Auth::routes();
Route::name('admin.')->namespace('Admin')->middleware('auth')->prefix('admin')->group(function () {
    Route::resource('flats','FlatController');
   });



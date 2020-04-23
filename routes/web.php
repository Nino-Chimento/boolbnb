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

//Route::get('/', function () {
//    return view('welcome', 'FilterFlatController@showtop')->name('showtop');
//});

Route::get('/','FilterFlatController@welcome')->name('welcome');

Route::get('showflat/flats/{flat}','FilterFlatController@showflat')->name('showflat');



//inserieamo le rotte admin
Auth::routes();
Route::name('admin.')->namespace('Admin')->middleware('auth')->prefix('admin')->group(function () {
    Route::resource('flats','FlatController');
   });

Route::get('search','FilterFlatController@filterPosition')->name('search');

// processo di pagamento
Route::get('/payment/process', 'PaymentsController@process')->name('payment.process');
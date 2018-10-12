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
// sebelum login


Route::get('/', function () {
    return view('home');
});

Route::resource('/data', 'AssetController');

Route::get('/table', 'AssetController@dataTable')->name('table.data');
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
// Route::post('data/delete/{id}', 'AssetController@softdelete');
Route::get('/trash','AssetController@trash')->name('trash');
Route::get('/tables/trash','AssetController@trash_API')->name('trash_API');
Route::get('/tables', 'AssetController@dataTable')->name('tables.data');
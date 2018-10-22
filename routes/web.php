<?php

Route::get('/', function () {
    return view('home');
});

Route::resource('/data', 'AssetController');

Route::get('/trash','AssetController@trash')->name('trash');

Route::put('trash/{trash}/restore', 'AssetController@restore')->name('restore');

Route::delete('trash/{trash}', 'AssetController@permanent_delete')->name('permanentdelete');


Route::get('/tables/trash','AssetController@trash_API')->name('trash_API');


Route::get('/tables', 'AssetController@dataTable')->name('tables.data');
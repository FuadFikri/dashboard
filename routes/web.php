<?php

Route::get('/Documentation', 'AssetController@documentation')->name('documentation');

Auth::routes();
//routes yang butuh authentikasi
Route::middleware('auth','web')->group(function(){
    
    Route::resource('/data', 'AssetController');
    Route::get('/', 'AssetController@index');
    Route::get('/trash','AssetController@trash')->name('trash');
    Route::put('trash/{trash}/restore', 'AssetController@restore')->name('restore');
    Route::delete('trash/{trash}', 'AssetController@permanent_delete')->name('permanentdelete');
    Route::get('/tables/trash','AssetController@trash_API')->name('trash_API');
    Route::get('/tables', 'AssetController@dataTable')->name('tables.data');
    Route::get('/preview/{id}', 'AssetController@preview')->name('preview');
    Route::get('/profile','UserController@edit');
    Route::put('/profile/update','UserController@update');
});

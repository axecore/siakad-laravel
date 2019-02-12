<?php


Route::get('/', function () {
    return view('welcome');
});



Auth::routes();


// disable register routes

Route::match(['GET', 'POST'], '/register', function(){
    return redirect('/login');
})->name('register');

// end disable register routes


Route::get('/home', 'HomeController@index')->name('home');


// matakuliah module

Route::get('/matakuliah/json', 'MatakuliahController@data_json')->name('matakuliah.json');
Route::get('/matakuliah/trash/json', 'MatakuliahController@trash_json')->name('matakuliah_trash.json');
Route::get('/matakuliah/{id}/restore', 'MatakuliahController@restore')->name('matakuliah_trash.restore');
Route::delete('/matakuliah/{id}/delete', 'MatakuliahController@delete_permanent')->name('matakuliah.delete');
Route::get('/matakuliah/trash', 'MatakuliahController@trash')->name('matakuliah.trash');
Route::resource('/matakuliah', 'MatakuliahController');

// end matakuliah module


Route::get('/dosen/json', 'DosenController@data_json')->name('dosen.json');
Route::resource('/dosen', 'DosenController');

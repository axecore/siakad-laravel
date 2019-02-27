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



// dosen module

Route::get('/dosen/json', 'DosenController@data_json')->name('dosen.json');
Route::get('dosen/trash/json', 'DosenController@trash_json')->name('dosen_trash.json');
Route::get('dosen/{id}/restore', 'DosenController@restore')->name('dosen_trash.restore');
Route::delete('dosen/{id}/delete', 'DosenController@delete_permanent')->name('dosen.delete');
Route::get('dosen/trash', 'DosenController@trash')->name('dosen.trash');
Route::resource('/dosen', 'DosenController');

// end dosen module

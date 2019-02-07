<?php


Route::get('/', function () {
    return view('welcome');
});


Route::get('/tes', function(){
    return view('tes');
});

Auth::routes();

Route::match(['GET', 'POST'], '/register', function(){
    return redirect('/login');
})->name('register');


Route::get('/home', 'HomeController@index')->name('home');


Route::get('/matakuliah/json', 'MatakuliahController@data_json')->name('matakuliah.json');
Route::resource('/matakuliah', 'MatakuliahController');

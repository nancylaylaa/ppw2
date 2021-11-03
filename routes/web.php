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
Auth::routes([
    //'register'=> false,
    //'reset'=> false,
]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/spotify', function () {
    return view('spotify');
});

Route::get('/notification', function () {
    return view('notification');
});

Route::get('/note', function () {
    return view('note');
});

Route::resource('/mahasiswa', 'MahasiswaController');

Route::get('/buku', 'BukuController@index');
Route::get('/buku/create', 'BukuController@create')->name('buku.create');
Route::post('/buku', 'BukuController@store')->name('buku.store');
Route::post('/buku/delete/{id}', 'BukuController@destroy')->name('buku.destroy');

Route::post('/buku/edit/{id}', 'BukuController@edit')->name('buku.edit');
Route::post('/buku/update/{id}', 'BukuController@update')->name('buku.update');

Route::get('/buku/search', 'BukuController@search')->name('buku.search');

Route::get('/home', 'HomeController@index')->name('home');

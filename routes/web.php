<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('siswa', 'Siswa\DaftarController')->except(['pdf_siswa', 'pendaftar']);
    Route::get('/pendaftar', 'Siswa\DaftarController@pendaftar')->name('pendaftar');
    Route::get('/pdf/siswa', 'Siswa\DaftarController@pdf_siswa')->name('pdf');
    Route::prefix('admin')->name('admin.')->group(function(){
        Route::get('/', 'AdminController@index')->name('index');
    }); 
});

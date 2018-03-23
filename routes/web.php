<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/profile/{user}','UserController@index');
Route::get('/approve/{id}','AdministratorController@approve');
Route::get('/decline/{id}','AdministratorController@decline');
Route::get('/checkApproved','UserController@check');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/rezultat', function(){
    return view('PDF.pdf');
});

Route::get('/napravi_pdf','PDFController@napravi_pdf');
Route::get('/showResults','showResults@pokazi_grafa');

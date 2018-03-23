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

Route::get('/napravi_pdf/{result}','PDFController@napravi_pdf');
Route::post('/showResults','showResults@pokazi_grafa');
Route::get('vnesi_pacient','UserController@vnesi_pacient');
Route::post('/vnesuvanje_na_pacient','UserController@vnesuvanje_na_pacient');

Route::get('/novi_rez','ResultController@create');
Route::post('/vnesi_rez','ResultController@store');

Route::get('/result/{id}','ResultController@show');




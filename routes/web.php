<?php


//Home routes
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');


//Profile routes
Route::get('/profile/{user}','UserController@index');
Route::get('/approve/{id}','AdministratorController@approve');
Route::get('/decline/{id}','AdministratorController@decline');
Route::get('/checkApproved','UserController@check');
Route::get('vnesi_pacient','UserController@vnesi_pacient');
Route::post('/vnesuvanje_na_pacient','UserController@vnesuvanje_na_pacient');
Route::get('/edit_pacient/{id}','UserController@edit');
Route::post('/edit_pacient/{id}','UserController@update');


//Session routes
Auth::routes();


//Results routes
Route::get('/rezultat', function(){return view('PDF.pdf');});
Route::get('/napravi_pdf/{result}','PDFController@napravi_pdf');
Route::post('/showResults','showResults@pokazi_grafa');
Route::get('/novi_rez','ResultController@create');
Route::post('/vnesi_rez','ResultController@store');
Route::get('/result/{id}','ResultController@show');
Route::get('/svoi_rez/{id}','ResultController@svoi');
Route::get('/result_edit/{id}','ResultController@edit');
Route::post('/edit_result','ResultController@update');

//Items routes
Route::get('/item/{id}','ItemController@show');

//Message routes
Route::get('/new_msg/{id}','MessageController@create');
Route::post('/send_msg','MessageController@store');


Route::get('/mail_rez/{id}','mailController@rezultati');


//sms
Route::get('/pratisms','PorakaController@isprati');


Route::get('/message/{message}','MessageController@show');
Route::get('/inbox','MessageController@index');
Route::get('/sent','MessageController@sent');

Route::post('/chat','ChatController@store');





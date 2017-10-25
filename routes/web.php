<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/estudantes', 'AjaxController@index')->middleware('auth');
Route::get('/estudantes/read', 'AjaxController@readData');

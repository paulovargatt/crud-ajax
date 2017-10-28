<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::resource('/home', 'ContactController');

Route::get('api/contact','ContactController@apiContact')->name('api.contact');


<?php

/*
Route::get('/', function () {
    return view('welcome');
});
*/


/* --- Rotas -> Login --- */
$this->get('/', 'LoginController@index');
$this->post('/checklogin', 'LoginController@checkLogin')->name('check.login');

/* --- Rotas -> Main --- */
Route::group(['middleware' => 'auth'], function () {
    $this->get('/home', 'MainController@index')->name('main.index');
	$this->get('/logout', 'MainController@logout')->name('logout');
});

/* --- Rotas -> Account (Resource) --- */

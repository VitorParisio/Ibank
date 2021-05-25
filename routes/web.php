<?php

/* --- Rotas -> Login --- */
$this->get('/', 'LoginController@index');
$this->post('/checklogin', 'LoginController@checkLogin')->name('check.login');

/* --- Rotas -> Group --- */
Route::group(['middleware' => 'auth'], function () {
	/* --- Rotas -> Home --- */
    $this->get('/home', 'HomeController@index')->name('home');
	$this->get('/logout', 'HomeController@logout')->name('logout');

	/* --- Rotas -> Account --- */
	$this->get('/add', 'AccountController@index')->name('account');
	$this->post('/add', 'AccountController@add')->name('account.add');
});


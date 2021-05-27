<?php

/* --- Rotas -> Login --- */
$this->get('/', 'LoginController@index');
$this->post('checklogin', 'LoginController@checkLogin')->name('check.login');

/* --- Rotas -> Group --- */
Route::group(['middleware' => 'auth'], function () {
	/* --- Rotas -> Home --- */
    $this->get('home', 'HomeController@index')->name('home');
	$this->get('logout', 'HomeController@logout')->name('logout');

	/* --- Rotas -> Account --- */
	$this->get('add', 'AccountController@index')->name('account');
	$this->post('add', 'AccountController@add')->name('account.add');
	$this->get('list', 'AccountController@list_account')->name('list');
	$this->get('edit/{id}', 'AccountController@list_edit')->name('list.edit');
	$this->put('update/{id}', 'AccountController@list_update')->name('list.update');
	$this->get('deposit/{id}', 'AccountController@deposit_edit')->name('deposit.edit');
	$this->post('deposit/{id}', 'AccountController@deposit_update')->name('deposit.update');
	$this->get('retire/{id}', 'AccountController@retire_edit')->name('retire.edit');
	$this->post('retire/{id}', 'AccountController@retire_update')->name('retire.update');
	$this->get('delete/{id}', 'AccountController@delete')->name('delete');
});


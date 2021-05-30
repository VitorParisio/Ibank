<?php

/* --- Rotas -> Login --- */
$this->get('/', 'LoginController@index');
$this->post('checklogin', 'LoginController@checkLogin')->name('check.login');

/* --- Rotas -> Group --- */
Route::group(['middleware' => 'auth'], function () {

	/* --- Rotas -> Register --- */
	$this->get('register', 'RegisterController@index')->name('register.index');
	$this->post('register', 'RegisterController@register')->name('register');

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
	$this->get('transfer/{id}', 'AccountController@transfer')->name('transfer');
	$this->post('confirm/{id}', 'AccountController@confirm')->name('confirm');
	$this->post('transfer/{id}', 'AccountController@transfer_store')->name('transfer.store');
	$this->get('delete/{id}', 'AccountController@delete')->name('delete');

	/* --- Rotas -> Historic --- */
	$this->get('historic', 'HistoricController@index')->name('historic');
	$this->get('del/{id}', 'HistoricController@del')->name('del');
});


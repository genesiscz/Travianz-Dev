<?php

Route::get('', 'HomeController@index')->name('index');

Route::get('login', 'Auth\LoginController@index')->name('login');
Route::get('register', 'Auth\RegisterController@index')->name('register');
Route::get('verification', 'Auth\RegisterController@index')->name('verification');
Route::get('village', 'Auth\VillageController@index')->name('village');

Route::prefix('manual')->name('manual.')->group(function () {
	Route::get('', 'ManualController@tribes')->name('tribes');
	Route::get('buildings', 'ManualController@buildings')->name('buildings');
	Route::get('FAQ', 'ManualController@faq')->name('FAQ');
	Route::get('village', 'ManualController@village')->name('village');
});

Route::prefix('tutorial')->name('tutorial.')->group(function () {
	Route::get('', 'TutorialController@village')->name('village');
	Route::get('resources', 'TutorialController@resources')->name('resources');
	Route::get('buildings', 'TutorialController@buildings')->name('buildings');
	Route::get('neighbours', 'TutorialController@neighbours')->name('neighbours');
	Route::get('navigation', 'TutorialController@navigation')->name('navigation');
});

Route::get('rules', function () {
	return view('rules');
})->name('rules');

Route::prefix('installation')->name('installation.')->group(function () {
	Route::get('', 'Installation\InstallationController@greetings')->name('greetings');
	Route::get('config', 'Installation\ConfigController@index')->name('config');
	Route::post('config', 'Installation\ConfigController@store');
	Route::get('database', 'Installation\DatabaseController@index')->name('database');
	Route::post('database', 'Installation\DatabaseController@store');
	Route::get('accounts', 'Installation\AccountsController@index')->name('accounts');
	Route::post('accounts', 'Installation\AccountsController@store');
	Route::get('finish', 'Installation\InstallationController@finish')->name('finish');
});

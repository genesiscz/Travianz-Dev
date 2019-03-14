<?php

Route::get('', 'HomeController@index')->name('index');

Auth::routes(['register' => false]);

Route::prefix('email')->name('verification.')->group(function () {
	Route::post('resend', 'Auth\VerificationController@resend')->name('resend');
	Route::get('verify', 'Auth\VerificationController@show')->name('notice');
	Route::get('verify/{id}', 'Auth\VerificationController@verify')->name('verify');
});

Route::get('logout', 'Auth\LoginController@logout');
Route::delete('login/cookies', 'Auth\LoginController@deleteCookies')->name('login.cookies');

Route::get('register/{referral?}', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register/{referral?}', 'Auth\RegisterController@register');

Route::get('fields', 'FieldController@index')->name('fields');
Route::get('village', 'VillageController@index')->name('village');
Route::get('overview', 'Overview@index')->name('overview');
Route::get('statistics', 'StatisticController@index')->name('statistics');
Route::get('map', 'MapController@index')->name('map');
Route::get('plus', 'PlusController@index')->name('plus');

Route::resource('reports', 'ReportController')->only(['store', 'index', 'destroy', 'show']);
Route::resource('messages', 'MessageController')->only(['store', 'index', 'destroy', 'show']);
Route::resource('building', 'BuildingController')->only(['store', 'destroy', 'update', 'show']);

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

Route::get('rules', 'RuleController@index')->name('rules');

Route::prefix('installation')->name('installation.')->group(function () {
	Route::get('', 'Installation\InstallationController@greetings')->name('greetings');
	Route::get('finish', 'Installation\InstallationController@finish')->name('finish');
	Route::resource('config', 'Installation\ConfigController')->only(['index', 'store']);
	Route::resource('database', 'Installation\DatabaseController')->only(['index', 'store']);
	Route::resource('accounts', 'Installation\AccountController')->only(['index', 'store']);
});

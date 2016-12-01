<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|
*/

Route::get('/', 'BusServiceController@index')->name('busservice.index');

Route::get('/charters', 'CharterController@index')->name('charters.index');
Route::get('/charters/create', 'CharterController@create')->name('charters.create');
Route::post('/charters', 'CharterController@store')->name('charters.store');
Route::get('/charters/{charter}', 'CharterController@show')->name('charters.show');
Route::get('/charters/{charter}/edit', 'CharterController@edit')->name('charters.edit');
Route::put('/charters/{charter}', 'CharterController@update')->name('charters.update');
Route::delete('/charters/{charter}', 'CharterController@destroy')->name('charters.destroy');

Route::get('/excursions', 'ExcursionController@index')->name('excursion.index');
Route::get('/excursions/create', 'ExcursionController@create')->name('excursions.create');
Route::post('/excursions', 'ExcursionController@store')->name('excursions.store');
Route::get('/excursions/{excursion}', 'ExcursionController@show')->name('excursions.show');
Route::get('/excursions/{excursion}/edit', 'ExcursionController@edit')->name('excursions.edit');
Route::put('/excursions/{excursion}', 'ExcursionController@update')->name('excursions.update');
Route::delete('/excursions/{excursion}', 'ExcursionController@destroy')->name('excursions.destroy');

Route::get('/contact', 'PageController@contact')->name('page.contact');

Route::get('/help', 'PageController@help')->name('page.help');

Route::get('/faq', 'PageController@faq')->name('page.faq');

Route::get('/testimonials', 'PageController@testimonials')->name('page.testimonials');

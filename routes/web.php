<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
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


Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});

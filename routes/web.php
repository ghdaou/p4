<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'BusServiceController@index')->name('busservice.index');

Route::get('/', 'ExcursionController@index')->name('excursion.index');
Route::get('/excursions/create', 'ExcursionController@create')->name('excursions.create');
Route::get('/excursions/create/form', 'ExcursionController@createRes')->name('excursions.createRes')->middleware('auth');
Route::post('/excursions', 'ExcursionController@store')->name('excursions.store');
Route::get('/excursions/show', 'ExcursionController@show')->name('excursions.show')->middleware('auth');
Route::get('/excursions/{id}/edit', 'ExcursionController@edit')->name('excursions.edit');
Route::get('/excursions/{id}/delete', 'ExcursionController@delete')->name('excursions.delete');
Route::put('/excursions/{id}', 'ExcursionController@update')->name('excursions.update');
Route::delete('/excursions/{id}', 'ExcursionController@destroy')->name('excursions.destroy');

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

/**
* A quick and dirty way to set up a whole bunch of practice routes
* that I'll use in lecture.
*/
Route::get('/practice', 'PracticeController@index')->name('practice.index');
for($i = 0; $i < 100; $i++) {
    Route::get('/practice/'.$i, 'PracticeController@example'.$i)->name('practice.example'.$i);

}


Auth::routes();
Route::get('/logout','Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index');

Route::get('/show-login-status', function() {

    # You may access the authenticated user via the Auth facade
    $user = Auth::user();

    if($user)
        dump($user->toArray());
    else
        dump('You are not logged in.');

    return;
});

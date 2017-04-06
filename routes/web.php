<?php

Route::get('/', 'WelcomeController');

Route::get('/calculations/{calculate}', 'CalcController@show');

Route::get('/calculations/{addBill}', 'CalcController@add');

Route::get('/calculations/{storeBill}', 'CalcController@store');

if(config('app.env') == 'local') {
  Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}

Route::get('/', function () {
    return view('welcome');
});

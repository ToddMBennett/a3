<?php

Route::get('/','CalcController@show');

if(config('app.env') == 'local') {
  Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}

// Route::get('/add', 'CalcController@addBill')
//
// Route::get('/store', 'CalcController@storeBill')

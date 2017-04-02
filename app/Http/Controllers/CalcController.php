<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcController extends Controller
{

    /*
    * GET
    * /books
    */
    public function index() {
      return 'View all calculations...';
    }

    /*
    * GET
    * /books/{title?}
    */
    public function show($title = null) {
      return view('calculations.show')->with([
        'title' => $title,
      ]);
    }
}

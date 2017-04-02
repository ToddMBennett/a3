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
      return 'View all books...'
    }

    /*
    * GET
    * /books/{title?}
    */
    public function view($title = null) {
      return 'You want to view book '.$title;
    }
}

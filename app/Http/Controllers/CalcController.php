<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcController extends Controller {

    /*
    * GET
    * /calculations/{result}
    */
    public function show($result = null) {
        return view('calculations.show')->with([
            'calculate' => $calculate,
        ]);
    }

    // Values
    $num = (isset($_GET['num'])) ? $_GET['num'] : '';
    $roundUp = $form->isChosen('roundUp');
    $amount = (isset($_GET['amount'])) ? $_GET['amount'] : '';
    $service = (isset($_GET['service'])) ? $_GET['service'] : '';
    $calculate = '';

    // Requires numeric inputs and range for specific fields
    if($form->isSubmitted()) {
        $errors = $form->validate(
            [
                'num' => 'numeric|min:1|required',
                'amount' => 'numeric|min:0|required'
            ]
        );
    }

    // Alerts user if dropdown selection isn't chosen
    if($service == 'tipping') {
        $alertType = 'alert-danger';
        $results = 'No tip was added. Please choose the level of service.';
    }
    else {
        $alertType = 'alert-info';
        $results = 'A tip of '.($service *100).'% has been added.';
    }

    // Caculation for splitting bill, with rounding and without rounding
    if(is_numeric($amount) && is_numeric($num)) {
      if($roundUp == 'yes') {
        $calculate = 'Each person should pay $'.ceil($amount / $num) * (1 + $service);
      } else {
        $calculate = 'Each person should pay $'.floor($amount / $num) * (1 +$service);
      }
    }

}

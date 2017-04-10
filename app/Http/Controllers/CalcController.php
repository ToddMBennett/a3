<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class CalcController extends Controller
{

    /*
    * GET
    * /show
    */
    public function show(Request $request) {

        // Backend validation
        // Had to create unique validate method as 'this->validate' was throwing errors
        $validator = Validator::make($request->all(), [
            'customers' => 'integer|min:2',
            'amount' => 'numeric|min:10',
            'service' => 'numeric',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Values
        $customers = (isset($_GET['customers'])) ? $_GET['customers'] : '';
        $roundUp = (isset($_GET['roundUp'])) ? $_GET['roundUp'] : '';
        $amount = (isset($_GET['amount'])) ? $_GET['amount'] : '';
        $service = (isset($_GET['service'])) ? $_GET['service'] : '';
        $calculate = null;

        // Alerts user if dropdown selection isn't chosen
        if($service == 'tipping') {
            $alertType = 'alert-danger';
            $results = 'No tip was added. Please choose the level of service.';
        }
        else {
            $alertType = 'alert-info';
            $results = 'A tip of '.$service.'% has been added.';
        }

        // Caculation for splitting bill, with rounding or without rounding
        if(is_numeric($amount) && is_numeric($customers)) {
            if($roundUp == 'yes') {
                $calculate = 'Each person should pay $'.ceil(($amount / $customers) * (1 + $service));
            } else {
                $calculate = 'Each person should pay $'.floatval(($amount / $customers) * (1 +$service));
            }
        }

        // Allows variables to be used in view templates
        return view('layouts.master')->with([
            'calculate' => $calculate,
            'customers' => $customers,
            'amount' => $amount,
            'service' => $service,
            'roundUp' => $roundUp,
            'alertType' => $alertType,
            'results' => $results,
        ]);
    }

}

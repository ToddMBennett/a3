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

        $validator = Validator::make($request->all(), [
            'num' => 'integer',
            'amount' => 'numeric',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
        }
        // Values
        $num = (isset($_GET['num'])) ? $_GET['num'] : '';
        $roundUp = (isset($_GET['amount'])) ? $_GET['amount'] : '';
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

        // Caculation for splitting bill, with rounding and without rounding
        if(is_numeric($amount) && is_numeric($num)) {
            if($roundUp == 'CHECKED') {
                $calculate = 'Each person should pay $'.ceil($amount / $num) * (1 + $service);
            } else {
                $calculate = 'Each person should pay $'.($amount / $num) * (1 +$service);
            }
        }

        return view('layouts.master')->with([
            'calculate' => $calculate,
            'num' => $num,
            'amount' => $amount,
            'service' => $service,
            'roundUp' => $roundUp,
            'alertType' => $alertType,
            'results' => $results,
        ]);


    }
}

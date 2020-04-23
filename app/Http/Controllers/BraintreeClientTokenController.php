<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree\ClientToken;

class BraintreeClientTokenController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => [
                'token' => \Braintree\ClientToken::generate()
            ]
        ]);
    }
}

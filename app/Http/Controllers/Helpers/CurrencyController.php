<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    use ClientHelper;

    public function getRates()
    {
        $action = '/currency/get-rates/';
        return json_decode($this->getResponseFromClient('GET', $action), true);

    }
}

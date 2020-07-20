<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\CurrencyController;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'currency' => (new CurrencyController)->getRates(),
        ];
        return view('pages.home', $data);
    }
}

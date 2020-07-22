<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\CurrencyController;
use App\Http\Controllers\Modules\FeedbackFormController;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'currency'  => (new CurrencyController)->getRates(),
            'sell_form' => (new FeedbackFormController)->getSellAppForm(),
        ];
        return view('pages.home', $data);
    }
}

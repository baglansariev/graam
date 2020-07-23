<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ClientHelper;
use Illuminate\Http\Request;

class FeedbackFormController extends Controller
{
    use ClientHelper;

    public function getSellAppForm()
    {
        return view('modules.feedback-form.sell-app');
    }

    public function sendSellApp(Request $request)
    {
        $action = '/feedback/sell-app';
        echo $this->getResponseFromClient('GET', $action, [
            'query' => $request->all(),
        ]);
    }

    public function getOwnPriceAppForm()
    {
        return view('modules.feedback-form.own-price-app');
    }

    public function sendOwnPrice(Request $request)
    {
        $action = '/feedback/own-price';
        echo $this->getResponseFromClient('GET', $action, [
            'query' => $request->all(),
        ]);
    }
}

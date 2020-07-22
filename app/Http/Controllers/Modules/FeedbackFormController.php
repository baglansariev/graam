<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackFormController extends Controller
{
    public function getSellAppForm()
    {
        return view('modules.feedback-form.sell-app');
    }

    public function getOwnPriceAppForm()
    {
        return view('modules.feedback-form.own-price-app');
    }
}

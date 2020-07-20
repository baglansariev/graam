<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ClientHelper;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    use ClientHelper;

    public function getOffers($name, $type, $weight)
    {
        $action = '/offer/product/' . $name . '/' . $type . '/' . $weight;
        $offers = json_decode($this->getResponseFromClient('GET', $action), true);

        return view('pages.elements.offer-cards', ['offers' => $offers]);
    }
}

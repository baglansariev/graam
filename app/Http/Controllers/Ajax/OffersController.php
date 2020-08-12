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
        $action = '/offers/get-list/' . $name . '/' . $type . '/' . $weight;
        $offers = json_decode($this->getResponseFromClientTest('GET', $action), true);

        $offers[0]['image'] = 'images/graam_logo.png';
        $offers[1]['image'] = 'images/a_zavod.png';
        $offers[2]['image'] = 'images/k_zavod.png';
        $offers[3]['image'] = 'images/a_zavod.png';
        $offers[4]['image'] = 'images/k_zavod.png';
        $offers[5]['image'] = 'images/a_zavod.png';

        return view('pages.elements.offer-cards', ['offers' => $offers]);
    }
}

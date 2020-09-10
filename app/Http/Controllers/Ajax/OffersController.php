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
        $offers = json_decode($this->getResponseFromClient('GET', $action), true);

        $offers[0]['image'] = 'images/graam_logo.png';
        $offers[1]['image'] = 'images/k_zavod.png';
        $offers[2]['image'] = 'images/prioksk.png';
        $offers[3]['image'] = 'images/a_zavod.png';
        $offers[4]['image'] = 'images/region-gold.png';
        $offers[5]['image'] = 'images/lot-gold.png';

        $offers[0]['phone'] = '+7 800 550 59 97';
        $offers[1]['phone'] = '+7 391 259 33 33';
        $offers[2]['phone'] = '+7 491 313 20 00';
        $offers[3]['phone'] = '+7 383 266 10 57';
        $offers[4]['phone'] = '+7 800 250 56 62';
        $offers[5]['phone'] = '+7 800 500 19 62';
        
        return view('pages.elements.offer-cards', ['offers' => $offers]);
    }
}

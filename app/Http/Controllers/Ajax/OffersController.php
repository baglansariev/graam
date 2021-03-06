<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ClientHelper;
use Illuminate\Http\Request;
use App\Models\Pawnshop;

class OffersController extends Controller
{
    use ClientHelper;

    public function getOffers($name, $type, $weight, $action_type)
    {
        $action = '/offers/get-list/' . $name . '/' . $type . '/' . $weight . '/' . $action_type;
        $this->setClientData();
        $offers = json_decode($this->getResponseFromClient('GET', $action), true);

        $offers[0]['image'] = 'images/graam_logo.png';
        $offers[0]['phone'] = '+7 800 550-59-97';
        if ($action_type == 'sell') {
            $offers[1]['image'] = 'images/region-gold.png';
            $offers[2]['image'] = 'images/lot-gold.png';
            $offers[3]['image'] = 'images/a_zavod.png';
            $offers[4]['image'] = 'images/prioksk.png';
            $offers[5]['image'] = 'images/k_zavod.png';

            $offers[1]['phone'] = '+7 800 250-56-62';
            $offers[2]['phone'] = '+7 800 500-19-62';
            $offers[3]['phone'] = '+7 383 266-10-57';
            $offers[4]['phone'] = '+7 491 313-20-00';
            $offers[5]['phone'] = '+7 391 259-33-33';
        }

        $data = ['offers' => $offers, 'action' => $action, 'metal_name' => $name];

        return view('pages.elements.offer-cards', $data);
    }

    public function getPawnshops($material)
    {
        return view('pages.elements.lombard-cards', ['material' => $material, 'pawnshops' => Pawnshop::all()]);
    }
}

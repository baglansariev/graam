<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\CurrencyController;
use App\Http\Controllers\Modules\FeedbackFormController;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'currency'          => (new CurrencyController)->getRates(),
            'sell_form'         => (new FeedbackFormController)->getSellAppForm(),
            'own_price_form'    => (new FeedbackFormController)->getOwnPriceAppForm(),
        ];
        return view('pages.home', $data);
    }

    public function getRegLinks()
    {
        $reg_links = $this->regLinks();

        return view('pages.reg-links', ['reg_links' => $reg_links]);
    }

    public function regLinks()
    {
        return [
            'ALBERT AR',
            'AMBER PALACE Russia',
            'ATOLL',
            'Chekotin Jewellery',
            'Elena Serrieh Jewelry',
            'EPIC JEWELLERY',
            'Eva Naumova',
            'Gromov Gem',
            'IF8',
            'InterGems',
            'International Jewellery School',
            'Krastsvetmet',
            'MGL',
            'Moscow Diamond Club',
            'Sabirov Alfiz',
            'Scandinavian Jewellery',
            'SOKOLOV (Лакса Трейдинг)',
            'Бобров Сергей Валентинович (BEAVERS), ИП',
            'БЮФ Голдика, ООО',
            'ИОРДАНЬ',
            'Камар, ООО',
            'Кирилл Лось, ООО',
            'Колледж предприниматель-ства №11',
            'Маркиз, ювелирная фирма',
            'Саха Алмаз',
            'Тимофеевъ',
            'Ювелирный Дом «Ильгиз Ф.», ООО',
            'Ювелирный Дом Поднебесных (КИТ «Трейдинг»)',
            'Ювелиры России',
            'ЮВЭЛДИ, ООО',
        ];
    }

    public function makeRegLink(Request $request)
    {
        if ($request->get('company_name')) {
            Auth::logout();
            return redirect(url('/register?company_name=' . $request->get('company_name')));
        }

        return redirect(url('/register'));
    }
}

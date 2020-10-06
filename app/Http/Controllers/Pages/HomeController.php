<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\CurrencyController;
use App\Http\Controllers\Modules\FeedbackFormController;
use Illuminate\Support\Facades\Auth;
use App\Models\CompanyForReg;
use Illuminate\Support\Facades\Cookie;

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

    public function getRegLinks(Request $request)
    {
        if ($request->has('db')) {
            foreach ($this->regLinks() as $regLink) {
                CompanyForReg::create(['name' => $regLink]);
            }
        }
        $reg_links = $this->regLinks();

        return view('pages.reg-links', ['reg_links' => $reg_links]);
    }

    public function regLinks()
    {
        return [
            '999, ПО',
            'AGRA',
            'BALTSILVER',
            'BELLISSIMO JEWELLERY',
            'BRILLIANT STYLE',
            'BROVANZ',
            'CHAMOVSKIKH, ЮД',
            'CORDE',
            'CORONA',
            'DAIKO JEWELLERY',
            'DARVIN JEWELRY',
            'DIAMOND JF',
            'DIAMOND UNION (БРИЛЛИАНТ СОЮЗ)',
            'DINASTIA (ДИНАСТИЯ, ЮЗ)',
            'EFREMOV',
            'FILLART (КОЛОНИЦКИЙ Ф. А, ИП)',
            'FRESH JEWELRY',
            'GEMS BUTIK (ФИЛИНОВ П. Л., ИП)',
            'GEORGE KEVISIN (КВАШИН Т.М., ИП)',
            'GOLDEN FORUM',
            'INTALIA',
            'KRASNOE',
            'KU&KU',
            'L-SILVER, КОРПОРАЦИЯ',
            'LINEA',
            'MAIN DIZAIN',
            'MAXIM DEMIDOV',
            'MEDIA D\'ORO',
            'NEWGOLD',
            'PERASKEVA',
            'POKROVSKY JEWELLERY',
            'PRESTIGE JEWELRY',
            'RONDA',
            'RUBINOV JEWELRY',
            'RUSPEARLS',
            'SEVEN DIAMONDS',
            'STILE ITALIANO',
            'SUN STYLE',
            'SVS DIAMOND',
            'TOMGEM PLUS (БАТАЛИНА А. А., ИП)',
            'UNIPRICE',
            'VALENTIN YAREMIO',
            'VERONA',
            'VESNA JEWELRY',
            'YAROSLAVNA (ДОБРЯНСКАЯ Я. В., ИП)',
            'ZLATO, ЮК (ЖЕМЧУЖИНА)',
            'ZOLOTYE UZORY',
            'АВРОРА, ЮД',
            'АДАМАНТ, ЮВЕЛИРНАЯ КОМПАНИЯ',
            'АЛЕКСЕЙ ПОМЕЛЬНИКОВ, ЮК',
            'АЛЕКСИ',
            'АЛЬКОР, КЮФ',
            'АЛЬТМАСТЕР',
            'АЛЬФА, ЮК',
            'АЛЬФА-КАРАТ, ТПФ',
            'АМБЕРХОЛЛ',
            'АНЖЕЛИКА',
            'АНЖЕЛИКА ШАВКУНОВА',
            'АНТАЛ',
            'АРТ ФАЦЕТ',
            'АССОЦИАЦИЯ КЛАСТЕР ЯНТАРНОЙ ПРОМЫШЛЕННОСТИ КАЛИНИНГРАДСКОЙ ОБЛАСТИ',
            'АССОЦИАЦИЯ ПРОФЕССИОНАЛЬНЫХ УЧАСТНИКОВ РЫНКА ДРАГОЦЕННЫХ МЕТАЛЛОВ',
            'АУДЖА',
            'БОЛЬШАКОВ',
            'БОЯРЫНЯ, ЮФ (БАРИНОВА Л. Н., ИП)',
            'БРИЛЛИАНТЫ КОСТРОМЫ',
            'ВАЛЕНТИКО',
            'ВЕГА',
            'ВИОЛЕТ, ЮД',
            'ВЛАДИМИР ПИЧУГОВ',
            'ВОЛГО-ВЯТСКИЙ МОНЕТНЫЙ ДВОР',
            'ГАЛЕРЕЯ САРКИСЯН',
            'ГИАЛИТ КОСТРОМА',
            'ГОРДИН И. А., ИП',
            'ГРАНАТ, ЮК',
            'ГРАНТ, ЮЗ',
            'ДАРИНА, СЮК',
            'ДВОРЕЦ ОБРУЧАЛЬНЫХ КОЛЕЦ',
            'ДЕЛЬТА, КЮЗ',
            'ДЕМАНТОИД («ГРАНЬ-ЭКСПО»)',
            'ДЕФЛЁР, ЮД',
            'ДИАНА, ЮФ',
            'ЕЛИЗАВЕТА',
            'ЖЕМЧУЖНОЕ ПОДВОРЬЕ, ТМ',
            'ЗЛАТОГОР, ТМ',
            'ЗОЛОТАЯ ЛАДЬЯ (ГОРЯЧКИНА О. А., ИП)',
            'ЗОЛОТО КУБАЧИ',
            'ЗОЛОТОЙ БЕРЕГ',
            'ЗОЛОТОЙ ДРАКОН',
            'ЗОЛОТЫЕ НАКЛЕЙКИ VALERY',
            'ЗОЛОТЫЕ САМОРОДКИ КОЛЫМЫ',
            'ИМПЕРИАЛ, ЮК',
            'ИОРДАНЬ',
            'КАПОВАЯ ШКАТУЛКА',
            'КАРАВАЕВСКАЯ ЮВЕЛИРНАЯ ФАБРИКА',
            'КАРАТ, БЮЗ',
            'КАРАТ-К',
            'КАСТ, ЗАВОД',
            'КЛИО',
            'КЛОНДАЙК, ЮФ',
            'КОМДРАГМЕТАЛЛ ЯКУТИИ',
            'КОСТРОМСКОЙ АЛМАЗНЫЙ ДОМ',
            'КОСТРОМСКОЙ ЮВЕЛИРНЫЙ ЗАВОД',
            'КРАСНАЯ ПРЕСНЯ',
            'КРАСНОСЕЛЬСКИЙ ЮВЕЛИР',
            'КРАСНОСЕЛЬСКИЙ ЮВЕЛИРПРОМ',
            'КРАСЦВЕТМЕТ',
            'КРЕПКИЙ ОРЕШЕК',
            'КРУГЛОВ Д., ИП',
            'КУСТОВ, ЮП',
            'КУЧЕРОВА',
            'ЛАЙК',
            'ЛЕТО',
            'ЛЮКС, ЮК',
            'МАРКАЗИТ',
            'МАРШАЛ',
            'МАСКОМ',
            'МАСТЕР БРИЛЛИАНТ',
            'МАСТЕРСКАЯ РАЗДОЛЬЕ',
            'МЕГАГОЛД, ЮК',
            'МЕРКУРИЙ, ТД',
            'НЕВСКИЙ-СПБ',
            'НОВОЕ ВРЕМЯ',
            'НОРДИКА',
            'ОРЕОЛ ЮК',
            'ПАЛКИНА ИЛЬИ, ЮВЕЛИРНАЯ ДИЗАЙН-СТУДИЯ',
            'ПЕРВАЯ БРИЛЛИАНТОВАЯ',
            'ПИТЕРСКИЙ ДЖЕМ',
            'РИНГО',
            'РОСЗОЛОТО КУБАЧИ',
            'РУСГОЛДАРТ',
            'РУССКИЕ РЕМЕСЛА, ЦЕНТР',
            'РУССКИЕ САМОЦВЕТЫ',
            'РУССКИЙ СТИЛЬ',
            'РУТА',
            'САЛЬТО (БЕЛГОРОД)',
            'САМОЦВЕТЫ ПЛЮС (ЗАО «ЦДМ»)',
            'САН СТОУН СИЛЬВЕР',
            'САНИС, СЗЮЗ',
            'САПФИР',
            'САРГОН',
            'СБ ЗОЛОТО',
            'СЕВЕРНАЯ ЧЕРНЬ',
            'СЕНАТ',
            'СЕРЕБРО КУБАЧИ',
            'СЕРЕБРЯНЫЙ ДОМ',
            'СИГМА ГОЛД ЮД',
            'СИЯНИЕ СИБИРИ',
            'СЛАВНОВ',
            'СМОЛЬЯНИНОВА Н. Н., ИП',
            'СОРОКА, ТМ',
            'СОРОКИН, ЮК',
            'СПЕЦСВЯЗЬ РОССИИ',
            'СТАТУС, ЮЗ',
            'СУВЕНИРЫ БАЛТИКИ',
            'СУГУЕВ М. А.',
            'СУПЕР ДЖЕМС',
            'ТУЛИКОВ',
            'УЗОР УТУМ (ЗАБОЛОТЦКАЯ М. И., ИП)',
            'УРАН САХА (ЕГОРОВ Л. М., ИП)',
            'ФАБРИКА ГАЛЬВАНИКИ',
            'ФИТ',
            'ФОМЕНКО, ЮД',
            'ЦЕНТР ПОДДЕРЖКИ ПРЕДПРИНИМАТЕЛЬСТВА КИРОВСКОЙ ОБЛАСТИ',
            'ЦЕНТР ПОДДЕРЖКИ ЭКСПОРТА КОСТРОМСКОЙ ОБЛАСТИ',
            'ЦИРКОН С',
            'ЧП РУССКОЕ ВРЕМЯ',
            'ШАБЕР – НПО',
            'ЭТАЛОН-СТИЛЬ',
            'ЮВЕНГО',
            'ЮВЕРЕСТ',
            'ЮВИН',
            'ЮВЭЛДИ',
            'ЮМИЛА',
            'НТАРНАЯ ВОЛНА',
            'НТАРНАЯ МАНУФАКТУРА БАЛТИЙСКАЯ (ЛЕБЕДЕВ О. В., ИП)',
            'НТАРЬ РОССИИ (ШАВКУНОВ И. Н., ИП)',
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

    public function setManagerToReg($id)
    {
        setcookie('manager', $id, time() + 365 * 3 * 24 * 60 * 60, '/');
        return redirect('/');
    }
    
    public function getPrivacyPage()    
    { 
        return view('pages.privacy-policy');
    }
}

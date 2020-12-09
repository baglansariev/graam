<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    use ClientHelper;

    public $currency_api_url = 'https://www.cbr-xml-daily.ru/daily_json.js';

    public function getRates($rate = 'USD')
    {
        $client = $this->clientInit($this->currency_api_url);

        $response = $client->request('GET', $this->currency_api_url);
        $data = $response->getBody()->getContents();

        return json_decode($data, true)['Valute'];
    }
}

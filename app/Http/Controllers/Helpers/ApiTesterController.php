<?php

namespace App\Http\Controllers\Helpers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;


class ApiTesterController extends Controller
{
    public function index() :void
    {
        $client = new Client([
            'base_uri' => 'http://graam-crm.loc',
            'timeout' => 10,
        ]);

        $response = $client->request('GET', 'http://graam-crm.loc/api/v1/manager/3');

        echo '<pre>';
        $body = $response->getBody()->getContents();

        print_r($body);
    }
}

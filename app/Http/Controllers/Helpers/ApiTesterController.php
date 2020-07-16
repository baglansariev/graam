<?php

namespace App\Http\Controllers\Helpers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;


class ApiTesterController extends Controller
{
    public function index()
    {
//        $client = new Client([
//            'base_uri' => 'http://5.101.119.123:8081',
//            'timeout' => 2,
//        ]);
//
//        $response = $client->request('GET', 'http://5.101.119.123:8081/api/v1/client/create/12');
//        $body = $response->getBody()->getContents();
//
//        echo '<pre>';
//
//        print_r(json_decode($body));



//        if( $curl = curl_init() ) {
//            curl_setopt($curl, CURLOPT_URL, 'http://5.101.119.123:8081/api/v1/client/create/4');
//            curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
////            curl_setopt($curl, CURLOPT_POST, true);
////            curl_setopt($curl, CURLOPT_POSTFIELDS, "a=4&b=7");
//            $out = curl_exec($curl);
//            print_r(json_decode($out));
//            curl_close($curl);
//        }
    }
}

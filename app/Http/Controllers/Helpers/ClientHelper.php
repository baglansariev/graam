<?php
    namespace App\Http\Controllers\Helpers;
    use GuzzleHttp\Client;

    trait ClientHelper
    {
//        public $crm_client_url = 'http://5.101.119.123:8081';
        public $crm_client_api_url = 'http://5.101.119.123:8081/api/v1';
        public $crm_client_api_url2 = 'http://5.101.119.123:8090/api';

        public function clientInit() : object
        {
            return new Client([
                'base_uri' => $this->crm_client_api_url,
                'timeout' => 5,
            ]);
        }

        public function clientInitTest() : object
        {
            return new Client([
                'base_uri' => $this->crm_client_api_url2,
                'timeout' => 5,
            ]);
        }

        public function getResponseFromClient($method, $action, $params = [])
        {
            $client = $this->clientInit();

            $response = $client->request($method, $this->crm_client_api_url . $action, $params);
            return $response->getBody()->getContents();
        }

        public function getResponseFromClientTest($method, $action, $params = [])
        {
            $client = $this->clientInitTest();

            $response = $client->request($method, $this->crm_client_api_url2 . $action, $params);
            return $response->getBody()->getContents();
        }
    }
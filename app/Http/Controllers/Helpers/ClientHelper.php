<?php
    namespace App\Http\Controllers\Helpers;
    use GuzzleHttp\Client;

    trait ClientHelper
    {
//        public $crm_client_url = 'http://5.101.119.123:8081';
        public $crm_client_api_url = 'http://5.101.119.123:8081/api/v1';
        public $crm_client_api_url2 = 'http://5.101.119.123:8090/api';

        public function clientInit(String $base_uri) : object
        {
            return new Client([
                'base_uri' => $base_uri,
                'timeout' => 5,
            ]);
        }

        public function getResponseFromClient($method, $action, $params = [])
        {
            $client = $this->clientInit($this->crm_client_api_url);

            $response = $client->request($method, $this->crm_client_api_url . $action, $params);
            return $response->getBody()->getContents();
        }

        public function getResponseFromClientTest($method, $action, $params = [])
        {
            $client = $this->clientInit($this->crm_client_api_url2);

            $response = $client->request($method, $this->crm_client_api_url2 . $action, $params);
            return $response->getBody()->getContents();
        }
    }
<?php
    namespace App\Http\Controllers\Helpers;
    use GuzzleHttp\Client;

    trait ClientHelper
    {
        public $crm_client_url = 'http://5.101.119.123:8081';
        public $crm_client_api_url = 'http://5.101.119.123:8081/api/v1';

        public function clientInit() : object
        {
            return new Client([
                'base_uri' => $this->crm_client_api_url,
                'timeout' => 5,
            ]);
        }

        public function getResponseFromClient($method, $action)
        {
            $client = $this->clientInit();

            $response = $client->request($method, $this->crm_client_api_url . $action);
            return $response->getBody()->getContents();
        }
    }
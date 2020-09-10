<?php
    namespace App\Http\Controllers\Helpers;
    use GuzzleHttp\Client;

    trait ClientHelper
    {
//        public $crm_client_url = 'http://5.101.119.123:8081';
        public $crm_client_api_url = 'http://5.101.119.123:8081/api/v1';
        public $crm_client_api_url2 = 'http://5.101.119.123:8090/api';
//        public $crm_client_api_url2 = 'http://193.200.74.101/api';
        public $api_token = 'XyVkptmOZES1xfHgGv6kXTtoppXyTCdjxEbrELsFfRzYc78WUKXoDtPA6eekt7yWdqpPBLpNhhsu9mXi';
//        public $api_token = 'jM4E53HiO03uSLb19YDwqA1RRUtpfXwN6jP1STm1EZTRITXdpRbHnRBOFuxE4ICOgLEcywicOvMyopDm';

        public function clientInit(String $base_uri) : object
        {
            return new Client([
                'base_uri' => $base_uri,
                'timeout' => 7,
            ]);
        }

        public function getResponseFromClient($method, $action, $params = [])
        {
            $client = $this->clientInit($this->crm_client_api_url);
            $action = $this->addApiTokenToUrl($action);
            $response = $client->request($method, $this->crm_client_api_url . $action, $params);
            return $response->getBody()->getContents();
        }

        public function getResponseFromClientTest($method, $action, $params = [])
        {
            $client = $this->clientInit($this->crm_client_api_url2);
            $action = $this->addApiTokenToUrl($action);
            $response = $client->request($method, $this->crm_client_api_url2 . $action, $params);
            return $response->getBody()->getContents();
        }

        public function getResponseFromClientTest2($method, $action, $params = [])
        {
            $client = $this->clientInit($this->crm_client_api_url2);
//            $action = $this->addApiTokenToUrl($action);
            $response = $client->request($method, $this->crm_client_api_url2 . $action, $params);
            return $response->getBody()->getContents();
        }

        public function addApiTokenToUrl($action)
        {
            if (strpos($action, '?', 0) === false) {
                $action .= '?api_token=' . $this->api_token;
            }
            else {
                $action .= '&api_token=' . $this->api_token;
            }

            return $action;
        }
    }
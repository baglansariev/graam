<?php
    namespace App\Http\Controllers\Helpers;
    use GuzzleHttp\Client;
    use GuzzleHttp\Exception\ServerException;

    trait ClientHelper
    {
        public $test_crm_client_api_url = 'http://5.101.119.123:8081/api/v1';
        public $crm_client_api_url;
        public $api_token;

        public function clientInit(String $base_uri) : object
        {
            return new Client([
                'base_uri' => $base_uri,
                'timeout' => 10,
            ]);
        }

        public function setClientData()
        {
            $this->crm_client_api_url = 'http://193.200.74.101/api';
            $this->api_token = 'jM4E53HiO03uSLb19YDwqA1RRUtpfXwN6jP1STm1EZTRITXdpRbHnRBOFuxE4ICOgLEcywicOvMyopDm';

            if (request()->ip() == '127.0.0.1' || request()->getHost() == '5.101.119.123') {
                $this->crm_client_api_url = 'http://5.101.119.123:8091/api';
//                $this->api_token = 'jM4E53HiO03uSLb19YDwqA1RRUtpfXwN6jP1STm1EZTRITXdpRbHnRBOFuxE4ICOgLEcywicOvMyopDm';
                $this->api_token = 'g5dJ1MGVpfnqzWInj59byLyhF4yZECkKSfJoJLCoxIT5tqWHmKnD7G29kivlp1qtgRRSjPgyYEK4Mmcj';
            }
        }
        public function getResponseFromTestClient($method, $action, $params = [])
        {
            $client = $this->clientInit($this->test_crm_client_api_url);
            $action = $this->addApiTokenToUrl($action);
            $response = $client->request($method, $this->test_crm_client_api_url . $action, $params);
            return $response->getBody()->getContents();
        }

        public function getResponseFromClient($method, $action, $params = [])
        {
            $client = $this->clientInit($this->crm_client_api_url);
            $action = $this->addApiTokenToUrl($action);
          //  die( $this->crm_client_api_url . $action);
            $response = $client->request($method, $this->crm_client_api_url . $action, $params);
            return $response->getBody()->getContents();
        }

        public function getResponeToCRM($method, $action, $params=[]){
            $this->crm_client_api_url = 'http://system.graam.ru/api';
            $this->api_token = 'jM4E53HiO03uSLb19YDwqA1RRUtpfXwN6jP1STm1EZTRITXdpRbHnRBOFuxE4ICOgLEcywicOvMyopDm';
            $client = $this->clientInit($this->crm_client_api_url);
            $action = $this->addApiTokenToUrl($action);
            $response = $client->request($method, $this->crm_client_api_url . $action, $params);
            return $response->getBody()->getContents();
        }

        public function getResponseFromClientByQuery($method, $action, $params = [])
        {
            $client = $this->clientInit($this->crm_client_api_url);
            $response = $client->request($method, $this->crm_client_api_url . $action, $params);
            return $response->getBody()->getContents();
        }

        public function getResponseFromClient2($method, $action, $params = [])
        {
            $client = $this->clientInit($this->crm_client_api_url);
//            $action = $this->addApiTokenToUrl($action);
            $response = $client->request($method, $this->crm_client_api_url . $action, $params);

//            try {
//                $client->request($method, $this->crm_client_api_url2 . $action, $params);
//            }
//            catch (ServerException $exception) {
//                echo '<pre>';
//                print_r($exception->getResponse()->getBody()->getContents());
//                exit;
//            }

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

<?php

use app\Whapp;

class whatsAppBot
{
    private $APIurl = 'https://api.green-api.com/waInstance9689/';
    private $token = '/591b205456b087dda7728ec112c94c28c5c9f7a749360ec08a';

    public function __construct()
    {
    }
    
    public function index() { 
    
        $json = file_get_contents('php://input');
        $decoded = json_decode($json, true);

        ob_start();
        print_r($decoded);
        $input = ob_get_contents();
        ob_end_clean();
        file_put_contents('input_requests.log',$input.PHP_EOL,FILE_APPEND);

        if (isset($decoded)) {

            //foreach ($decoded as $mess) {

                ob_start();
                var_dump($decoded);
                $input = ob_get_contents();
                ob_end_clean();
                file_put_contents('input_messages.log',$input.PHP_EOL,FILE_APPEND);

                $chatId = $decoded['senderData']['chatId'];
                $text = explode(' ', trim($decoded['messageData']['textMessageData']['textMessage']));

                //$saved_mess = Whapp::where('chat_id', $chatId)->get();
            

//                if ($saved_mess && $text == 'привет'){
//                    $saved_mess->delete();
//                }
//
//                if ($text == 'купить' || $text == 'продать'){
//                    $new_mess = new Whapp;
//                    $new_mess->chat_id = $chatId;
//                    $new_mess->message = $new_mess->message . ' ' . $text;
//                    $new_mess->save();
//                }
//
//                if ($text == 'золото585' || $text == 'золото999' || $text == 'серебро999' || $text == 'серебро925' ) {
//                    $saved_mess->message = $saved_mess->message . ' ' . $text;
//                }

                //if(!$message['fromMe']){
                switch (mb_strtolower($text[0], 'UTF-8')) {
                    case 'привет':
                    {
                        $this->welcome($chatId, false);

                        break;
                    }
                    case 'купить':
                    case 'продать':
                    {
                        $this->chooseMaterial($chatId);

                        break;
                    }
                    case 'золото585':
                    case 'золото999':
                    case 'серебро999':
                    case 'серебро925':
                    {
                        $this->sendWeight($chatId);
                        break;
                    }
                    case 'вес':
                    {
                        $this->sendPrice($chatId);
                        break;
                    }

                    default:
                    {
                        $this->welcome($chatId, true);
                        break;
                    }
                }               
        }
    
        $saved_mess = Whapp::where('chat_id', '79032936326')->get();
        print_r($saved_mess);
    }
    
    public function sendRequest($method, $data)
    {
        $url = $this->APIurl . $method . $this->token;
        if (is_array($data)) {
            $data = json_encode($data);
        }
        $options = stream_context_create(['http' => [
            'method' => 'POST',
            'header' => 'Content-type: application/json',
            'content' => $data
        ]]);
        $response = file_get_contents($url, false, $options);
        echo $response;
    }

    public function sendMessage($chatId, $text)
    {
        $data = array('chatId' => $chatId, 'message' => $text);
        $this->sendRequest('SendMessage', $data);
    }

    public function welcome($chatId, $noWelcome = false)
    {
        $welcomeString = (!$noWelcome) ? "Вас приветствует GRAAM\n" : "Неправильная команда\n";
        $this->sendMessage($chatId,
            $welcomeString .
            "Выберите услугу:\n" .
            "Купить\n" .
            "Продать\n"
        );
    }

    public function chooseMaterial($chatId)
    {
        $materialText = "Выберите металл и пробу:\n" .
            "Золото585\n" .
            "Золото999\n" .
            "Серебро999\n" .
            "Серебро925\n";
        $this->sendMessage($chatId, $materialText);
    }

    public function sendWeight($chatId)
    {
        $weightText = "Введите вес металла в граммах (сообщение должно начинаться со слова 'вес')\n";
        $this->sendMessage($chatId, $weightText);
    }

    public function sendPrice($chatId)
    {
        $priceText = "Введите желаемую цену (сообщение должно начинаться со слова 'цена')\n";
        $this->sendMessage($chatId, $priceText);
    }




}

//new whatsAppBot();


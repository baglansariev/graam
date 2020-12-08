<?php

namespace App\Http\Controllers\Whatsapp;

use App\Whapp;
use App\Http\Controllers\Controller;

class WhatsAppBotController extends Controller
{
    private $APIurl = 'https://api.green-api.com/waInstance9689/';
    private $token = '/591b205456b087dda7728ec112c94c28c5c9f7a749360ec08a';


    public function index() {

        $json = file_get_contents('php://input');
        $decoded = json_decode($json, true);


        ob_start();
        print_r($decoded);
        $input = ob_get_contents();
        ob_end_clean();
        file_put_contents('input_requests.log',$input.PHP_EOL,FILE_APPEND);

        $user_phone = '79032936326';
        $chatId = '79032936326@c.us';
        $savedMess = Whapp::where('chat_id', $user_phone)->get();
        print_r($savedMess);
        die;

        if (isset($decoded)) {

            ob_start();
            print_r($decoded);
            $input = ob_get_contents();
            ob_end_clean();
            file_put_contents('input_messages.log',$input.PHP_EOL,FILE_APPEND);

            $chatId = $decoded['senderData']['chatId'];
            $user_phone = str_replace('@c.us', '', $decoded['senderData']['chatId']);
            $sender_name = $decoded['senderData']['senderName'];
            $text = explode(' ', trim($decoded['messageData']['textMessageData']['textMessage']));
            $code = mb_strtolower($text[0], 'UTF-8');
            $saved_mess = $this->checkDB($user_phone);


            if ($code == 'привет')
            {
                $this->welcome($chatId, false);

            } elseif ($code == 'купить' || $code == 'продать') {
                if ($saved_mess) {
                    $this->deleteDB($user_phone);
                }

                $this->createDB($user_phone, $sender_name, $code);
                $this->chooseMaterial($chatId);

            } elseif ($code == 'золото585' || $code == 'золото999' || $code == 'серебро999' || $code == 'серебро925' )

            {

                $target = 'metall_type';
                $this->updateDB($user_phone, $target, $code);
                $this->sendWeight($chatId);

            }elseif (ctype_digit($code) && ($saved_mess->weight == null || $saved_mess->weight == ''))

            {
                $target = 'weight';
                $this->updateDB($user_phone, $target, $code);
                $this->sendPrice($chatId);

            }elseif (ctype_digit($code) && $saved_mess->weight != null && ($saved_mess->price == null || $saved_mess->price == ''))
            {
                $target = 'price';
                $this->updateDB($user_phone, $target, $code);
                $this->choosePayment($chatId);

            }elseif ($code == 'наличные' || $code == 'безнал')
            {
                $target = 'payment_type';
                $this->updateDB($user_phone, $target, $code);
                $this->sendDeliveryDate($chatId);

            }elseif (is_Date($code) && $saved_mess->weight != null && $saved_mess->price != null && $saved_mess->delivery_date == null)
            {
                $target = 'delivery_date';
                $text = $decoded['messageData']['textMessageData']['textMessage'];
                $this->updateDB($user_phone, $target, $text);
                $this->sendPayDate($chatId);

            }elseif (is_Date($code) && $saved_mess->weight != null && $saved_mess->price != null && $saved_mess->delivery_date != null && $saved_mess->pay_date == null)

            {
                $target = 'pay_date';
                $text = $decoded['messageData']['textMessageData']['textMessage'];
                $this->updateDB($user_phone, $target, $text);
                $this->sendDealPassport($chatId);

            } elseif ($code == 'да' || $code == 'нет'){
                $target = 'passport';
                $this->updateDB($user_phone, $target, $code);
                $this->sendFinalPost($chatId, $user_phone);
            }


            else{
                $this->welcome($chatId, true);
            }
        }
    }

    public function checkDB($user_phone)
    {
        
        $savedMess = Whapp::where('chat_id', $chatId)->get();
        
//        $pdo = new PDO("mysql:host=$this->host;dbname=$this->database;charset=utf8", $this->user, $this->password);
//        $sql = 'SELECT * FROM whapps WHERE chat_id = ?';
//        $query = $pdo -> prepare($sql);
//        $query -> execute([$user_phone]);
//        $row = $query->fetch(PDO::FETCH_OBJ);
//        return $row;
//
//        $info = $query->errorInfo();
//        print_r($info);
    }

    public function createDB($user_phone, $sender_name, $text)
    {

        $pdo = new PDO("mysql:host=$this->host;dbname=$this->database;charset=utf8", $this->user, $this->password);
        $sql = 'INSERT INTO `whapps` SET `chat_id` = :id, `sender_name` = :name, `deal_type` = :text';
        $query = $pdo -> prepare($sql);
        $query -> execute(array('id' => $user_phone, 'name' => $sender_name, 'text' => $text));

        $info = $query->errorInfo();
        print_r($info);

    }

    public function updateDB($user_phone, $target, $inner_data)
    {

        $pdo = new PDO("mysql:host=$this->host;dbname=$this->database;charset=utf8", $this->user, $this->password);
        $sql = 'UPDATE whapps SET ' . $target . '= :text  WHERE chat_id = :id';
        $query = $pdo -> prepare($sql);
        $query -> execute(array('id' => $user_phone, 'text' => $inner_data));

        $info = $query->errorInfo();
        print_r($info);

    }


    public function deleteDB($user_phone)
    {

        $pdo = new PDO("mysql:host=$this->host;dbname=$this->database;charset=utf8", $this->user, $this->password);
        $sql = 'DELETE FROM whapps WHERE chat_id = ?';
        $query = $pdo -> prepare($sql);
        $query -> execute([$user_phone]);

        $info = $query->errorInfo();
        print_r($info);

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
        $weightText = "Введите вес металла в граммах\n";
        $this->sendMessage($chatId, $weightText);
    }

    public function sendPrice($chatId)
    {
        $priceText = "Введите желаемую цену\n";
        $this->sendMessage($chatId, $priceText);
    }

    public function choosePayment($chatId)
    {
        $paymentText = "Выберите предпочтительный способ оплаты:\n" .
            "Наличные\n" .
            "Безнал\n";

        $this->sendMessage($chatId, $paymentText);
    }

    public function sendDeliveryDate($chatId)
    {
        $deliveryText = "Введите желаемую дату отгрузки гггг-мм-дд (пример: 2020-01-01)\n";
        $this->sendMessage($chatId, $deliveryText);
    }

    public function sendPayDate($chatId)
    {
        $payText = "Введите желаемую дату оплаты гггг-мм-дд (пример: 2020-01-01)\n";
        $this->sendMessage($chatId, $payText);
    }

    public function sendDealPassport($chatId)
    {
        $passportText = "Хотите получить паспорт плавки?\n" .
            "Да\n" .
            "Нет\n";

        $this->sendMessage($chatId, $passportText);
    }

    public function sendDataToCrm($data)
    {

        $url = "http://5.101.119.123:8088/api/addTransWA";
        $crm_token = 'rLo41hunPjwGlVUfUNeOKrJRnWkgMHjatDSQS2oqxD9IJye2fjvlXsWEt7vGrU1FkjFqYmFZIwqvyScT';
        $ch = curl_init();
        $headers = [
            'Content-type: application/json',
            'Authorization: Bearer ' . $crm_token
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $output = curl_exec($ch);
        curl_close($ch);
        echo $output;

    }

    public function sendFinalPost($chatId, $user_phone)
    {
        $finalText = "Ваша заявка успешно сформирована.\n" . "Наш менеджер свяжется с Вами в ближайшее время\n";
        $this->sendMessage($chatId, $finalText);
        $dbData = $this->checkDB($user_phone);
        $deal_type = $dbData->deal_type;
        $user_payment = $dbDate->payment_type;

        if($dbData->metall_type){
            $str = $dbData->metall_type;
            $gold_content = '';
            $material = '';
            for($i = 0; $i < strlen($str); $i++)
            {
                is_numeric($str[$i]) ? $gold_content .= $str[$i] : $material .= $str[$i];
            }
            $material == 'золото' ? $material_id = 0 : $material_id = 1;

        }

        if ($deal_type == 'купить' && $gold_content == '999'){
            $type = 2;
        }
        if ($deal_type == 'купить' && ($gold_content == '585' || $gold_content == '925')) {
            $type = 4;
        }
        if ($deal_type == 'продать' && $gold_content == '999') {
            $type = 3;
        }
        if ($deal_type == 'продать' && ($gold_content == '585' || $gold_content == '925')) {
            $type = 1;
        }

        if ($user_payment == 'наличные') {
            $payment_type = 1;
        }
        if ($user_payment == 'безнал') {
            $payment_type = 0;
        }


        $dataToSend = [
            'user_phone' => $dbData->chat_id,
            'user_name' => $dbData->sender_name,
            'type' => $type,
            'gold_content' => $gold_content,
            'material_id' => $material_id,
            'price_gr' => $dbData->price,
            'weight' => $dbData->weight,
            'payment_type' => $payment_type
        ];

        $dataToSend = json_encode($dataToSend);
        ob_start();
        print_r($dataToSend);
        $input = ob_get_contents();
        ob_end_clean();
        file_put_contents('input_dataToSend.log',$input.PHP_EOL,FILE_APPEND);
        $this->sendDataToCrm($dataToSend);
    }

    public function is_Date($str)
    {
        return is_numeric(strtotime($str));
    }
}

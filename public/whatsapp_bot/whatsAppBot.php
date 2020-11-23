<?php


class whatsAppBot
{
    public $chatId;
    public $text;
    private $APIurl = 'https://api.green-api.com/waInstance9689/';
    private $token = '/591b205456b087dda7728ec112c94c28c5c9f7a749360ec08a';

    public function __construct(){
        $json = file_get_contents('php://input');
        $decoded = json_decode($json,true);

        //var_dump($decoded['messages']);

//        if ( isset($decoded['messages'])) {
//            foreach($decoded['messages'] as $message){
//            $text = explode(' ',trim($message['body']));
//                if(!$message['fromMe']){
//                switch(mb_strtolower($text[0],'UTF-8')){
//                case 'hi':  {$this->welcome($message['chatId'],false); break;}
//                case 'chatId': {$this->showchatId($message['chatId']); break;}
//                                case 'time':   {$this->time($message['chatId']); break;}
//                                case 'me':     {$this->me($message['chatId'],$message['senderName']); break;}
//                                case 'file':   {$this->file($message['chatId'],$text[1]); break;}
//                                case 'ptt':     {$this->ptt($message['chatId']); break;}
//                                case 'geo':    {$this->geo($message['chatId']); break;}
//                                case 'group':  {$this->group($message['author']); break;}
//                                default:        {$this->welcome($message['chatId'],true); break;}
//                                }
//                }
//            }
//        }
//
//
   }

    public function sendRequest($method,$data){
        $url = $this->APIurl.$method.$this->token;
        if(is_array($data)){ $data = json_encode($data);}
        $options = stream_context_create(['http' => [
            'method'  => 'POST',
            'header'  => 'Content-type: application/json',
            'content' => $data
        ]]);
        $response = file_get_contents($url,false,$options);
        echo $response;
    }

    public function sendMessage($chatId, $text){
        $data = array('chatId'=>$chatId,'message'=>$text);
        $this->sendRequest('SendMessage',$data);
    }

    public function welcome($chatId, $noWelcome = false){
        $welcomeString = ($noWelcome) ? "Incorrect command\n" : "WhatsApp Demo Bot PHP\n";
        $this->sendMessage($chatId,
            $welcomeString.
            "Commands:\n".
            "1. chatId - show ID of the current chat\n".
            "2. time - show server time\n".
            "3. me - show your nickname\n".
            "4. file [format] - get a file. Available formats: doc/gif/jpg/png/pdf/mp3/mp4\n".
            "5. ptt - get a voice message\n".
            "6. geo - get a location\n".
            "7. group - create a group with the bot");
    }

    public function showchatId($chatId){
        $this->sendMessage($chatId,'chatId: '.$chatId);
    }

    public function time($chatId){
        $this->sendMessage($chatId,date('d.m.Y H:i:s'));
    }

    public function me($chatId,$name){
        $this->sendMessage($chatId,$name);
    }

    public function ptt($chatId){
        $data = array(
            'audio'=>'https://domain.com/PHP/ptt.ogg',
            'chatId'=>$chatId
        );
        $this->sendRequest('sendAudio',$data);
    }

    public function geo($chatId){
        $data = array(
            'lat'=>51.51916,
            'lng'=>-0.139214,
            'address'=>'Ваш адрес',
            'chatId'=>$chatId
        );
        $this->sendRequest('sendLocation',$data);
    }

    public function group($author){
        $phone = str_replace('@c.us','',$author);
        $data = array(
            'groupName'=>'Group with the bot PHP',
            'phones'=>array($phone),
            'messageText'=>'It is your group. Enjoy'
        );
        $this->sendRequest('group',$data);
    }



}
//new whatsAppBot();
(new whatsAppBot)->sendMessage('79032936326@c.us', 'Проверка');

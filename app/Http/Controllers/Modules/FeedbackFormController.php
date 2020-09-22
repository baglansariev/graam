<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ClientHelper;
use Illuminate\Http\Request;

class FeedbackFormController extends Controller
{
    use ClientHelper;

    public function getSellAppForm()
    {
        return view('modules.feedback-form.sell-app');
    }

    public function sendSellApp(Request $request)
    {
        $action = '/feedback/sell-app';
        $request_data = $request->all();
        $this->setApplicationLog('applications.txt', $request_data);

        $this->setClientData();
        $request_data['api_token'] = $this->api_token;
        echo $this->getResponseFromClient('GET', $action, [
            'query' => $request_data,
        ]);
    }

    public function getOwnPriceAppForm()
    {
        return view('modules.feedback-form.own-price-app');
    }

    public function sendOwnPrice(Request $request)
    {
        $action = '/feedback/sell-app';
        $request_data = $request->all();
        $this->setApplicationLog('applications.txt', $request_data);

        $this->setClientData();
        $request_data['api_token'] = $this->api_token;
        echo $this->getResponseFromClient('GET', $action, [
            'query' => $request_data,
        ]);
    }

    public function joinToDeal(Request $request)
    {
        $action = '/feedback/sell-app';
        $request_data = $request->all();
        $this->setApplicationLog('applications.txt', $request_data);

        $this->setClientData();
        $request_data['api_token'] = $this->api_token;
        echo $this->getResponseFromClient('GET', $action, [
            'query' => $request_data,
        ]);
    }

    private function setApplicationLog($file_name, $data)
    {
        if (file_exists($file_name)) {
            $text = file_get_contents($file_name);
            $text .= serialize($data) . PHP_EOL;
            file_put_contents($file_name, $text);
            return true;
        }

        return false;
    }
}

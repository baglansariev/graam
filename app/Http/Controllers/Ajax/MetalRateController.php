<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ClientHelper;
use Illuminate\Http\Request;

class MetalRateController extends Controller
{
    use ClientHelper;

    public function getGoldRate()
    {
        echo $this->getResponseFromClient('GET', '/get-gold-rate');
    }
}

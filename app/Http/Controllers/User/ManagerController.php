<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ClientHelper;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    use ClientHelper;

    public function setManager($user_id)
    {
        $action = '/client/create/' . $user_id;

        return json_decode($this->getResponseFromTestClient('GET', $action), true);
    }

    public function getManager($manager_id)
    {
        $action = '/manager/get/' . $manager_id;

        return json_decode($this->getResponseFromTestClient('GET', $action), true);
    }
}

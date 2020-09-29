<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function changePendingStatus($id)
    {
        $user = User::find($id);
        $user->is_pending = 0;

        if ($user->save()) {
            echo response()->json(['status' => true])->getContent();
        }
        else {
            echo response()->json(['status' => false])->getContent();
        }
    }
}

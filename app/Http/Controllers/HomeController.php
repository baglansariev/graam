<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\ManagerController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $manager = new ManagerController();
        $user = Auth::user();

//        echo '<pre>';
//        print_r($manager->getManager($user->manager_id));
//        exit;

        $data = [
            'manager' => $manager->getManager($user->manager_id)['manager']
        ];

        return view('home', $data);
    }
}

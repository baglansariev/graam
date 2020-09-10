<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Helpers\ClientHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\ManagerController;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    use ClientHelper;

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

        $data = [
            'manager' => $manager->getManager($user->manager_id)['manager']
        ];

        return view('admin.home', $data);
    }
}

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
    public function index(Request $request)
    {
        $manager = new ManagerController();
        $user = Auth::user();
        $transactions = json_decode($this->getAllTransactions($request), true);

        $transactions_count = !empty($transactions) ? count($transactions) : 0;

        $data = [
            'manager' => $manager->getManager($user->manager_id)['manager'] ?? [],
            'transactions' => $transactions,
            'transactions_count' => $transactions_count,
            'user_details' => $user->detailsFromCrm(),
            'user' => $user,
        ];

        //return view('admin.home', $data);
        return view('user.orders', $data);
    }

    public function getAllTransactions(Request $request)
    {
        $page = 1;
        $type = '1,3';
        $sortby = 'weight';

        if ($request->get('page')) $page = $request->get('page');
        if ($request->get('type')) $type = $request->get('type');
        if ($request->get('sortby')) $sortby = $request->get('sortby');

        $action = '?page=' . $page;
        $action .= '&type=' . $type;
        $action .= '&sortby=' . $sortby;

        $this->setClientData();
        $response = $this->getResponseFromClient('GET', '/transaction' . $action);

        if ($user = Auth::user()) {
            $transactions   = [];
            $data           = json_decode($response, true);
            $index          = 0;
            $user_details   = $user->detailsFromCrm();
            $user_data      = [];

            foreach ($data as $item) {
                $transactions[$index] = $item;
                $user_data = [
                    'user_id' => $user->id,
                    'user_name' => $user->name ?? $user_details->name,
                    'user_phone' => $user->phone ?? $user_details->phone,
                    'deal_type' => ($type == '1,3') ? 'sell' : 'buy',
                ];

                $transactions[$index] = array_merge($transactions[$index], $user_data);
                $index++;
            }

            return json_encode($transactions);
        }

        return $response;
    }
}

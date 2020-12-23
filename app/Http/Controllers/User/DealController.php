<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ClientHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\ManagerController;

class DealController extends Controller
{
    use ClientHelper;

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $transactions =  json_decode($this->getUserTransactions($request), true);
        $transactions_count = !empty($transactions) ? count($transactions) : 0;
        $manager = new ManagerController();
        $manager = json_decode($manager->getManagerInfo($user->crm_id));

        $data = [
            'manager' => $manager,
            'transactions' => $transactions,
            'transactions_count' => $transactions_count
        ];


        //return view('admin.user.deals.index', ['deals' => $deals]);

        return view('user.myorders', $data);
    }

    public function getUserTransactions(Request $request)
    {
        $user           = Auth::user();
        $action         = '/contractor/get-transactions/' . $user->crm_id;
        $transactions   = [];
        $index          = 0;
        $user_details   = $user->detailsFromCrm();
        $user_data      = [];

        $page           = 1;
        $type           = '1,3';
        $user_id        = $user->id;
        $is_pending     = $user->is_pending ? $user->is_pending : false;

        if ($request->get('page')) $page = $request->get('page');
        if ($request->get('type')) $type = $request->get('type');

        $action .= '?page=' . $page;
        $action .= '&type=' . $type;
        $action .= '&is_pending=' . $is_pending;
        $action .= '&user_id=' . $user_id;

        $this->setClientData();
        $response =  $this->getResponseFromClient('GET', $action);
        $data     = json_decode($response, true);

        foreach ($data as $item) {
            $transactions[$index] = $item;
            $user_data = [
                'user_id' => $user->id,
                'user_name' => $user->name ?? $user_details->name,
                'user_phone' => $user->phone ?? $user_details->phone,
            ];

            $transactions[$index] = array_merge($transactions[$index], $user_data);
            $index++;
        }

        return json_encode($transactions);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

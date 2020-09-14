<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ClientHelper;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use App\Models\UserDocument;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use ClientHelper;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $this->setClientData();
        $response = $this->getResponseFromClient('GET', '/contractor/get-transactions/' . $user->id);
        $transactions = json_decode($response, true);


        return view('user/orders', compact('transactions'));
    }

    public function discount()
    {
        return view('user/discount');
    }

    public function archive()
    {
        return view('user/archive');
    }

    public function docs()
    {
        $docs = UserDocument::all()->toArray();
        return view('user/docs', compact('docs'));
    }

    public function info()
    {
        $user = Auth::user();
        return view('user/info', compact('user'));
    }

    public function test()
    {
        return view('home/content');
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
        if ($request->has(['company_name', 'email'])) {
            $user = Auth::user();
            $user->email = $request->post('email');

            $data = [
                'company_name' => $request->post('company_name'),
                'email' => $request->post('email'),
            ];

            if ($request->post('name')) {
                $data['name'] = $request->post('name');
            }
            if ($request->post('password')) {
                $user->password = Hash::make($request->post('password'));
            }
            if ($request->post('phone')) {
                $data['phone'] = $request->post('phone');
            }
            if ($request->post('birth_date')) {
                $data['birth_date'] = $request->post('birth_date');
            }
            if ($request->post('city')) {
                $data['city'] = $request->post('city');
            }

            $user->save();
            $this->setClientData();
            $response = $this->getResponseFromClient2('PUT', '/contractor/update/' . $user->crm_id, [
                'form_params' => [
                    'contractor' => $data,
                    'api_token' => $this->api_token,
                ],
            ]);

            if (json_decode($response, true)['status']) {
                session()->flash('msg_success', 'Данные успешно обновлены!');
            }
            else {
                session()->flash('msg_error', 'Произошла ошибка обратитесь к администратору!');
            }

        }

        return redirect(route('personal-info'));
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

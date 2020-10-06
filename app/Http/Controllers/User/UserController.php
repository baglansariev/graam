<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ClientHelper;
use App\Http\Controllers\User\ManagerController;
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
        $manager = new ManagerController();

        $this->setClientData();
        $response = $this->getResponseFromClient('GET', '/contractor/get-transactions/' . $user->id);
        $transactions = json_decode($response, true);

        $data = [
            'transactions' => $transactions,
            'manager' => $manager->getManager($user->manager_id)['manager'] ?? [],
            'user_details' => $user->detailsFromCrm(),
        ];


        return view('user/orders', $data);
    }


    public function discount()
    {
        $user = Auth::user();
        $manager = new ManagerController();

        $data = [
            'manager' => $manager->getManager($user->manager_id)['manager'] ?? [],
        ];
        return view('user/discount', $data);
    }

    public function archive()
    {
        $user = Auth::user();
        $manager = new ManagerController();
        $data = [
            'manager' => $manager->getManager($user->manager_id)['manager'] ?? [],
        ];
        return view('user/archive', $data);
    }

    public function docs()
    {
        $user = Auth::user();
        $manager = new ManagerController();
        $data = [
            'manager' => $manager->getManager($user->manager_id)['manager'] ?? [],
            'docs' => UserDocument::all()->toArray(),
        ];
        return view('user/docs', $data);
    }

    public function info()
    {
        $user = Auth::user();
        $manager = new ManagerController();
        $data = [
            'manager' => $manager->getManager($user->manager_id)['manager'] ?? [],
            'user' => $user,
            'user_details' => $user->detailsFromCrm(),
        ];
        return view('user/info', $data);
    }

    public function test()
    {
        $user = Auth::user();
        $manager = new ManagerController();
        $data = [
            'manager' => $manager->getManager($user->manager_id)['manager'] ?? [],
            'user' => $user,
        ];
        return view('home/content', $data);
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
        if ($request->has(['email'])) {

            $user = Auth::user();
            $user_details = $user->detailsFromCrm();
            $data = [];

            $user->email = $request->post('email');
            $data['email'] = ($user_details->entity_type == 2) ? $request->post('email') : false;

            $data['company_name'] = $request->has('company_name') ? $request->post('company_name') : false;

            if ($request->has('name')) {
                if ($user_details->entity_type == 2) {
                    $data['company_name'] = $request->post('name');
                }
                else {
                    $user->name = $request->post('name');
                }
            }

            if ($request->has('phone')) {
                if ($user_details->entity_type == 2) {
                    $data['phone'] = $request->post('phone');
                }
                else {
                    $user->phone = $request->post('phone');
                }
            }

            if ($request->has('birth_date')) {
                if ($user_details->entity_type == 2) {
                    $data['birth_date'] = $request->post('birth_date');
                }
                else {
                    $user->birth_date = $request->post('birth_date');
                }
            }

            if ($request->has('city')) {
                if ($user_details->entity_type == 2) {
                    $data['city'] = $request->post('city');
                }
                else {
                    $user->city = $request->post('city');
                }
            }

            if ($request->post('password')) {
                $user->password = Hash::make($request->post('password'));
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

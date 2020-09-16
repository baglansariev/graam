<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ClientHelper;
use App\Models\UserDetail;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\User\ManagerController;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    use ClientHelper;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
//            'company_name' => ['string', 'max:255'],
            'entity_type' => ['required', 'max:1'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
         $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Передача данных в CRM
        $this->setClientData();
        $response = $this->getResponseFromClient2('POST', '/contractor/create', [
            'form_params' => [
                'contractor' => [
                    'email' => $user->email,
                    'name' => $data['company_name'] ?? 'Физическое лицо',
                    'entity_type' => $data['entity_type'],
                ],
                'api_token' => $this->api_token,
            ],
        ]);

        $user->crm_id = json_decode($response, true)['id'];
        $user->save();



        return $user;
    }

    public function registered(Request $request, $user)
    {
        // Привязка менеджера к пользователю
//        $manager = new ManagerController();
//        $manager_data = $manager->setManager($user->id);
//        $user->update(['manager_id' => $manager_data['manager_id']]);
        $user->update(['manager_id' => 1]);

        $user->save();
    }
}

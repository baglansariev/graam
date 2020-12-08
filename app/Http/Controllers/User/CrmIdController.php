<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ClientHelper;
use Illuminate\Http\Request;
use App\User;

class CrmIdController extends Controller
{
    use ClientHelper;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $data = [];
        $phone = $request->phone;        
        $user = User::whereRaw('REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(phone,"+",""),"(",""),")",""),"-","")," ","") = "'.$phone.'"')->first(); 
        
        if ($user && $user != ''){
            $data = [
            'contractor_id' => $user->crm_id,
            'city' => $user->city,
            'manager' => $user->manager_id            
        ];        
        return $data; 
        }else {
            return '';
        }
         
         
    }  
    
    public function getUserById(Request $request) {
        $data = [];
        $crm_id = $request->crm_id;
        $user = User::where('crm_id', '=', $crm_id)->first(); 
        if ($user && $user != ''){
            $data = [
            'contractor_id' => $user->crm_id,
            'city' => $user->city,
            'manager' => $user->manager_id            
        ];        
        return json_encode($data); 
        }else {
            return false;
        }
    }
   
}

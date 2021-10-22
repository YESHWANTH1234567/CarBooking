<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function adminCreate(Request $datas)
    {   
        // print_r($data->all());exit;
        // $data=$datas->all();
        if(isset($datas)){
            $datas->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'mobile'=>['required','numeric','min:6'],
                // 'mobile_code'=>['required'],
            ]);
            $store=new User([
                'first_name' => $datas['first_name'],
                'last_name' => $datas['last_name'],
                'email' => $datas['email'],
                'password' => Hash::make($datas['password']),
                'mobile_code'=> $datas ['mobile_code'],
                'user_mobile'=>$datas['mobile'],
                'is_admin'=>$datas['is_admin'],      
    
            ]);
            $store->save();
        }
        return back()->with('success','register admin success');
        
    }
}

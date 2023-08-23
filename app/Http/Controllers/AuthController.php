<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;


use DB;
use Image;


class AuthController extends Controller
{
    public function login() 
    {     
       return view('admin.Auth.login'); 
    } 

     public function save_admin_login(Request $request) 
    {

      /*Request parameter validations*/  
        $validations= [ 
            'email'      => 'required', 
            'password'   => 'required' 
        ];  
        $msg        = [  
            'email.required'          =>     'email is required', 
            'password.required'       =>     'password is required'  
        ]; 
        $validator = Validator::make($request->all(), $validations,$msg); 
        if ($validator->fails()) { 
            $common_msg = implode(' ', $validator->errors()->all());  
            return redirect()->back()->with(['error'=>$common_msg]);   
        } else {  
             
            /*GET PARAMS IN VARIABLE*/ 
            $email           =   $request->input('email');  
            $password        =   $request->input('password'); 
            $hash_password   =   Hash::make($password);
            
            $is_user_found  =   \DB::table('users')
                                ->where('is_delete',0)
                                ->where('user_email',$email) 
                                ->first();    
            if(empty($is_user_found)){ 
                return redirect()->back()->with(['error'=>'unvalide email']); 
            } 

          /*CHECK PASSWORD IS VALID*/ 
            if(Hash::check($password,$is_user_found->password)) 
            { 
                session(['admin_session'=>$is_user_found]);
                return redirect("/home")->withSuccess("login successfully"); 
            } 
            else 
            { 
                return redirect()->back()->with(['error'=>'password wrong']); 
            } 
 
        }  
    }

    public function admin_destroy(Request $request) 
    {  
        $r=$request->session()->flush();

        return redirect('login'); 
    } 

}

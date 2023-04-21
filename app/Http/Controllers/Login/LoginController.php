<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Registration;
class LoginController extends Controller
{ 
    

    public function getlogin(){
   
       return view('VCREPORT.auth.login');
   
    }
    public function postlogin(Request $request){
   
   $request->validate([
   
       'email' => 'required|email',
       'password' => 'required'
   
   ]);
     $validated=auth ()->attempt([
   
       'email' =>$request->email,
       'password' =>$request->password,
       
      ]);
      if($validated){
   
        return redirect()->route('dashboard') ->with('success','Login successfull');
       
       
      }else{
       return redirect()->back() ->with('error','Invalid credentials');
      }
   
    }
}
    /**
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginform(){
        return view('login');
    }
    public function login(Request $request){
          $email=$request->email;
          $password=$request->password;
          if (Auth::attempt(['email' => $email, 'password' => $password,'role'=>'admin'])) {
            return view('adminhome');
        }
        elseif (Auth::attempt(['email' => $email, 'password' => $password,'role'=>'user'])) {
            return view('userhome');
        }elseif(Auth::attempt(['email'=>!$email,'password'=>$password])){
            return redirect('/')->with('emailerror',"Entered email is wrong");
        }
        // elseif(Auth::attempt(['email'=>$email,'password'=>!$password])){
        // return redirect('/')->with('passworderror',"Entered password is wrong");
        // }
        else{
            return redirect('/')->with('error',"Entered email or password is wrong");
        }
        
    }
}

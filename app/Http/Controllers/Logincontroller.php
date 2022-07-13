<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function create()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $email=$request->email;
        $password=$request->password;
        if(Auth::attempt(['email' => $email, 'password' => $password,'role'=>'admin'])) {
        return view('adminhome');
    }
       if (Auth::attempt(['email' => $email, 'password' => $password,'role'=>'user'])) {
       return view('userhome');
       }
       else{
        return redirect('/')->with('error',"Entered email or password is wrong");
       }

    }
}
<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    public function getLogin()
    {
        return view('dashboard.auth.login');
    }

    public function login(Request $request)
    {
        $remember_token = $request->has('remember') ? true : false ;

        if(auth()->guard('admin')->attempt(['email'=> $request->input("email") ,'password' =>  $request->input("password")  ] , $remember_token))
        {
            return redirect()->route('index');
        }
        return \Redirect::back()->withErrors(['msg' => 'Email or Password doesn\'t correct']);
    }

    public function logout()
    {
        $guard  = $this->getGaurd();
        $guard->logout();
        return redirect()->route('login');
    }


    private function getGaurd(){
        return auth('admin');
    }

}

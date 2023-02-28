<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login_Model;
use Session;
use Auth;

class Login_Controller extends Controller
{
    public function login(Request $request)
    {
        // dd("test");

      if(Login_Model::login($request)){
        return redirect('/dashboard');

      }else{

        // return redirect('/login')->with('error', md5($request->password));
        // return back()->with('error', $request->password);
        return back()->with('status', 'Loginname atau Password salah !');
      }

    }
    public function logout(Request $request)
    {
      // Login_Model::logout($request);
      Auth::logout();
      Session::flush();
        return redirect('/login');
        // return redirect('/')->with('error', $request->password);


    }


}

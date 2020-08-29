<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    function index(){

    	return view('login.index');
    }

    function verify(Request $request){

    	if($request->username == $request->password){
    		//session
        $request->session()->put('username',$request->username);
    		return redirect('/home');
    	}
      else{
        $request->session()->flash('msg','Invalid username/password');
        return redirect('/login');
      }
    }
}

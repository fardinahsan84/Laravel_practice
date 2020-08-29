<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{

    function index(){

    	return view('login.index');
    }

    function verify(Request $request){
      $user= new User;
      $data = $user->where('username',$request->username)
                  ->where('password',$request->password)
                  ->get();
      //echo $data[0]->username;

    	if(count($data) > 0){
    		//session
        if($data[0]['userType']=="manager"){
          $request->session()->put('username',$request->username);
      		return redirect('/home');
        }else{

        }
    	}
      else{
        $request->session()->flash('msg','Invalid username/password');
        return redirect('/login');
      }
    }
}

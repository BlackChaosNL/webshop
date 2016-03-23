<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function run(){
        return view('pages.login');
    }

    public function login(Request $request){
        $validator = Validator::make(
            array(
                'username' => $request['username'],
                'password' => $request['password']
            ),
            array(
                'username' => 'required',
                'password' => 'required'
            )
        );
        $messages = $validator->messages();
        if(Auth::attempt(['Username' => $request['username'], 'password' => $request['password']], $request['remember'])){
            return redirect()->intended('/');
        }else{
            if($validator->fails()){
                return Redirect::to('login')->with('err', 'shit went wrong');
                //return redirect()->intended('login')->with('message', 'Shit\'s broken man.');
            }else{
                return Redirect::to('login')->with('err', 'shit went wrong');
                //return redirect()->intended('login')->with('message', 'Login failed');
            }
        }
    }

    public function register(){

    }
}

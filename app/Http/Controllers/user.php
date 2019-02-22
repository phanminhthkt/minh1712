<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\user_n;
use Illuminate\Support\MessageBag;

class user extends Controller
{
    public function getLogin() {
    	return view('login');
    }
    public function postLogin(Request $request) {
    	$user = DB::table('users')->where('name',$request->username)->where('password',md5($request->password))->get();
    	if(count($user)>0){
    		$request->session()->put('login', true);
        	$request->session()->put('name', $request->username);
    		return redirect()->route('userinfo');
    	}else{
    		$errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
			return redirect()->back()->withErrors($errors);
    	}
    }
    public function getLogout(Request $request) {
    	$request->session()->flush();
    	return redirect()->route('login');
    }
}

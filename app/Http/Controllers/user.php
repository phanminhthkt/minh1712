<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User_n;
use Illuminate\Support\MessageBag;
use Session;

class user extends Controller
{
    public function getLogin() {
    	return view('login');
    }
    public function postLogin(Request $request) {
    	$user = DB::table('users')->where('name',$request->username)->where('password',md5($request->password))->first();
    	if(count($user)>0){
    		$request->session()->put('login', true);
            $request->session()->put('name', $user->name);
        	$request->session()->put('email', $user->email);
    		return redirect()->route('Userinfo');
    	}else{
    		$errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
			return redirect()->back()->withErrors($errors);
    	}
    }
   
    public function getRegister(Request $request) {
        return view('register');
    }
    public function postRegister(Request $request) {
        DB::table('users')->insert(
            [
                'name' => $request->username,
                'password' => md5($request->password),
                'email' => $request->email
            ]
        );
       return redirect()->route('login');
    }
    public function postUpdateUser(Request $request) {
        $user = DB::table('users')->where('name',Session::get('name'))->where('password',md5($request->password))->first();
        if(count($user)>0){
            DB::table('users')->where("name",Session::get('name'))->update(
                [
                    'email' => $request->email
                ]
            );
            $request->session()->put('email', $request->email);
           return redirect()->route('Userinfo');
        }else{
            $errors = new MessageBag(['errorpass' => 'Error password']);
            return redirect()->back()->withErrors($errors);
        }
        
    }
    public function getUpdatePassword(Request $request) {
        return view('update_password');
    }
    public function postUpdatePassword(Request $request) {
        $user = DB::table('users')->where('name',Session::get('name'))->where('password',md5($request->password))->first();
        if(count($user)>0){
            DB::table('users')->where("name",Session::get('name'))->update(
                [
                    'password' => md5($request->newpassword)
                ]
            );
            $request->session()->flush();
            return redirect()->route('login');
        }else{
            $errors = new MessageBag(['errorpass' => 'Error password']);
            return redirect()->back()->withErrors($errors);
        }
        
    }
     public function getLogout(Request $request) {
        $request->session()->flush();
        return redirect()->route('login');
    }
}
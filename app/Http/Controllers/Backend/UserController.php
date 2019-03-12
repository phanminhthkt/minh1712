<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\CheckUserRequest;
use Illuminate\Support\MessageBag;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\UsersNew;


class UserController extends Controller
{
    public function GetLogin(){
        
        return view('Backend.login');
    }
    public function PostLogin(CheckUserRequest  $request){
        if(Auth::attempt(['name' => $request->username, 'password' => $request->password])){
            return redirect()->route('Backend.Dashboard');
        }else{
             $errors = new MessageBag(['Errorlogin' => 'Username or Password error']);
            return redirect()->back()->withErrors($errors);
        }
    }
    public function Logout(){
        Auth::logout();
        return redirect()->route('Login');
    }
}
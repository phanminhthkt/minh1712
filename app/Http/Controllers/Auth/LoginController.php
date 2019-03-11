<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username()
    {
        return 'username';
    }
    public function GetLogin(){
        return view('Backend.login');
    }
    public function PostLogin(CheckUserRequest  $request){
        if(Auth::attempt(['name' => $request->username, 'password' => $request->password])){
            // $request->session()->put('login', [true,'name' => $user->name,'email' => $user->email]);
            return redirect()->intended('dashboard');
        }else{
            $errors = new MessageBag(['Errorlogin' => 'Username or Password error']);
            return redirect()->back()->withErrors($errors);
        }
    }
}

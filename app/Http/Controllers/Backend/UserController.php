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
    // public function getLogin() {
    // //Hiển thị giao diện đăng nhập    
    //     return view('login');
    // }
    // public function postLogin(CheckUserRequest $request) { 
    // //Đăng nhập với 2 biến truyền vào là $request->username,$request->password
    //     $user = DB::table('users')->where('name',$request->username)->where('password',md5($request->password))->first();
    //     if(count($user)>0){ //Đúng thông tin sẽ chuyển đến trang thông tin user
    //         $request->session()->put('login', [true,'name' => $user->name,'email' => $user->email]);
    //         return redirect()->route('Userinfo');
    //     }else{  //Sai thông tin sẽ chuyển về trang đăng nhập và hiện thông báo lỗi
    //         $errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
    //         return redirect()->back()->withErrors($errors);
    //     }
    // }
    // public function getRegister(Request $request) {
    // //Hiển thị giao diện đăng đăng ký     
    //     return view('register');
    // }
    // public function postRegister(Request $request) {
    // //Đăng ký với 3 biến truyền vào là $request->username,$request->password,$request->email    
    //     DB::table('users')->insert(
    //         [
    //             'name' => $request->username,
    //             'password' => md5($request->password),
    //             'email' => $request->email
    //         ]
    //     );
    //     return redirect()->route('login');
    // }
    // public function postUpdateUser(Request $request) {
    // //Thay đổi thông tin user với biến truyền vào $request->password  
    //     $user = DB::table('users')->where('name',Session::get('name'))->where('password',md5($request->password))->first();
    //     if(count($user)>0){ //Đúng mật khẩu sẽ thay đổi được thông tin email
    //         DB::table('users')->where("name",Session::get('name'))->update(
    //             [
    //                 'email' => $request->email
    //             ]
    //         );
    //         $request->session()->put('email', $request->email);
    //         return redirect()->route('Userinfo');
    //     }else{  //Sai mật khẩu trở về giao diện thông tin user và hiện thông báo lỗi
    //         $errors = new MessageBag(['errorpass' => 'Error password']);
    //         return redirect()->back()->withErrors($errors);
    //     }
    // }
    // public function getUpdatePassword(Request $request) {
    // //Hiển thị giao diện đổi mật khẩu     
    //     return view('update_password');
    // }
    // public function postUpdatePassword(Request $request) {
    // //Thay đổi mật khẩu với tham số truyền vào là $request->newpassword,$request->password   
    //     $user = DB::table('users')->where('name',Session::get('name'))->where('password',md5($request->password))->first();
    //     if(count($user)>0){ //Đúng mật khẩu sẽ thay đổi mật khẩu và đăng xuất.
    //         DB::table('users')->where("name",Session::get('name'))->update(
    //             [
    //                 'password' => md5($request->newpassword)
    //             ]
    //         );
    //         $request->session()->flush();
    //         return redirect()->route('login');
    //     }else{//Sai mật khẩu về giao diện đổi mật khẩu và hiện thông báo lỗi.
    //         $errors = new MessageBag(['errorpass' => 'Error password']);
    //         return redirect()->back()->withErrors($errors);
    //     }
    // }
    // public function getLogout(Request $request) {
    // //Đăng xuất trở về trang đăng nhập    
    //     $request->session()->flush();
    //     return redirect()->route('login');
    // }
}
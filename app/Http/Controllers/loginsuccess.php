<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginsuccess extends Controller
{
    public function index(Request $request) {
    	if($request->session()->exists('login')==false){
    		return redirect()->route('login');
    	}else{
    		return view('user');
    	}
    	
    }
}

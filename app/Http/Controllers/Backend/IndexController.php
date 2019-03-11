<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
    	return view('Backend.index');
    }
    public function login(){
    	return view('Backend.login');
    }
}

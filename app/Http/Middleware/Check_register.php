<?php

namespace App\Http\Middleware;

use Closure;
use Validator;
use Illuminate\Http\Request;

class Check_register
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $rules=[
                'username' => 'required|unique:users,name',
                'password' => 'required',
                'email' => 'required|email|unique:users,email',
            ];
        $messages=[
                'username.required' => 'Please enter username',
                'username.unique' => 'Username was registered',
                'password.required' => 'Please enter password',
                'email.required' => 'Please enter email',
                'email.email' => 'Please re-enter email(Ex:abc@gmail.com...)',
                'email.unique' => 'Email was registered',
            ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }  
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Validator;

class Check_login
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
                'username' => 'required',
                'password' => 'required',
            ];
        $messages=[
                'username.required' => 'Please enter username',
                'password.required' => 'Please enter password',
            ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } 
        return $next($request);
    }
}

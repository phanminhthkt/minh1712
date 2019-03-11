<?php

namespace App\Http\Middleware;

use Closure;
use Validator;
use Illuminate\Http\Request;

class Check_update_password
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
                'password' => 'required',
                'newpassword' => 'required',
            ];
        $messages=[
                'password.required' => 'Please enter password',
                'newpassword.required' => 'Please enter new password',
            ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }  
        return $next($request);
    }
}

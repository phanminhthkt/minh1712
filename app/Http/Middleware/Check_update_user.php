<?php

namespace App\Http\Middleware;

use Closure;
use Validator;
use Illuminate\Http\Request;

class Check_update_user
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
                'email' => 'required|email',
            ];
        $messages=[
                'password.required' => 'Please enter password',
                'email.required' => 'Please enter email',
                'email.email' => 'Please re-enter email(Ex:abc@gmail.com...)',
            ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }  
        return $next($request);
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];
        return $rules;
    }
    public function messages()
    {
      $messages = ['username.required' => 'Username is not exist'];
      $messages = ['password.required' => 'Password is required'];
      return $messages;
    }
    
}

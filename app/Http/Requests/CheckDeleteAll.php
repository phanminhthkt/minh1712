<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckDeleteAll extends FormRequest
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
            'listid' => 'required',
        ];
        return $rules;
    }
    public function messages()
    {
      $messages = ['listid.required' => 'Please check the row to delete'];
      return $messages;
    }
}

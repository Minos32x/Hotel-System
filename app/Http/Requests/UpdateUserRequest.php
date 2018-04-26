<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        return [
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'avatar'=>'required',
            'gender'=>'required',
        ];

    }


    public function messages()
    {
        return [
            'name.required'=>'User Name Is Required',
            'email.required'=>'User Email Is Required',
            'phone.required'=>'User Phone Is Required',
            'avatar.required'=>'User Avatar Is Required',
            'gender.required'=>'User Gender Is Required',


        ];
    }
}

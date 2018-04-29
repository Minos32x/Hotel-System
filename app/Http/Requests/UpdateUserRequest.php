<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'id' => 'exists:users,id',
            'name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($this->email, 'email') ],
            'phone' => 'required|min:11|integer',
            'avatar' => 'image|mimes:jpg,jpeg',
            'gender' => ['required',
                Rule::in(['male', 'female'])],
            'country'=>'required'
        ];

    }


    public function messages()
    {
        return [
            'name.required' => 'User Name Is Required',
            'email.required' => 'User Email Is Required',
            'phone.required' => 'User Phone Is Required',
            'avatar.required' => 'User Avatar Is Required',
            'gender.required' => 'User Gender Is Required',
            'country.required'=>'Country Should Be Selected'


        ];
    }
}

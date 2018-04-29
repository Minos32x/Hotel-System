<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
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
            'id' => 'exists:employees,id',
            'name' => 'required',
            'email' => ['required', Rule::unique('employees')->ignore($this->email, 'email')],
            'national_id'=>'required|integer',
            'avatar' => 'image|mimes:jpg,jpeg',
            
        ];
    }

    public function messages()
    {
        return [
            'id.exists'=>'Employee Doesn\'t Exist',
            'name.required' => 'Employee Name Is Required',
            'email.required' => 'Employee Email Is Required',
            'phone.required' => 'Employee Phone Is Required',
            'avatar.required' => 'Employee Avatar Is Required',
            'avatar.mimes' => 'Employee Avatar Is Should Be Jpg or Jpeg Only',
            'gender.required' => 'Employee Gender Is Required',
            'national_id.required'=>'Employee National Id Is Required',
            'national_id.integer'=>'Enter Correct National Id',

            ];

    }

}

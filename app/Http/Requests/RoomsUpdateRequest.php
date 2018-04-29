<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoomsUpdateRequest extends FormRequest
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
            'id' => 'exists:rooms,id',
            'number' => ['required','integer', Rule::unique('rooms')->ignore($this->number, 'number')],
            'capacity' => 'required|integer',
            'price' => 'required|integer',
            'floor_id'=>'required|exists:floors,id|integer'
        ];
    }

    public function messages()
    {
        return [
            'number.required' => 'Room Number Is Required',
            'capacity.required' => 'Room Capacity Is Required',
            'price.required' => 'Room Price Is Required',
        ];
    }
}

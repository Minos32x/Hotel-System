<?php

namespace App\Http\Requests;

use App\Room;
use Illuminate\Foundation\Http\FormRequest;

class CreateReservationRequest extends FormRequest
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

        $max=Room::find($this->route('id'))->capacity;
        return [
            'accompany_number'=>'required|integer|max:'.$max
        ];
    }


    public function messages()
    {
        $max=Room::find($this->route('id'))->capacity;
        return [
            'accompany_number.required' => 'Accompany Number Is Required',
            'accompany_number.max' => 'Max Accompany NUmber Is '.$max


        ];
    }
}

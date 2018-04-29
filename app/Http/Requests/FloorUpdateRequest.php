<?php

namespace App\Http\Requests;

use App\Room;
use Illuminate\Foundation\Http\FormRequest;

class FloorUpdateRequest extends FormRequest
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
        $min=Room::where('floor_id',$this->route('id'))->count();
        return [

            'no_of_room'=>'required|integer|min:'.$min
        ];
    }

    public function messages()
    {
        $min=Room::where('floor_id',$this->route('id'))->count();
        return [
            'no_of_room.required' => 'Floor Number Is Required',
            'no_of_room.min' => 'Floor Number OF Rooms Must Be At Least '.$min


        ];
    }
}

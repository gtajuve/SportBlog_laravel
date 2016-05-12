<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PlayerRequest extends Request
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
            'first_name'=>'required|min:2',
            'last_name'=>'required|min:2',
            'country'=>'required|min:3',
            'image'=>'required|min:3',
            'games'=>'required|Integer|Min:0',
            'goals'=>'required|Integer|Min:0',
        ];
    }
}

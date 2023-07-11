<?php

namespace App\Http\Requests\API;

use App\Models\AlarmCateg;
use InfyOm\Generator\Request\APIRequest;

class UpdateAlarmCategAPIRequest extends APIRequest
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
        $rules = AlarmCateg::$rules;
        
        return $rules;
    }
}

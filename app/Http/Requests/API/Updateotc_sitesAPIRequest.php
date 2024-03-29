<?php

namespace App\Http\Requests\API;

use App\Models\otc_sites;
use InfyOm\Generator\Request\APIRequest;

class Updateotc_sitesAPIRequest extends APIRequest
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
        $rules = otc_sites::$rules;
        
        return $rules;
    }
}

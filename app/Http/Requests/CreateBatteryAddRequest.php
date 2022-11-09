<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\BatteryAdd;

class CreateBatteryAddRequest extends FormRequest
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
        return BatteryAdd::$rules;
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'ref_wo.required' => __('models/batteryAdds.fields.volt_before') . ' is required',
            'ref_cr.required' => __('models/batteryAdds.fields.volt_before') . ' is required',
            'volt_before.required' => __('models/batteryAdds.fields.volt_before') . ' is required',
            'Amp_before.required' => __('models/batteryAdds.fields.Amp_before') . ' is required',
            'batter_1_sn.required' => __('models/batteryAdds.fields.battery_sn') . ' is required',
            'batter_2_sn.required' => __('models/batteryAdds.fields.battery_sn') . ' is required',
            'batter_3_sn.required' => __('models/batteryAdds.fields.battery_sn') . ' is required',
            'batter_4_sn.required' => __('models/batteryAdds.fields.battery_sn') . ' is required',
            'num_of_rect.required' => __('models/batteryAdds.fields.num_of_rect') . ' is required',
            'rect_num.required' => __('models/batteryAdds.fields.rect_num') . ' is required',
            'bank_num.required' => __('models/batteryAdds.fields.bank_num') . ' is required',
            'install_date.required' => __('models/batteryAdds.fields.install_date') . ' is required',
            'aircon_status.required' => __('models/batteryAdds.fields.aircon_status') . ' is required',
            'rect_charge_status.required' => __('models/batteryAdds.fields.rect_charge_status') . ' is required',
            'old_batteries_aging.required' => __('models/batteryAdds.fields.old_batteries_aging') . ' is required',
            'llvd.required' => __('models/batteryAdds.fields.llvd') . ' is required',
            'blvd.required' => __('models/batteryAdds.fields.blvd') . ' is required',
            'capacity_rating.required' => __('models/batteryAdds.fields.capacity_rating') . ' is required',
            'battery_brand.required' => __('models/batteryAdds.fields.battery_brand') . ' is required',
            'Battery_model.required' => __('models/batteryAdds.fields.Battery_model') . ' is required',
            'Volt_after.required' => __('models/batteryAdds.fields.Volt_after') . ' is required',
            'Amp_After.required' => __('models/batteryAdds.fields.Amp_After') . ' is required',
            'remarks.required' => __('models/batteryAdds.fields.remarks') . ' is required',

        ];
    }
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            // 'email' => 'email address',
        ];
    }
}

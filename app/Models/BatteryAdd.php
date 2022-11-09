<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class BatteryAdd
 * @package App\Models
 * @version October 25, 2022, 12:25 am +04
 *
 * @property integer $site__deployed
 * @property integer $shelter_num
 * @property string $ref_wo
 * @property string $ref_cr
 * @property string $batter_1_sn
 * @property integer $num_of_rect
 * @property integer $rect_num
 * @property integer $bank_num
 * @property string $install_date
 * @property integer $aircon_status
 * @property integer $rect_charge_status
 * @property integer $old_batteries_aging
 * @property number $llvd
 * @property number $blvd
 */
class BatteryAdd extends EloquentModel
{
    use SoftDeletes;


    public $table = 'battery_add';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'site__deployed',
        'added_by',
        'shelter_num',
        'ref_wo',
        'ref_cr',
        'batter_1_sn',
        'num_of_rect',
        'rect_num',
        'bank_num',
        'install_date',
        'aircon_status',
        'rect_charge_status',
        'old_batteries_aging',
        'llvd',
        'blvd',
        'Amp_before',
        'volt_before' ,
        'Volt_after' ,
        'Amp_After',
        'capacity_rating',
        'battery_brand',
        'Battery_model',
        'remarks'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'site__deployed' => 'integer',
        'shelter_num' => 'integer',
        'ref_wo' => 'string',
        'ref_cr' => 'string',
        'batter_1_sn' => 'string',
        'num_of_rect' => 'integer',
        'rect_num' => 'integer',
        'bank_num' => 'integer',
        'install_date' => 'date',
        'aircon_status' => 'integer',
        'rect_charge_status' => 'integer',
        'old_batteries_aging' => 'integer',
        'llvd' => 'float',
        'blvd' => 'float',
        'Amp_before'=>'float',
        'volt_before' =>'float',
        'Volt_after' =>'float',
        'Amp_After'=>'float',
        'capacity_rating'=>'integer',
        'battery_brand'=>'string',
        'Battery_model'=>'string',
        'remarks'=>'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'batter_1_sn' => 'required|unique:battery_add',
        'battery_2_sn' => 'required|unique:battery_add,batter_1_sn',
        'battery_3_sn' => 'required|unique:battery_add,batter_1_sn',
        'battery_4_sn' => 'required|unique:battery_add,batter_1_sn',
        'site__deployed' => 'required',
        'shelter_num' => 'required',
        'ref_wo' => 'required',
        'ref_cr' => 'required',

        'num_of_rect' => 'required',
        'rect_num' => 'required',
        'bank_num' => 'required',
        'install_date' => 'date',
        'aircon_status' => 'required',
        'rect_charge_status' => 'required',
        'old_batteries_aging' => 'required',
        'llvd' => 'required',
        'blvd' => 'required',
        'Amp_before'=>'required',
        'volt_before' =>'required',
        'Volt_after' =>'required',
        'Amp_After'=>'required',
        'capacity_rating'=>'required',
        'battery_brand'=>'required',
        'Battery_model'=>'required',
        'remarks'=>'nullable'
    ];

    /**
     * Get the site that owns the BatteryAdd
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function site()
    {
        return $this->belongsTo(Site::class, 'site__deployed', 'id');
    }

    /**
     * Get the user that owns the BatteryAdd
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'added_by');
    }


}

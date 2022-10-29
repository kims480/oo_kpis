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
        'blvd'
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
        'blvd' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'batter_1_sn' => 'unique:battery_add'
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


}

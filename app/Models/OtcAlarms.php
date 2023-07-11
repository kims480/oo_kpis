<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class OtcAlarms
 * @package App\Models
 * @version July 11, 2023, 11:22 pm +04
 *
 * @property \App\Models\OtcCateg $id
 * @property \App\Models\User $id
 * @property string $name
 * @property integer $add_by
 * @property string $details
 * @property integer $categ_id
 * @property integer $notes
 */
class OtcAlarms extends Model
{
    use SoftDeletes;


    public $table = 'otc_alarms';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'add_by',
        'details',
        'categ_id',
        'notes',
        'sla'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [

        'name' => 'string',
        'add_by' => 'integer',
        'details' => 'string',
        'categ_id' => 'integer',
        'notes' => 'string',
        'sla' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function otcCateg()
    {
        return $this->belongsTo(\App\Models\OtcCateg::class, 'id', 'categ_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'id', 'add_by');
    }
}

<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class OtcCateg
 * @package App\Models
 * @version July 11, 2023, 10:51 pm +04
 *
 * @property integer $id
 * @property string $name
 * @property integer $add_by
 * @property string $details
 * @property string $notes
 */
class OtcCateg extends Model
{
    use SoftDeletes;


    public $table = 'otc_categs';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'name',
        'add_by',
        'details',
        'notes'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'add_by' => 'integer',
        'details' => 'string',
        'notes' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * Get all of the otc_alarms for the OtcCateg
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function otc_alarms()
    {
        return $this->hasMany(OtcAlarms::class, 'categ_id', 'id');
    }
    /**
     * Get all of the otc_alarms for the OtcCateg
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany(tickets::class, 'categ', 'id');
    }

    /**
     * Get the user that owns the OtcScope
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'add_by');
    }

}

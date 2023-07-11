<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class OtcScope
 * @package App\Models
 * @version July 11, 2023, 10:41 pm +04
 *
 * @property integer $id
 * @property string $name
 * @property string $details
 * @property integer $add_by
 */
class OtcScope extends Model
{
    use SoftDeletes;


    public $table = 'otc_scopes';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'name',
        'details',
        'add_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'details' => 'string',
        'add_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
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

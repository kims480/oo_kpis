<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class TTStatus
 * @package App\Models
 * @version July 14, 2023, 4:32 pm +04
 *
 * @property \App\Models\Ticket $status
 * @property string $name
 */
class TTStatus extends Model
{
    use SoftDeletes;


    public $table = 'otc_tt_statuss';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
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
    public function tickets()
    {
        return $this->hasMany(\App\Models\Ticket::class, 'status', 'id');
    }
}

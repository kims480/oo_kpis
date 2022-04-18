<?php

namespace App\Models;

// use Eloquent as Model;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Snagremark
 * @package App\Models
 * @version February 16, 2022, 2:56 pm +04
 *
 * @property string $remark
 */
class Snagremark extends EloquentModel
{
    use SoftDeletes;


    public $table = 'snag_remarks';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'remark'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'remark' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}

<?php

namespace App\Models;

// use Eloquent as Model;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Snagreporter
 * @package App\Models
 * @version February 16, 2022, 2:58 pm +04
 *
 * @property string $name
 */
class Snagreporter extends EloquentModel
{
    use SoftDeletes;


    public $table = 'snag_reporters';


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


}

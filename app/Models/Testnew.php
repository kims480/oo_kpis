<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Testnew
 * @package App\Models
 * @version February 6, 2022, 5:49 am +07
 *
 * @property string $name
 */
class Testnew extends Model
{
    use SoftDeletes;


    public $table = 'testnews';
    public $timestamps = false;


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

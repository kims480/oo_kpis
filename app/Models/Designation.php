<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Designation
 * @package App\Models
 * @version July 23, 2023, 9:51 pm +04
 *
 * @property integer $name
 * @property integer $details
 * @property integer $create_by
 */
class Designation extends Model
{
    use SoftDeletes;


    public $table = 'designations';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'details',
        'create_by'
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
        'create_by' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}

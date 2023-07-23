<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Department
 * @package App\Models
 * @version July 23, 2023, 10:00 pm +04
 *
 * @property string $name
 * @property string $details
 * @property integer $created_by
 */
class Department extends Model
{
    use SoftDeletes;


    public $table = 'departments';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'details',
        'created_by'
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
        'created_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

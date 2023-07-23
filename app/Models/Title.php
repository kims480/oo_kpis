<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Title
 * @package App\Models
 * @version July 23, 2023, 10:03 pm +04
 *
 * @property string $name
 * @property integer $details
 */
class Title extends Model
{
    use SoftDeletes;


    public $table = 'titles';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'details'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'details' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

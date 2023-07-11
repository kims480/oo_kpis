<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class AlarmCateg
 * @package App\Models
 * @version July 11, 2023, 7:28 pm +04
 *
 * @property string $categ_name
 * @property integer $added_by
 */
class AlarmCateg extends Model
{
    use SoftDeletes;


    public $table = 'alarm_categs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'categ_name',
        'added_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'categ_name' => 'string',
        'added_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

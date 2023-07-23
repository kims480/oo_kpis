<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class AlkanProject
 * @package App\Models
 * @version July 23, 2023, 9:47 pm +04
 *
 * @property string $project_name
 * @property string $alkan_project_code
 * @property string $customer_project_code
 * @property string $project_detail
 */
class AlkanProject extends Model
{
    use SoftDeletes;


    public $table = 'alkan_projects';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'project_name',
        'alkan_project_code',
        'customer_project_code',
        'project_detail'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'project_name' => 'string',
        'alkan_project_code' => 'string',
        'customer_project_code' => 'string',
        'project_detail' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'project_name' => 'required'
    ];

    
}

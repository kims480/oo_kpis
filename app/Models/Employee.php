<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 * @package App\Models
 * @version July 23, 2023, 6:00 pm +04
 *
 * @property string $name
 * @property string $details
 */
class Employee extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'employees';


    protected $dates = ['deleted_at'];
    protected $hidden=['created_at', 'updated_at'];



    public $fillable = [
        'first_name',
        'mid_name',
        'last_name',
        'email',
        'phone',
        'password',
        'civil_id',
        'hr_code',
        'project_id',
        'designation_id',
        'office_id',
        'title_id',
        'gender',
        'dept_id',
        'hiring_date',
        'salary',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'details' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}

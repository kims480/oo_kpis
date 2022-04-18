<?php

namespace App\Models;

// use Eloquent as Model;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Snagdomain
 * @package App\Models
 * @version February 16, 2022, 2:05 pm +04
 *
 * @property string $name
 */
class Snagdomain extends EloquentModel
{
    use SoftDeletes;


    public $table = 'snagdomains';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'note'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'note' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}

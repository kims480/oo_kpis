<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Html\Editor\Fields\Hidden;

/**
 * Class Region
 * @package App\Models
 * @version February 6, 2022, 3:28 am +07
 *
 * @property string $name
 */
class Region extends Model
{


    public $table = 'regions';

    public $fillable = [
        'name'
    ];
    protected $dates = ['deleted_at'];
    public $hidden=[
        'created_at',
        'deleted_at',
        'updated_at'
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

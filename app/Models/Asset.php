<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    use HasFactory,SoftDeletes;


    protected $table = 'assets';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
    function asset_details(){
        return $this->hasMany(\App\Models\AssetDetail::class,'asset_id');
    }

}

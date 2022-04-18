<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayat extends Model
{
    use HasFactory;
    // public $table = 'wilayats';


    protected $dates = ['deleted_at'];
    protected $guard = [];

    protected $hidden=['created_at', 'updated_at'];

    public $fillable = [
        'name',
        'govern_id',
    ];
     /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'govern_id' => 'integer',

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [



    ];

    public static function search($q)
    {
        return empty($q) ? static::query()
                        : static::query()->where('name','like','%'.$q.'%');
                            // ->orWhere('governs_name','like','%'.$q.'%');

    }
    function sites(){
        return $this->hasMany(\App\Models\Site::class,'wilayat_id','id');
    }
    function govern(){
        return $this->belongsTo(\App\Models\Govern::class);
    }
}

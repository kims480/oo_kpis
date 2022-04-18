<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Govern extends Model
{
    use HasFactory;

    public $table = 'governs';


    protected $dates = ['deleted_at'];

    protected $hidden=['created_at', 'updated_at'];

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
    public static function search($q)
    {
        return empty($q) ? static::query()
                        : static::query()->where('name','like','%'.$q.'%')
                            ;

    }
    function sites(){
        return $this->hasMany(\App\Models\Sites::class,'govern_id','id');
    }
    function wilayats(){
        return $this->hasMany(\App\Models\Wilayat::class,'govern_id','id');
    }

}

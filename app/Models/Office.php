<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Office
 * @package App\Models
 * @version February 6, 2022, 2:11 am +07
 *
 * @property integer $name
 * @property integer $region_id
 */
class Office extends Model
{
    use SoftDeletes;


    public $table = 'offices';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'region_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'region_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
    function sites(){
        return $this->hasMany(\App\Models\Site::class,'office_id');
    }

    /**
     * Get the region that owns the Office
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

}

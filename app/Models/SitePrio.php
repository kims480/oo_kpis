<?php

namespace App\Models;

// use Eloquent as Model;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class SitePrio
 * @package App\Models
 * @version February 16, 2022, 3:32 pm +04
 *
 * @property \Illuminate\Database\Eloquent\Collection $sites
 * @property integer $id
 * @property string $name
 */
class SitePrio extends EloquentModel
{
    use SoftDeletes;


    public $table = 'site_prios';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'name'
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function sites()
    {
        return $this->hasMany(\App\Models\Site::class, 'prio', 'id');
    }
}

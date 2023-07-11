<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Ticket
 * @package App\Models
 * @version July 11, 2023, 6:03 pm +04
 *
 * @property \App\Models\Site $id
 * @property integer $id
 * @property integer $site_id
 * @property integer $categ
 * @property integer $contractor
 * @property string $scope
 * @property string $tt_number
 * @property string $notes
 */
class Ticket extends Model
{
    use SoftDeletes;


    public $table = 'tickets';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'site_id',
        'categ',
        'description',
        'contractor',
        'scope',
        'tt_number',
        'last_number',
        'alarm_name',
        'notes',
        'alarm_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'site_id' => 'integer',
        'categ' => 'integer',
        'contractor' => 'integer',
        'tt_number' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function site()
    {
        return $this->belongsTo(\App\Models\Site::class, 'site_id','id' );
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tt_categ()
    {
        return $this->belongsTo(\App\Models\OtcCateg::class,'categ', 'id' );
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tt_scope()
    {
        return $this->belongsTo(\App\Models\OtcScope::class, 'scope','id' );
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function alarm()
    {
        return $this->belongsTo(\App\Models\OtcAlarms::class, 'alarm_name','id' );
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tt_contractor()
    {
        return $this->belongsTo(\App\Models\Contractor::class,  'contractor','id');
    }
}

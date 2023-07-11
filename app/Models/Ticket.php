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
        'notes'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
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
    public function id()
    {
        return $this->belongsTo(\App\Models\Site::class, 'id', 'Site_id');
    }
}

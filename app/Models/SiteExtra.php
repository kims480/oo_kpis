<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class SiteExtra
 * @package App\Models
 * @version November 7, 2022, 12:22 am +04
 *
 * @property integer $id
 * @property integer $site__id
 * @property integer $added_by
 * @property string $contract_prio
 * @property string $prio_2022
 * @property string $contract_severity
 * @property string $severity_2022
 * @property integer $connected_sites
 * @property integer $connected_omc
 * @property integer $connected_ip
 * @property integer $connected_sdh
 * @property string $landlord_owner
 */
class SiteExtra extends Model
{
    use SoftDeletes;


    public $table = 'site_extras';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'site__id',
        'added_by',
        'contract_prio',
        'prio_2022',
        'contract_severity',
        'severity_2022',
        'connected_sites',
        'connected_omc',
        'connected_ip',
        'connected_sdh',
        'landlord_owner'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'site__id' => 'integer',
        'added_by' => 'integer',
        'contract_prio' => 'string',
        'prio_2022' => 'string',
        'contract_severity' => 'string',
        'severity_2022' => 'string',
        'connected_sites' => 'integer',
        'connected_omc' => 'integer',
        'connected_ip' => 'integer',
        'connected_sdh' => 'integer',
        'landlord_owner' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Contractor
 * @package App\Models
 * @version July 11, 2023, 8:12 pm +04
 *
 * @property string $name
 * @property string $info
 * @property number $address
 * @property integer $lat
 * @property number $long
 * @property integer $added_by
 * @property string $register_number
 * @property string $website
 * @property string $info_mail
 * @property string $it_mail
 * @property string $proc_email
 * @property string $operation_mail
 * @property string $admin_mail
 * @property string $ceo_mail
 * @property string $project_manager_mail
 */
class Contractor extends Model
{
    use SoftDeletes;


    public $table = 'contractors';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'info',
        'phone',
        'address',
        'lat',
        'long',
        'added_by',
        'register_number',
        'website',
        'info_mail',
        'it_mail',
        'proc_email',
        'operation_mail',
        'admin_mail',
        'ceo_mail',
        'project_manager_mail'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'info' => 'string',
        'phone' => 'string',
        'address' => 'float',
        'lat' => 'integer',
        'long' => 'float',
        'added_by' => 'integer',
        'register_number' => 'string',
        'info_mail' => 'string',
        'it_mail' => 'string',
        'proc_email' => 'string',
        'operation_mail' => 'string',
        'admin_mail' => 'string',
        'ceo_mail' => 'string',
        'project_manager_mail' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * Get the user that owns the OtcScope
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'added_by');
    }

    /**
     * Get all of the tickets for the Contractor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany(tickets::class, 'contractor', 'id');
    }


}

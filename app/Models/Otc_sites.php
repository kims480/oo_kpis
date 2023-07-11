<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class otc_sites
 * @package App\Models
 * @version July 11, 2023, 9:08 pm +04
 *
 */
class Otc_sites extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'otc_sites';

    protected $hidden=['created_at', 'updated_at','deleted_at'];

    public $fillable = [
        'site_id',
        'lat',
        'long',
        'nis',
        'prio',
        'type',
        'categ',
        'govern_id',
        'wilayat_id',
        'office_id',
        'added_by',
        'address'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'site_id' => 'string',
        'lat' => 'float',
        'long' => 'float',
        'nis' => 'string',
        'prio' => 'integer',
        'type' => 'integer',
        'categ' => 'integer',
        'govern_id' => 'integer',
        'wilayat_id' => 'integer',
        'office_id' => 'integer',
        'address' => 'string'
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

}

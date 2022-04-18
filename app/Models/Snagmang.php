<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Snagmang
 * @package App\Models
 * @version February 16, 2022, 2:45 pm +04
 *
 * @property string $report_date
 * @property integer $site_id
 * @property integer $region_id
 * @property integer $office_id
 * @property string $description
 * @property integer $main_categ_id
 * @property integer $sub_categ_id
 * @property integer $domain_id
 * @property integer $snag_remark_id
 * @property integer $snag_reported_id
 * @property string $closure_date
 * @property integer $snag_closed_by
 * @property string $remarks
 */
class Snagmang extends EloquentModel
{
    use SoftDeletes;


    public $table = 'snag_mangs';

    public $hidden =['created_at','updated_at','deleted_at','pivot','sub_categ'];

    protected $dates = ['deleted_at'];

    public $timestamps = true;

    public $fillable =  [
        'description',
        'sub_categ_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'description' => 'string',
        'sub_categ_id' => 'integer',
    ];


    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [];

    /**
     * Get all of the site_snags for the Snagmang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sites()
    {
        return $this->belongsToMany(Site::class, 'site_snags', 'snag_mangs', 'site_id');
    }

    /**
     * Get the sub_categ that owns the Snagmang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sub_categ()
    {
        return $this->belongsTo(SubCateg::class, 'sub_categ_id', 'id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class SiteSnag
 * @package App\Models
 * @version February 16, 2022, 2:51 pm +04
 *
 * @property integer $site_id
 * @property integer $snagmangs
 */
class SiteSnag extends Model
{
    use SoftDeletes;


    public $table = 'site_snags';


    protected $dates = ['deleted_at'];
    public  $timestamps=true;

    public $fillable = [
        'site_id',
        'snag_id',
        'domain_id',
        'snag_remark_id',
        'snag_reported_id',
        'closure_date',
        'snag_closed_by',
        'remarks'
    ];

    public $hidden=[
        "domain_id",
        "snag_remark_id",
        "snag_reported_id",
        "snagstatus_id",
        "snag_closed_by",
        "created_at",
        "updated_at",
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'site_id' => 'integer',
        'snag_id' => 'integer',
        'report_date' => 'date',
        'domain_id' => 'integer',
        'snag_remark_id' => 'integer',
        'snag_reported_id' => 'integer',
        'snag_closed_by' => 'integer',
        'remarks' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'site_id' => 'required',
        'snag_id' => 'required',
    ];

    public function getSnagNameAttribute()
    {
        return $this->snag->description;
    }

     /**
     * Get the user's first name.
     *
     * @param string $value
     * @return string
     */
    public function setStatusAttribute($value): void
    {
        // return strtoupper($value);
        if ($value="open") $this->attributes['status']=0;
        if ($value="closed") $this->attributes['status']=1;
    }

     /**
     * Get the user's first name.
     *
     * @param string $value
     * @return string
     */
    public function setSiteIdAttribute($value)
    {
            $site =Site::where('site_id', $value)->first();

            $this->attributes['site_id']= $site->id;

    }
    public function getSiteNameAttribute()
    {
        return $this->site->site_id;
    }
    // public function getSnagReporterAttribute()
    // {
    //     return $this->user->name;
    // }

     /**
     * Get the user that owns the Snag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function site()
    {
        return $this->belongsTo(Site::class, 'site_id', 'id');
    }
     /**
     * Get the user that owns the Snag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function snag()
    {
        return $this->belongsTo(Snag::class, 'snag_id', 'id');
    }
     /**
     * Get the user that owns the Snag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reportedBy()
    {
        return $this->belongsTo(User::class, 'snag_closed_by', 'id');
    }
     /**
     * Get the user that owns the Snag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function snagreporter()
    {
        return $this->belongsTo(Snagreporter::class, 'snag_reported_id', 'id');
    }
     /**
     * Get the user that owns the Snag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function snagremark()
    {
        return $this->belongsTo(Snagremark::class, 'snag_remark_id', 'id');
    }
     /**
     * Get the user that owns the Snag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function snagdomain()
    {
        return $this->belongsTo(Snagdomain::class, 'domain_id', 'id');
    }
     /**
     * Get the user that owns the Snag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function snagstatus()
    {
        return $this->belongsTo(Snagstatus::class, 'snagstatus_id', 'id');
    }
     /**
     * Get the user that owns the Snag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function snag_closed_by()
    {
        return $this->belongsTo(User::class, 'snag_closed_by','id');
    }

     /**
     * The roles that belong to the passive_spares.
     */
    public function passive_spares()
    {
        return $this->belongsToMan(PassiveSpare::class, 'site_snag_passive_spare');
    }

}

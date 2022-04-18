<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Snag extends Model
{
    // Sr. #	REPORT DATE	SITEID	Region	Office	SNAGS	MAIN_CATEGORY	SUB CATEGORY	STATUS	Closure Date	Snag Reported By	Domain	Remarks
    use HasFactory, SoftDeletes;

    public $table='snags';
    protected $hidden=['created_at','updated_at','deleted_at','pivot','sub_categ'];
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
     * Get the site that owns the Snag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sites()
    {
        return $this->belongsToMany(SiteSnag::class,'site_snags', 'snag_id','site_id' );
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
    // protected $fillable = [
    //     'sn',
    //     'reporting_date',
    //     'site_id',
    //     'snag',
    //     'maincateg_id',
    //     'subcateg_id',
    //     'status',
    //     'closure_date',
    //     'snag_reported_by',
    //     'snag_domain_id',
    //     'remarks',
    // ];
    // public static  $rules=[
    //     'snaglist' => 'mimes:csv,txt,xlx,xlsx,xls|max:2048'
    // ];



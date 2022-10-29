<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Site
 * @package App\Models
 * @version January 29, 2022, 5:26 am +07
 *
 * @property string $site_id
 * @property number $lat
 * @property number $long
 * @property string $nis
 * @property string $prio
 * @property string $type
 * @property string $categ
 * @property string $govern_id
 * @property string $wilayat_id
 * @property string $office_id
 * @property string $address
 */
class Site extends Model
{
    use SoftDeletes, HasFactory;


    public $table = 'sites';


    protected $dates = ['deleted_at'];


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
     * Get the user's first name.
     *
     * @param string $value
     * @return string
     */
    public function getSiteIdAttribute(string $value): string
    {
        return strtoupper($value);


    }
    /**
     * Get the user's full name.
     *
     * @return string
     */
//    public function getFullNameAttribute()
//    {
////        return "{$this->first_name} {$this->last_name}";
//    }
    /**
     * Get the site's governate.
     *
     * @return string
     */
    public function getGovernateAttribute()
    {
        return $this->govern->name;
    }



    /**
     * Get the site's governate.
     *
     * @return string
     */
    public function getWilyatAttribute()
    {
        return $this->wilayat->name;
    }
/**
     * Get the site's governate.
     *
     * @return string
     */
    public function getOfficeNameAttribute()
    {
        return $this->office->name;
    }



    /**
     * Set the user's first name.
     *
     * @param string $value
     * @return void
     */
//    public function setFirstNameAttribute($value)
//    {
////        $this->attributes['first_name'] = strtolower($value);
//    }

    function govern()
    {
        return $this->belongsTo(\App\Models\Govern::class, 'govern_id', 'id');
    }

    function wilayat()
    {
        return $this->belongsTo(\App\Models\Wilayat::class, 'wilayat_id', 'id');
    }
     function office()
    {
        return $this->belongsTo(\App\Models\Office::class, 'office_id', 'id');
    }
    function priority()
    {
        return $this->belongsTo(\App\Models\SitePrio::class, 'prio', 'id');
    }
    function category()
    {
        return $this->belongsTo(\App\Models\SiteCateg::class, 'categ', 'id');
    }
    function siteType()
    {
        return $this->belongsTo(\App\Models\SiteType::class, 'type', 'id');
    }


    /**
     * Get all of the sites for the Site
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function snags()
    {
        return $this->belongsToMany(Snag::class, 'site_snags', 'site_id','snag_id');
    }

    /**
     * Get all of the sitesnags for the Site
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function site_snags()
    {
        return $this->hasMany(SiteSnag::class, 'site_id', 'id');
    }

    /**
     * Get all of the batterys for the Site
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function batteries()
    {
        return $this->hasMany(BatteryAdd::class, 'site__deployed');
    }

}

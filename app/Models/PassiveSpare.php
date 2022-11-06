<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class PassiveSpare
 * @package App\Models
 * @version November 6, 2022, 9:33 pm +04
 *
 * @property integer $id
 * @property string $old_bom
 * @property string $new_bom
 * @property string $description
 * @property string $uom
 * @property integer $Important
 * @property integer $high_consumption
 */
class PassiveSpare extends EloquentModel
{
    use SoftDeletes;


    public $table = 'passive_spares';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'old_bom',
        'new_bom',
        'description',
        'uom',
        'Important',
        'high_consumption'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'old_bom' => 'string',
        'new_bom' => 'string',
        'description' => 'string',
        'uom' => 'string',
        'Important' => 'integer',
        'high_consumption' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

      /**
     * The roles that belong to the user.
     */
    public function site_snags()
    {
        return $this->belongsToMan(SiteSnag::class, 'site_snag_passive_spare')
            ->withTimeStamps()
            ->withPivot(['qty']);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConsumableSpare extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'consumable_spares';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'old_bom',
        'new_bom',
        'description',
        'uom',
        'Important',
        'high_consumption',
        'muscat_stk',
        'sll_stk',
        'shr_stk',
        'nzw_stk',
        'adm_stk',
        'ibri_stk',
        'haima_stk',
        'dqm_stk',
        'sur_stk',
        'ibra_stk',
        'swq_stk',
        'khasab_stk',
        'total_stk',
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

}

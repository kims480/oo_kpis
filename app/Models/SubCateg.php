<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCateg extends Model
{
    use HasFactory;

    protected $table='sub_categs';

    protected $fillable=[
        'name','main_categ_id'
    ];

    public $timestamps=true;
    protected $hidden=[
        'created_at','updated_at','deleted_at'
    ];

    /**
     * Get all of the snags for the SubCateg
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function snags()
    {
        return $this->hasMany(Snag::class, 'sub_categ_id', 'id');
    }

    /**
     * Get the main_categ that owns the SubCateg
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function main_categ()
    {
        return $this->belongsTo(MainCateg::class, 'main_categ_id', 'id');
    }
}

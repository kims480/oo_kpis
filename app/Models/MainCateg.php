<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCateg extends Model
{
    use HasFactory;

    protected $table='main_categs';

    protected $fillable=[
        'name'
    ];

    public $timestamps=true;
    protected $hidden=[
        'created_at','updated_at','deleted_at'
    ];

    /**
     * Get all of the sub_categ for the MainCateg
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sub_categ()
    {
        return $this->hasMany(SubCateg::class, 'main_categ_id', 'id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatteryAdd extends Model
{
    use HasFactory;
    protected $guard = [];

    public $fillable=["deployed_at_site","deployed_by"];

    public $hidden=[];

    // public $
    protected $dates = ['deleted_at'];
}

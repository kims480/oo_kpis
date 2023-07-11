<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConsumableMove extends Model
{
    use HasFactory, SoftDeletes;


    public $table = 'consumable_moves';


    protected $fillable = ['site_id', 'wo', 'user_id'];

    public function consumable_spares()
    {
        return $this->belongsToMany(consumableSpare::class,'consumable_spare_consumable_move')->withPivot('quantity');
    }

    public function getTotalAttribute()
    {
        // $total = 0;

        // foreach ($this->products as $product) {
            // $total += $product->price * $product->pivot->quantity;
        // }

        // return $total * (1 + (is_numeric($this->taxes) ? $this->taxes : 0) / 100);
    }
}

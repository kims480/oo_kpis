<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ConsumableSpareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     public $spares=[
        ['old_bom' =>'PI200001' , 'new_bom' => '88288W UF', 'description' => '2.5 ton compressor bristol (H23A42QABKA)','uom'=>'Pcs' ],
        ['old_bom' =>'PI200002' , 'new_bom' => '88288W PJ', 'description' => 'Aircon Remote Controls (Toshiba)','uom'=>'Pcs' ],
     ];
    public function run()
    {
        if (\DB::table('consumable_spares')->count() > 0) {


            \DB::table('consumable_spares')->truncate();
            \DB::table('consumable_spares')->insert($this->spares);
        }

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TTStatusSeeder extends Seeder
{

    public $tt_status = [
        ['id' => 1, 'name' => 'hold'],
        ['id' => 2, 'name' => 'dispatched'],
        ['id' => 3, 'name' => 'accepted'],
        ['id' => 4, 'name' => 'updated'],
        ['id' => 5, 'name' => 'completed'],
        ['id' => 6, 'name' => 'closed'],
        ['id' => 7, 'name' => 'rejected'],

    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (\DB::table('otc_tt_statuss')->count() > 0) {
            return;
        }
        \DB::table('otc_tt_statuss')->insert($this->tt_status);
    }
}

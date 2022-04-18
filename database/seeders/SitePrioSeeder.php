<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SitePrioSeeder extends Seeder
{
    public $sev = [
        ['id' => 1, 'name' => 'Critical'],
        ['id' => 2, 'name' => 'Core'],
        ['id' => 3, 'name' => 'Non-Critical - City'],
        ['id' => 4, 'name' => 'Non-Critical - Remote'],
        ['id' => 5, 'name' => 'P5'],
        ['id' => 6, 'name' => 'P6'],
        ['id' => 7, 'name' => 'P7'],
        ['id' => 8, 'name' => 'P8'],
        ['id' => 9, 'name' => 'P9'],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('site_prios')->insert($this->sev);

    }
}

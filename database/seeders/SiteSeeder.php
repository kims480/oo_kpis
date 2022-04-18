<?php

namespace Database\Seeders;

use App\Models\Site;
use Database\Factories\SiteFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSeeder extends Seeder
{
    public $sites = [


    ];
    public $type=[
        ['id' =>1,'name' => 'Indoor'],
['id' =>2,'name' => 'Outdoor'],
['id' =>3,'name' => 'Outdoor+Indoor'],
['id' =>4,'name' => '-'],

    ];
    public $categ=[
        ['id' =>1,'name' => 'Green Field'],
['id' =>2,'name' => 'IBS'],
['id' =>3,'name' => 'Roof Top'],
['id' =>4,'name' => 'RF_Repeater'],
['id' =>5,'name' => '-'],


    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('main_categs')->insert($this->sites);
        DB::table('site_types')->insert($this->type);
        DB::table('site_categs')->insert($this->categ);
        // SiteFactory::times(10)->create();
    }

    /*

    INSERT INTO `snag_mangs` (`id`, `report_date`, `site_id`, `region_id`, `office_id`, `description`, `main_categ_id`, `sub_categ_id`, `domain_id`, `snag_remark_id`, `snag_reported_id`, `closure_date`, `snag_closed_by`, `remarks`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, '2022-02-10', '1514', '3', '1', 'Snag 22', '1', '1', '1', '1', '2', NULL, NULL, NULL, '2022-02-17 10:18:39', '2022-02-17 10:18:39', NULL);

    */
}

<?php

namespace Database\Seeders;

use App\Models\MainCateg;
use Illuminate\Database\Seeder;

class MaincategSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $mainCateg = [
            "DELTA CABINET",
            "CIVIL_WORK",
            "CABLE DRESSING",
            "GROUNDING",
            "EXTRA MATERIAL",
            "DESIGN ISSUE",
            "DG ISSUES",
            "Emergency Light",
            "BATTERY BACKUP",
            "LABELING",
            "PADLOCK/Omantel",
            "RECTIFIER",
            "AVIATION_LIGHT",
            "OTHERS",
            "HOUSEKEEPING",
            "LOG BOOK",
            "PADLOCK",
            "FIRE_EQUIPMENT",
            "HOUSEKEEPING/Omantel",
            "AIR_CONDITIONER",
            "EXTERNAL ALARM",
            "ILLUMINATION LIGHT",
            "TEMPERATURE SENSOR",
            "COW",
            "Emergency Light",
            "CABLE DRESSING",
            "OD CABINET",
            "BREAKER/RELAY/SENSOR",
            "Wrong Installation",
            "FIRE EXTINGUISER",
            "DUMMY MISSING",
            "AIR CONCITIONER",
            "AVIATION LIGHT",
            "FIRE EQUIPMENT",
            "Other",
        ];
        MainCateg::CreateOrUpdate($mainCateg);
    }
}

<?php

namespace App\Exports;

use App\Models\Office;
use App\Models\Site;
use App\Models\SiteCateg;
use App\Models\Wilayat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class SiteAllExport implements  WithMultipleSheets
{
    /**
     * @return \Illuminate\Support\Collection
     */
    // public function collection()
    // {
    //     //
    // }
    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

        $sheets[] = new SitesExport();
        $sheets[] = new WilayatsExport;
        $sheets[] = new OfficesExport;
        $sheets[] = new RegionExport;
        $sheets[] = new SitePrioExport;
        $sheets[] = new SiteTypeExport;
        $sheets[] = new SiteCategExport;
        $sheets[] = new GovernExport;


        return $sheets;
    }
}

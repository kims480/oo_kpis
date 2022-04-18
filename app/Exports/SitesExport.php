<?php

namespace App\Exports;

use App\Models\Site;
use App\Traits\ExportStyle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;

class SitesExport implements FromCollection, WithHeadings,ShouldAutoSize,WithStyles,WithTitle
{
    use Exportable,ExportStyle;

    public function collection()
    {
        // $wilayts=Govern::query()
        //     ->leftJoin('wilayats','governs.id', '=', 'wilayats.govern_id')
        //     ->select('governs.*', 'wilayats.id as Wilayat_id', 'wilayats.name as Wilayat_Name');
        // return $wilayts;
        $sites=Site::with(['wilayat','office','priority','category','siteType'])->select('*')->get();
        $sites=$sites->map(function ($site) {
            return [
                'site_id' =>  $site->site_id,
                'id'=>$site->id,
                'nis' =>  $site->nis,
                'lat' =>  $site->lat,
                'long' =>  $site->long,
                'region' =>  $site->office->region->name,
                'office' =>  $site->office->name,
                'govern' =>  $site->wilayat->govern->name,
                'wilayat' =>  $site->wilayat->name,
                'prio' =>  $site->priority->name,
                'site_type' =>  $site->siteType->name,
                'site_categ' =>  $site->category->name,
                'address' =>  $site->adress,
                'govern_id' =>  $site->govern_id,
                'wilayat_id' =>  $site->wilayat_id,
                'office_id' =>  $site->office_id,
                'categ_id' =>  $site->categ,
                'prio_id' =>  $site->prio,
                'type_id' =>  $site->type,

            ];
        });
        return $sites;
    }

    /*
    Worksheet title
    */
    public function title():string
    {
        return 'Sites';

    }
}

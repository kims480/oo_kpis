<?php

namespace App\Exports;

// use App\Http\Livewire\SiteSnag;

use App\Models\MainCateg;
use App\Models\SiteSnag as ModelsSiteSnag;
use App\Models\SiteSnags;
use App\Models\SubCateg;
use App\Traits\ExportStyle;
use Database\Seeders\SubcategSeeder;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;


class SiteSnagsExport implements FromCollection, WithHeadings,ShouldAutoSize,WithStyles
{
    use Exportable,ExportStyle;

    public function collection()
    {
        $snags=SubCateg::with(['main_categ'])->select('*')->get();
        $snags=$snags->map(function ($snag) {
            return [
                'Main_Categ'               => $snag->main_categ->name,
                'Sub_Categ'            => $snag->name,
                // 'Snag Description'             => $snag->sub_categs->snags->description,
                // 'snag_id'           => $snag->sub_categs->snags->id,
                'Main_Categ_id'           => $snag->main_categ_id,
                'Sub_Categ_id'           => $snag->id,
            ];
        });
        return $snags;
    }
     /*
    Worksheet title
    */
    public function title():string
    {
        return 'Snags';

    }
}

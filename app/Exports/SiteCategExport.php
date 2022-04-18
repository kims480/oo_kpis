<?php

namespace App\Exports;

use App\Models\SiteCateg;
use App\Traits\ExportStyle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;

class SiteCategExport implements FromCollection,WithHeadings, ShouldAutoSize, WithStyles,WithTitle
{
    use Exportable,ExportStyle;

    public function title():string
    {
        return 'Site_Categ';
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SiteCateg::select('*')->get()->map(function ($categ) {
            return [
                'Site_Categ'   => $categ->name,
                'id'            => $categ->id,
            ];
        });
    }
}

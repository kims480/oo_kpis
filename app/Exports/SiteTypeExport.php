<?php

namespace App\Exports;

use App\Models\SiteType;
use App\Traits\ExportStyle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;

class SiteTypeExport implements FromCollection,WithHeadings, ShouldAutoSize, WithStyles,WithTitle
{
    use Exportable,ExportStyle;
    public function title():string
    {
        return 'Site_Types';
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SiteType::select('*')->get()->map(function ($type) {
            return [
                'Site_Type'   => $type->name,
                'id'            => $type->id,
            ];
        });
    }
}

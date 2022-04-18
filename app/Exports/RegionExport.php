<?php

namespace App\Exports;

use App\Models\Region;
use App\Traits\ExportStyle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;

class RegionExport implements FromCollection,WithHeadings, ShouldAutoSize, WithStyles,WithTitle
{
    use Exportable,ExportStyle;
    public function title():string
    {
        return 'Regions';
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Region::select('*')->get()->map(function ($Region) {
            return [
                'Region_name'   => $Region->name,
                'id'            => $Region->id,
            ];
        });
    }
}

<?php

namespace App\Exports;

use App\Models\SitePrio;
use App\Traits\ExportStyle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;

class SitePrioExport implements FromCollection,WithHeadings, ShouldAutoSize, WithStyles,WithTitle
{
    use Exportable,ExportStyle;
    public function title():string
    {
        return 'Site_Prio';
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SitePrio::select('*')->get()->map(function ($prio) {
            return [
                'Site_Severity'   => $prio->name,
                'id'            => $prio->id,
            ];
        });
    }
}

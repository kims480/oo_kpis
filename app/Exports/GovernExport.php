<?php

namespace App\Exports;

use App\Models\Govern;
use App\Traits\ExportStyle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;

class GovernExport implements FromCollection,WithHeadings, ShouldAutoSize, WithStyles,WithTitle
{
    use Exportable,ExportStyle;
    public function title():string
    {
        return 'Governs';
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Govern::select('*')->get()->map(function ($govern) {
            return [
                'govern_name'   => $govern->name,
                'id'            => $govern->id,
            ];
        });

    }


}

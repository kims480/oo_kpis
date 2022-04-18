<?php

namespace App\Exports;

use App\Models\Snags;
use App\Traits\ExportStyle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;


class SnagsExport implements FromQuery, WithHeadings,ShouldAutoSize,WithStyles
{
    use Exportable,ExportStyle;

    public function query()
    {
        return Snags::all();
    }
}

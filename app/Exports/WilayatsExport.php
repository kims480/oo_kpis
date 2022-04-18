<?php

namespace App\Exports;

use App\Models\Govern;
use App\Models\Wilayat;
use App\Traits\ExportStyle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class WilayatsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles,WithTitle
{
    use Exportable, ExportStyle;

    public function collection()
    {
        // $wilayts=Govern::query()
        //     ->leftJoin('wilayats','governs.id', '=', 'wilayats.govern_id')
        //     ->select('governs.*', 'wilayats.id as Wilayat_id', 'wilayats.name as Wilayat_Name');
        // return $wilayts;
        $wilayts=Wilayat::with(['govern'])->select('*')->get();
        $wilayts=$wilayts->map(function ($wilayat) {
            return [
                'Wilayat'               => $wilayat->name,
                'Wilayat_id'            => $wilayat->id,
                'Govern_id'             => $wilayat->govern_id,
                'Governate'           => $wilayat->govern->name,
            ];
        });
        return $wilayts;
    }
     /*
    Worksheet title
    */
    public function title():string
    {
        return 'Wilayats';

    }
}

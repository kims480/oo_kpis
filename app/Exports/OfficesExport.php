<?php

namespace App\Exports;

use App\Models\Office;
use App\Traits\ExportStyle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;

class OfficesExport implements FromCollection, WithHeadings,ShouldAutoSize,WithStyles,WithTitle
{
    use Exportable,ExportStyle;

    public function collection()
    {
        // $wilayts=Govern::query()
        //     ->leftJoin('wilayats','governs.id', '=', 'wilayats.govern_id')
        //     ->select('governs.*', 'wilayats.id as Wilayat_id', 'wilayats.name as Wilayat_Name');
        // return $wilayts;
        $offices=Office::with(['region'])->select('*')->get();
        $offices=$offices->map(function ($office) {
            return [
                'Office'               => $office->name,
                'Office_id'            => $office->id,
                'Region_id'             => $office->region_id,
                'Region'           => $office->region->name,
            ];
        });
        return $offices;
    }
     /*
    Worksheet title
    */
    public function title():string
    {
        return 'Offices';

    }
   /*  public function query()
    {
        $offices=Region::query()
            ->leftJoin('offices','regions.id', '=', 'offices.region_id')
            ->select('regions.*', 'offices.id as Office_id', 'offices.name as Office_Name');
        return $offices;
    } */
    // public function headings(): array
    // {
    //     return [
    //         'Region_id',
    //         'Region',
    //         'Office_id',
    //         'Office_name',
    //     ];
    // }

}

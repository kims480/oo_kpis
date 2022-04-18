<?php

namespace App\Imports;

use App\Models\Site;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RemembersChunkOffset;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use Maatwebsite\Excel\Concerns\WithUpserts;
// use Illuminate\Validation\Rule;

// use Maatwebsite\Excel\Concerns\WithValidation;

class SitesImport implements  ToModel,WithHeadingRow,WithBatchInserts,WithUpserts ,WithChunkReading///WithValidation//WithMappedCells,
{
    use Importable , RemembersChunkOffset;


    // public function mapping(): array
    // {
    //     return [
    //         'site_id'=>'B1',
    //         'nis'=>'C1',
    //         'latitude'=>'D1',
    //         'longitude'=>'E1',
    //         'severity_id'=>'AE1',
    //         'type_id'=>'AF1',
    //         'categ_id'=>'AG1',
    //         'govern_id'=>'AD1',
    //         'Wilayat_id'=>'AA1',
    //         'office_id'=>'AB1',
    //         'site_sharing_status'=>'V1',

    //     ];
    // }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // return($row);
        return new Site([
            'site_id'=> $row['site_id'],
            'lat'=> $row['latitude']=='-'?null:$row['latitude'],
            'long'=> $row['longitude']=='-'?null:$row['longitude'],
            'nis'=> $row['nis'],
            'prio'=> $row['severity_id'],
            'type'=> $row['type_id'],
            'categ'=> $row['categ_id'],
            'govern_id'=> $row['govern_id'],
            'wilayat_id'=> $row['wilayat_id'],
            'office_id'=> $row['office_id'],
            'added_by'=> Auth::id(),
            'address'=> $row['site_sharing_status'],
        ]);
    }
    public function batchSize(): int
    {
        return 1000;
    }
    public function uniqueBy()
    {
        return 'site_id';
    }

    public function chunkSize(): int
    {
        return 1000;
    }
    // public function rules(): array
    // {
    //     return [
    //         // '1' => Rule::in(['patrick@maatwebsite.nl']),

    //          // Above is alias for as it always validates in batches
    //         //  '*.1' => Rule::in(['patrick@maatwebsite.nl']),

    //          // Can also use callback validation rules
    //          'lat' => function($attribute, $value, $onFailure) {
    //               if ($value !== '-') {
    //                    $onFailure('Must be float Value');
    //               }
    //           },
    //          'long' => function($attribute, $value, $onFailure) {
    //               if ($value !== '-') {
    //                    $onFailure('Must be float Value');
    //               }
    //           }
    //     ];
    // }

}

<?php

namespace App\Imports;


use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Illuminate\Validation\Rule;

use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

class SnagsImport implements ToCollection, WithChunkReading, WithHeadingRow//,WithProgressBar

{
    use Importable;

    // Sr. #	REPORT DATE	SITEID	Region	Office	SNAGS	MAIN_CATEGORY	SUB CATEGORY	STATUS	Closure Date	Snag Reported By	Domain	Remarks
    /**
     * @param array $row
     *
     * @return row|null
     */
    public function collection(Collection $rows)
    {




        return $rows->chunk(100);

    }

    public function chunkSize(): int
    {
        return 5000;
    }
    public function rules(): array
    {
        return [
            '1' => Rule::in(['patrick@maatwebsite.nl']),

             // Above is alias for as it always validates in batches
             '*.1' => Rule::in(['patrick@maatwebsite.nl']),

             // Can also use callback validation rules
             '0' => function($attribute, $value, $onFailure) {
                  if ($value !== 'Patrick Brouwers') {
                       $onFailure('Name is not Patrick Brouwers');
                  }
              }
        ];
    }
    // public function model(array $row)
    // {
    //     // dd(Site::where('site_id', $row[2])->firstOrFail());
    //     return new Snag([
    //         'sn'=> $row[0],
    //         'reporting_date'=> null ,//Carbon::createFromFormat('Y-m-d H:i:s', $row[1])->format('d-m-Y'),
    //         'site_id'=> $row[2],//random_int(1,3000),
    //         'snag'=> $row[5],
    //         'main_categ_id'=> null,
    //         'sub_categ_id'=> null,
    //         'status'=> $row[9],
    //         'closure_date'=> null,
    //         'snag_reported_by'=> 1,
    //         'snag_domain_id'=> random_int(1,5),
    //         'remarks'=> null,
    //     ]);
    // }
}
/*
 'sn',
        'reporting_date',
        'site_id',
        'snag',
        'maincateg_id',
        'subcateg_id',
        'status',
        'closure_date',
        'snag_reported_by',
        'snag_domain_id',
        'remarks',

*/

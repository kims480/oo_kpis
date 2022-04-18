<?php

namespace App\Imports;

use App\Models\Office;
use Maatwebsite\Excel\Concerns\ToModel;

class OfficeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Office([
            //
        ]);
    }
}

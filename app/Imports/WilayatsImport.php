<?php

namespace App\Imports;

use App\Models\Wilayat;
use Maatwebsite\Excel\Concerns\ToModel;

class WilayatsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Wilayat([
            //
        ]);
    }
}

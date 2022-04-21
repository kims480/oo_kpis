<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RemembersChunkOffset;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class UsersImport implements ToModel,WithHeadingRow,WithBatchInserts,WithUpserts,WithChunkReading
{
    use Importable , RemembersChunkOffset;

   /**
    * (new UsersImport)->import('users.xlsx', 'local', \Maatwebsite\Excel\Excel::XLSX);
    *  #To array
    * The import can be loaded into an array :
    * $array = (new UsersImport)->toArray('users.xlsx');

    * #To collection
    * The import can be loaded into a collection:

    * $collection = (new UsersImport)->toCollection('users.xlsx');
    */
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([

            'name'  => $row['name'],
            'email' => $row['email'],
           'password' => Hash::make($row[2]),
           'phone' => $row['phone'],
           'civil_id' => $row['civil_id'],
           'hr_code' => $row['hr_code'],
           'project' => $row['project_id'],
           'designation' => $row['designation_id'],
           'office' => $row['office_id'],
           'title' => $row['title_id'],
           'gender' => $row['gender'],
           'department' => $row['dept_id'],
           'hiring_date' => $row['hiring_date'],
           'salary' => $row['salary'],

        ]);
    }
    public function batchSize(): int
    {
        return 1000;
    }
    public function uniqueBy()
    {
        return 'email';
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}

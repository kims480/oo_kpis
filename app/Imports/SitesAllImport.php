<?php

namespace App\Imports;


use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class SitesAllImport implements WithMultipleSheets, SkipsUnknownSheets
{
    public function sheets(): array
    {
        return [
            'Physical Site Count' => new SitesImport()
        ];
    }

    public function onUnknownSheet($sheetName)
    {
        // E.g. you can log that a sheet was not found.
        info("Sheet {$sheetName} was skipped");
    }
}

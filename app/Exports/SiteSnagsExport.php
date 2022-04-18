<?php

namespace App\Exports;

// use App\Http\Livewire\SiteSnag;
use App\Models\SiteSnag as ModelsSiteSnag;
use App\Models\SiteSnags;
use App\Traits\ExportStyle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;


class SiteSnagsExport implements FromQuery, WithHeadings,ShouldAutoSize,WithStyles
{
    use Exportable,ExportStyle;

    public function query()
    {
        return ModelsSiteSnag::query();
    }
}

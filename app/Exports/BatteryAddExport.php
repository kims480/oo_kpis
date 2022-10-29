<?php

namespace App\Exports;

use App\Models\BatteryAdd;
use App\Traits\ExportStyle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;

class BatteryAddExport implements FromCollection, WithHeadings,ShouldAutoSize,WithStyles,WithTitle
{
    use Exportable,ExportStyle;



    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $batteries=BatteryAdd::with(['user'=>function($q){
            $q->select('id','name');
        },'site'=>function($s){
            $s->select('id','site_id');
        }])->select('*')->get();
        $batteries=$batteries->map(function ($battery) {
            return [
                'id'=>  $battery->id,
                'site__deployed'=>  $battery->site->site_id,
                'added_by'=>  $battery->user->name,
                'shelter_num'=>  $battery->shelter_num,
                'ref_wo'=>  $battery->ref_wo,
                'ref_cr'=>  $battery->ref_cr,
                'batter_sn'=>  $battery->batter_1_sn,
                'num_of_rect'=>  $battery->num_of_rect,
                'rect_num'=>  $battery->rect_num,
                'bank_num'=>  $battery->bank_num,
                'install_date'=>  $battery->install_date,
                'aircon_status'=>  $battery->aircon_status,
                'rect_charge_status'=>  $battery->rect_charge_status,
                'old_batteries_aging'=>  $battery->old_batteries_aging,
                'llvd'=>  $battery->llvd,
                'blvd'=>  $battery->blvd,
            ];
        });
        return $batteries;
        // return BatteryAdd::all();
    }
       /*
    Worksheet title
    */
    public function title():string
    {
        return 'Batteries_DB';

    }
}

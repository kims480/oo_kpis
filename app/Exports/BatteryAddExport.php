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
                'Site ID'=>  $battery->site->site_id,
                'Added By'=>  $battery->user->name,
                'Amp Before'=>$battery->Amp_before,
                'volt Before' =>$battery->volt_before,
                'Ref WO'=>  $battery->ref_wo,
                'Ref CR'=>  $battery->ref_cr,
                'Batter SN'=>  $battery->batter_1_sn,
                'Battery Brand'=>$battery->battery_brand,
                'Battery Model'=>$battery->Battery_model,
                'Bhelter Num'=>  $battery->shelter_num,
                'Num Of Rect'=>  $battery->num_of_rect,
                'Rect#'=>  $battery->rect_num,
                'Bank number'=>  $battery->bank_num,
                'Install Date'=>  $battery->install_date,
                'Aircon Status'=>  $battery->aircon_status,
                'Rect Charge Status'=>  $battery->rect_charge_status,
                'Old Batteries Aging'=>  $battery->old_batteries_aging,
                'Llvd'=>  $battery->llvd,
                'Blvd'=>  $battery->blvd,
                'Volt After' =>$battery->Volt_after,
                'Amp After'=>$battery->Amp_After,
                'Capacity Rating'=>$battery->capacity_rating,
                'Remarks'=>$battery->remarks
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

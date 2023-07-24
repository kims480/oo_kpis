<?php

namespace App\Exports;


use App\Traits\ExportStyle;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;

class EmployeeExport implements FromCollection, WithHeadings,ShouldAutoSize,WithStyles,WithTitle
{
    use Exportable,ExportStyle;

    public Collection $employees;

    public function headings(): array
    {
        return $this->colArrayList();
    }
    /**
     * get Headers as array list
     * @return array headers
     */
    public function colArrayList():array
    {
        if(method_exists($this,'collection'))
        {
            // dd($this->collection());
            $colArrList = json_decode($this->collection(), true);

            // dd($colArrList);
            return array_keys($colArrList[0]);
        }




    }


    public function __construct(Collection $employees) {
        // dd($employees);
        $this->employees = $employees;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        // $batteries=$batteries->map(function ($battery) {
        //     return [
        //         'id'=>  $battery->id,
        //         'Site ID'=>  $battery->site->site_id,
        //         'Added By'=>  $battery->user->name,
        //         'Amp Before'=>$battery->Amp_before,
        //         'volt Before' =>$battery->volt_before,
        //         'Ref WO'=>  $battery->ref_wo,
        //         'Ref CR'=>  $battery->ref_cr,
        //         'Batter SN'=>  $battery->batter_1_sn,
        //         'Battery Brand'=>$battery->battery_brand,
        //         'Battery Model'=>$battery->Battery_model,
        //         'Bhelter Num'=>  $battery->shelter_num,
        //         'Num Of Rect'=>  $battery->num_of_rect,
        //         'Rect#'=>  $battery->rect_num,
        //         'Bank number'=>  $battery->bank_num,
        //         'Install Date'=>  $battery->install_date,
        //         'Aircon Status'=>  $battery->aircon_status,
        //         'Rect Charge Status'=>  $battery->rect_charge_status,
        //         'Old Batteries Aging'=>  $battery->old_batteries_aging,
        //         'Llvd'=>  $battery->llvd,
        //         'Blvd'=>  $battery->blvd,
        //         'Volt After' =>$battery->Volt_after,
        //         'Amp After'=>$battery->Amp_After,
        //         'Capacity Rating'=>$battery->capacity_rating,
        //         'Remarks'=>$battery->remarks
        //     ];
        // });
        // dd($this->tickets);
        return new Collection($this->employees);
        // return BatteryAdd::all();
    }
       /*
    Worksheet title
    */
    public function title():string
    {
        return 'Employee_DB';

    }

}

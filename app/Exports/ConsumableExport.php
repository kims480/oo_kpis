<?php

namespace App\Exports;

use App\Models\ConsumableSpare;
use App\Traits\ExportStyle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;

class ConsumableExport implements FromCollection, WithHeadings,ShouldAutoSize,WithStyles,WithTitle
{
    use Exportable,ExportStyle;



    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $consumableSpares=ConsumableSpare::select('*')->get();
        $consumableSpares=$consumableSpares->map(function ($consumableSpare) {
            return [
              '#'=>$consumableSpare->id,
              'Old BOM'=>$consumableSpare->old_bom,
              'New BOM'=>$consumableSpare->new_bom,
              'Descr*'=>$consumableSpare->description,
              'UOM'=>$consumableSpare->uom,
              'Important'=>$consumableSpare->Important,
              'High Consumption'=>$consumableSpare->high_consumption,
              'Muscat'=>$consumableSpare->muscat_stk,
              'Salalah'=>$consumableSpare->sll_stk,
              'Sohar'=>$consumableSpare->shr_stk,
              'Nizwa'=>$consumableSpare->nzw_stk,
              'Ibra'=>$consumableSpare->ibra_stk,
              'Ibri'=>$consumableSpare->ibri_stk,
              'Adam'=>$consumableSpare->adm_stk,
              'Swuiq'=>$consumableSpare->swq_stk,
              'Duqqam'=>$consumableSpare->dqm_stk,
              'Sur'=>$consumableSpare->sur_stk,
              'Khasab'=>$consumableSpare->khasab_stk,
              'Haima'=>$consumableSpare->haima_stk,
              'Total'=>$consumableSpare->muscat_stk
                        +$consumableSpare->sll_stk
                        +$consumableSpare->shr_stk
                        +$consumableSpare->nzw_stk
                        +$consumableSpare->ibra_stk
                        +$consumableSpare->ibri_stk
                        +$consumableSpare->adm_stk
                        +$consumableSpare->swq_stk
                        +$consumableSpare->dqm_stk
                        +$consumableSpare->sur_stk
                        +$consumableSpare->khasab_stk
                        +$consumableSpare->haima_stk
            ];
        });
        return $consumableSpares;

    }
       /*
    Worksheet title
    */
    public function title():string
    {
        return 'Consumable_DB';

    }
}

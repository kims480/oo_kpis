<?php

namespace App\Http\Livewire;

use App\Exports\ConsumableExport;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class ConsumableSpares extends Component
{
    use WithPagination;

    public $perPage =10;

    public
        $old_bom,
        $new_bom, $description,$uom,$Important,
        $high_consumption;
        // $muscat_stk,$sll_stk,        $shr_stk,$nzw_stk,$ibra_stk,$ibri_stk,        $adm_stk,$swq_stk,$dqm_stk,$sur_stk,        $khasab_stk,$haima_stk;
    public $your_file;
    public $imported;
    public function rules(): array
    {
        return [
            'your_file' => 'file|mimetypes:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet|max:102400',
        ];
    }

    public function mount(Collection $imported)
    {
        $this->imported = $imported;
    }
    public function render()
    {
        $consumableSpares=DB::table('consumable_spares')
            ->where('old_bom', 'like', '%' . $this->old_bom . '%')
            ->where(function ($query) {
                $query->where('new_bom', 'like', '%' . $this->new_bom . '%');

            })
            ->where(function ($query) {
                $query->where('description', 'like', '%' . $this->description . '%');

            })
            ->Where('uom', 'like', '%' . $this->uom . '%')
            ->Where('Important', 'like', '%' . $this->Important . '%')
            ->Where('high_consumption', 'like', '%' . $this->high_consumption . '%')
            ->Where('uom', 'like', '%' . $this->uom . '%')
            ->Where('consumable_spares.deleted_at', null)

            ->orderByDesc('consumable_spares.id')
            ->paginate($this->perPage);
            // $this->$consumableSpares=$consumableSpares;
        return view('livewire.consumable.list-consumable-spares', ['consumableSpares' => $consumableSpares]);
    }


    ########## Export Wilayat to Excel ###############
    public function export()
    {
        return Excel::download(new ConsumableExport, 'Consumables.xlsx');
    }


}

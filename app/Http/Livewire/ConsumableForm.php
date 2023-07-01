<?php

namespace App\Http\Livewire;

use App\Models\ConsumableMove;
use App\Models\ConsumableSpare;
use App\Models\Site;
use Livewire\Component;

class ConsumableForm extends Component
{


    public $consumable_move;
    public $site_name = '';
    public $selectedSite_id = null;
    public $siteSearch = null;
    public $SitesList;
    public $consumable_spare_bom = '';
    public $selectedSpare_id = null;
    public $spareSearch = null;
    public $SparesList;
    public $isEdit=false;
    public $iscomplete=false;
    public $consumable_moveConsumable_spares = [];
    public $allConsumable_spares = [];

    public function mount(ConsumableMove $consumable_move)
    {
        $this->consumable_move = $consumable_move;

        $this->allConsumable_spares = ConsumableSpare::all();

        if ($this->consumable_move) {
            foreach ($this->consumable_move->consumable_spares as $consumable_spare) {
                $this->consumable_moveConsumable_spares[] = [
                    'consumable_spare_id' => $consumable_spare->id,
                    'quantity' => $consumable_spare->pivot->quantity,
                    'is_saved' => true,
                    'site_name' => $this->site_name_id,
                ];
            }
        }
    }

    public function render()
    {
        $this->SitesList = Site::where('site_id', 'like', '%' . $this->siteSearch . '%')->select('id', 'site_id')->paginate(100)->pluck('site_id', 'id');


        return view("livewire.consumable-form");
        // return view('livewire.consumable-form');
    }

    public function updatedSelectedSiteId()
    {
        is_null($this->selectedSite_id)?  $this->iscomplete=null : '';
        // if (!is_null($value)) {
        //     $this->edit=false;
        // }
    }
    public function updatedConsumableMove($value)
    {
        ($this->consumable_move->wo && $this->selectedSite_id ) ? $this->iscomplete=true:  $this->iscomplete=null ;

    }

    function updated() {

        // $this->dispatchBrowserEvent('SelectSearch');
    }
    public function updatedConsumableMoveConsumableSpares()
    {
        $this->dispatchBrowserEvent('SelectSearch');
        // dd('test');

    }
    public function addConsumable_spare()
    {
        // $this->dispatchBrowserEvent('SelectSearch');

        foreach ($this->consumable_moveConsumable_spares as $key => $consumable_moveConsumable_spare) {
            if (!$consumable_moveConsumable_spare['is_saved']) {
                $this->dispatchBrowserEvent('SelectSearch');
                $this->addError('consumable_moveConsumable_spares.' . $key, 'This line must be saved before creating a new one.');
                return;
            }
        }

        $this->isEdit=false;
        $this->consumable_moveConsumable_spares[] = [
            'consumable_spare_id' => '',
            'quantity' => 1,
            'stock' => 'muscat_stk',
            'is_saved' => false,
        ];
    }

    public function editConsumable_spare($index)
    {
        // $this->dispatchBrowserEvent('SelectSearch');
        foreach ($this->consumable_moveConsumable_spares as $key => $consumable_moveConsumable_spare) {
            if (!$consumable_moveConsumable_spare['is_saved']) {
                $this->addError('consumable_moveConsumable_spares.' . $key, 'This line must be saved before editing another.');
                $this->isEdit=false;
                return;
            }
        }

        $this->isEdit=false;

        $this->consumable_moveConsumable_spares[$index]['is_saved'] = false;
    }

    public function saveConsumable_spare($index)
    {
        $this->resetErrorBag();
        $consumable_spare = ConsumableSpare::find($this->consumable_moveConsumable_spares[$index]['consumable_spare_id']);
        $this->consumable_moveConsumable_spares[$index]['old_bom'] = $consumable_spare->old_bom;
        $this->consumable_moveConsumable_spares[$index]['description'] = $consumable_spare->description;
        // $this->consumable_moveConsumable_spares[$index]['stock'] = $consumable_spare->description;

        $this->consumable_moveConsumable_spares[$index]['is_saved'] = true;
        $this->isEdit=true;

    }

    public function removeConsumable_spare($index)
    {
        unset($this->consumable_moveConsumable_spares[$index]);
        $this->consumable_moveConsumable_spares = array_values($this->consumable_moveConsumable_spares);
    }

    public function saveConsumable_move()
    {
        $this->validate();
        $this->consumable_move->user_id=auth()->user()->id;

        $this->consumable_move->site_id=Site::find($this->selectedSite_id)->id;
        dd($this->consumable_move,$this->consumable_moveConsumable_spares);
        $this->consumable_move->save();

        $consumable_spares = [];

        foreach ($this->consumable_moveConsumable_spares as $consumable_spare) {
            $consumable_spares[$consumable_spare['consumable_spare_id']] = ['quantity' => $consumable_spare['quantity'],];
        }

        $this->consumable_move->consumable_spares()->sync($consumable_spares);

        $this->close();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Spare Dispached successfully',
            'text' => '',
            'customClass'=> 'swal-wide',
        ]);

        // return redirect()->route(__('models/consumableSpares.route').'.index');
    }

    public function routeBattery ()
    {
        return redirect()->route(__('models/batteryAdds.singular').'.index');

    }

    protected function rules(): array
    {
        return [
            'selectedSite_id'  => 'required',
            'consumable_move.wo' => 'required|string',
            'consumable_moveConsumable_spares' =>  'required|array|min:1',
        ];
    }
    function close(){
        $this->site_name = null;
        $this->consumable_move->wo = null;
        $this->consumable_moveConsumable_spares = [];
        $this->SitesList = collect();
        $this->selectedSite_id=null;
        $this->isEdit=false;
        $this->iscomplete=false;
        $this->resetValidation();
        $this->resetErrorBag();


    }

}

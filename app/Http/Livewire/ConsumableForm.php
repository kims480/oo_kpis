<?php

namespace App\Http\Livewire;

use App\Models\ConsumableMove;
use App\Models\ConsumableSpare;
use Livewire\Component;

class ConsumableForm extends Component
{


    public $consumable_move;
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
                    // 'consumable_spare_name' => $consumable_spare->site_id,

                ];
            }
        }
    }

    public function render()
    {
        // $total = 0;

        // foreach ($this->consumable_moveConsumable_spares as $consumable_moveConsumable_spare) {
        //     if ($consumable_moveConsumable_spare['is_saved'] && $consumable_moveConsumable_spare['consumable_spare_price'] && $consumable_moveConsumable_spare['quantity']) {
        //         $total += $consumable_moveConsumable_spare['consumable_spare_price'] * $consumable_moveConsumable_spare['quantity'];
        //     }
        // }

        return view('livewire.consumable-form');
    }

    public function addConsumable_spare()
    {
        foreach ($this->consumable_moveConsumable_spares as $key => $consumable_moveConsumable_spare) {
            if (!$consumable_moveConsumable_spare['is_saved']) {
                $this->addError('consumable_moveConsumable_spares.' . $key, 'This line must be saved before creating a new one.');
                return;
            }
        }

        $this->consumable_moveConsumable_spares[] = [
            'consumable_spare_id' => '',
            'quantity' => 1,
            'is_saved' => false,


        ];
    }

    public function editConsumable_spare($index)
    {
        foreach ($this->consumable_moveConsumable_spares as $key => $consumable_moveConsumable_spare) {
            if (!$consumable_moveConsumable_spare['is_saved']) {
                $this->addError('consumable_moveConsumable_spares.' . $key, 'This line must be saved before editing another.');
                return;
            }
        }

        $this->consumable_moveConsumable_spares[$index]['is_saved'] = false;
    }

    public function saveConsumable_spare($index)
    {
        $this->resetErrorBag();
        $consumable_spare = ConsumableSpare::find($this->consumable_moveConsumable_spares[$index]['consumable_spare_id']);
        $this->consumable_moveConsumable_spares[$index]['old_bom'] = $consumable_spare->old_bom;

        $this->consumable_moveConsumable_spares[$index]['is_saved'] = true;
    }

    public function removeConsumable_spare($index)
    {
        unset($this->consumable_moveConsumable_spares[$index]);
        $this->consumable_moveConsumable_spares = array_values($this->consumable_moveConsumable_spares);
    }

    public function saveConsumable_move()
    {
        $this->validate();

        $this->consumable_move->save();

        $consumable_spares = [];
        // dd($this->consumable_moveConsumable_spares);
        foreach ($this->consumable_moveConsumable_spares as $consumable_spare) {
            $consumable_spares[$consumable_spare['consumable_spare_id']] = ['quantity' => $consumable_spare['quantity'],];
        }

        $this->consumable_move->consumable_spares()->sync($consumable_spares);

        return redirect()->route(__('models/consumableSpares.route').'.index');
    }

    protected function rules(): array
    {
        return [
            'consumable_move.site_id'  => 'required|string',
            'consumable_move.wo' => 'required|string'
        ];
    }

}

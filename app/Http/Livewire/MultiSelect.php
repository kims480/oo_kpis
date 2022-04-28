<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MultiSelect extends Component
{
    public $label;
    public $itemId;
    public $optionList;
    public $optionValue;
    public $optionSelected;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount($label=null,$itemId=null,$optionList=null,$optionValue=null,$optionSelected=null)
    {
        $this->label=$label;
        $this->itemId=$itemId;
        $this->optionList=$optionList;
        $this->optionValue=$optionValue;
        $this->optionSelected=$optionSelected;
    }
    public function render()
    {
        return view('livewire.multi-select');
    }
}

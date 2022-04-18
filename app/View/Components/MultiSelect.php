<?php

namespace App\View\Components;

use Collator;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class MultiSelect extends Component
{
    public $label;
    public $optionList;
    public $optionValue;
    public $optionSelected;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label=null,$optionList=null,$optionValue=null,$optionSelected=null)
    {
        $this->label=$label;
        $this->optionList=$optionList;
        $this->optionValue=$optionValue;
        $this->optionSelected=$optionSelected;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.multi-select');
    }
}

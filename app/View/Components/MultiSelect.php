<?php

namespace App\View\Components;

use Collator;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class MultiSelect extends Component
{
    public $label;
    public $itemId;
    public $optionList;
    public $optionValue;
    public $optionName;
    public $optionSelectedId;
    public $optionSelectedName;
    public $itemSearch;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label=null,$itemId=null,$optionList=null,$optionValue=null,$optionName=null,$optionSelectedId=null,$itemSearch=null,$optionSelectedName=null)
    {
        $this->label=$label;
        $this->itemId=$itemId;
        $this->optionList=$optionList;
        $this->optionValue=$optionValue;
        $this->optionName=$optionName;
        $this->optionSelectedId=$optionSelectedId;
        $this->optionSelectedName=$optionSelectedName;
        $this->itemSearch=$itemSearch;
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

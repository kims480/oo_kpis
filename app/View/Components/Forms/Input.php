<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Input extends Component
{
    public $id, $type, $label, $wireModel;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id="",$type="text", $label="", $wireModel="")
    {
        $this->id=$id;
        $this->type=$type;
        $this->label=$label;
        $this->wireModel=$wireModel;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input');
    }
}

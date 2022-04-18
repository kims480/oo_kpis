<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ButtonTip extends Component
{
    public $tooltip;
    public $wiref;
    public $type;
    public $text;
    public $action;
    public $icon;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tooltip='tooltip', $wiref='',$text='',$icon='',$type='default',$action=null)
    {
        $this->tooltip = $tooltip;
        $this->wiref = $wiref;
        $this->text = $text;
        $this->icon = $icon;
        $this->type = $type;
        $this->action = $action;
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button-tip');
    }
}

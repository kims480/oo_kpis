<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select_search extends Component
{
    public $index;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($index=0)
    {
        $this->index=$index;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select.select_search');
    }
}

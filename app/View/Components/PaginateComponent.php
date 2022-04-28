<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PaginateComponent extends Component
{
    public $items = array();
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($items=null)
    {
        $this->items=$items;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.paginate-component');
    }
}

<?php

namespace App\View\Component\Alert;

use Illuminate\View\Component;

class Alert extends Component
{
    public $type;
    public $title;
    public $message;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type='info',$title=null,$message=null)
    {
        $this->type=$type;
        $this->title=$title;
        $this->message=$message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}

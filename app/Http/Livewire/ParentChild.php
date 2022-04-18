<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ParentChild extends Component
{
    public $parents;
    public $children;

    public $parentModelName;
    public $parentLabel;
    public $parentInputName;
    public $parentValue;

    public $childModelName;
    public $childLabel;
    public $childInputName;
    public $childValue;
    public $relationshipFieldName;

    public $designTemplate = 'bootstrap';

    public function mount()
    {
        $this->parents = (new $this->parentModelName)->all();
        $this->children = collect();
    }

    public function render()
    {
        return view('livewire.'.$this->designTemplate.'.parent-child');
    }

    public function updatedParentValue($value)
    {
    //    dd($this->parentValue);

    $this->children = (new $this->childModelName)
    ->where($this->relationshipFieldName, $value)
    ->get();

    $this->childValue = $this->children->first()->id ?? null;
    // dd($this->children);
    }

}

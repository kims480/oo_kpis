<?php

namespace App\Http\Livewire;

use App\Models\MainCateg;
use App\Models\Snagmang;
use App\Models\SubCateg;
use Livewire\Component;

class MainSubCateg extends Component
{
    public $maincategs;
    public $subcategs;
    public $snags;

    public $snag_name;
    public $selectedMaincateg = null;
    public $selectedSubcateg = null;
    public $selectedSnag = null;

    public function mount()
    {
        $this->maincategs = MainCateg::all();
        $this->subcategs = collect();
        $this->snags = collect();
    }

    public function render()
    {
        return view('livewire.main-sub-categ', [
            'snags' => Snagmang::with('sub_categ.main_categ')->latest()->take(5)->get()
        ]);
    }

    public function updatedSelectedMaincateg($value)
    {
        $this->subcategs = SubCateg::where('main_categ_id', $value)->get();
        $this->selectedSubcateg = null;
    }

    public function updatedSelectedSubcateg($value)
    {
        if (!is_null($value)) {
            $this->snags = Snagmang::where('sub_categ_id', $value)->get();
        }
    }

    public function storeCompany()
    {
        $this->validate([
            'snag_name' => 'required',
            'selectedSubcateg' => 'required',
        ]);

        Snagmang::create([
            'description' => $this->snag_name,
            'sub_categ_id' => $this->selectedSubcateg,
        ]);

        $this->snag_name = '';
        $this->selectedMaincateg = null;
        $this->selectedSubcateg = null;
        $this->selectedSnag = null;
        $this->subcategs = collect();
        $this->snags = collect();
    }



}

<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\MainCateg;
use App\Models\Snagd;
use App\Models\Snagmang;
use App\Models\State;
use App\Models\SubCateg;
use Livewire\Component;

class Companies extends Component
{
    public $countries;
    public $states;
    public $cities;

    public $name;
    public $selectedCountry = null;
    public $selectedState = null;
    public $selectedCity = null;

    public function mount()
    {
        $this->countries = MainCateg::all();
        $this->states = collect();
        $this->cities = collect();
    }

    public function render()
    {
        return view('livewire.companies', [
            'companies' => Snagmang::with('sub_categ.main_categ')->latest()->take(5)->get()
        ]);
    }

    public function updatedSelectedCountry($value)
    {
        $this->states = SubCateg::where('main_categ_id', $value)->get();
        $this->selectedState = null;
    }

    public function updatedSelectedState($value)
    {
        if (!is_null($value)) {
            $this->cities = Snagmang::where('sub_categ_id', $value)->get();
        }
    }

    public function storeCompany()
    {
        $this->validate([
            'name' => 'required',
            'selectedCity' => 'required',
        ]);

        Snagmang::create([
            'description' => $this->name,
            'sub_categ_id' => $this->selectedCity,
        ]);

        $this->name = '';
        $this->selectedCountry = null;
        $this->selectedState = null;
        $this->selectedCity = null;
        $this->states = collect();
        $this->cities = collect();
    }
}

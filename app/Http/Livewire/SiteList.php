<?php

namespace App\Http\Livewire;

use App\Models\Site;
use Livewire\Component;
use Livewire\WithPagination;

class SiteList extends Component
{
    use WithPagination;
    public  $SitesList;
    public $site_name = null;
    public $selectedSite_id = null;
    public $siteSearch = null;

    protected $messages = [
        'selectedSite_id.required' => 'The Site_ID cannot be empty.',
    ];
    public function rules()
    {
        return [
            'selectedSite_id' => 'required',
        ];
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, $this->rules());
    }
    public function render()
    {
        $this->SitesList = Site::where('site_id', 'like', '%' . $this->siteSearch . '%')->select('id', 'site_id')->orderBy('site_id','ASC')->paginate(100)->pluck('site_id', 'id');

        return view('livewire.site-list');
    }

    public function updatedSelectedSite_id($value)
    {
        // $this->site_name = $this->selectedSite_id;;
        // $this->selectedSubcateg = null;
    }

}

<?php

namespace App\Http\Livewire;

use App\Models\MainCateg;
use App\Models\Site;
use App\Models\SiteSnag;
use App\Models\Snag;
use App\Models\SubCateg;
use Livewire\Component;

class SnagToSite extends Component
{
    public $test;
    public $site_name = null;
    public $selectedSite_id = null;
    public $siteSearch = null;
    public $snag_name = null;
    public $snagSearch = null;
    public $selectedSnag_id = null;
    public $selectedSnagsList = null;
    public $selectedMaincateg = null;
    public $selectedSubcateg = null;
    public $SitesList;
    public $maincategs;
    public $subcategs;


    function mount($test=null){
        $this->maincategs = MainCateg::select('id', 'name')->get();
        $this->subcategs = collect();
        $this->test=$test;
    }
    public function render()
    {
        $this->SitesList = Site::where('site_id', 'like', '%' . $this->siteSearch . '%')->select('id', 'site_id')->paginate(100)->pluck('site_id', 'id');
        $this->SnagsList = Snag::where('description', 'like', '%' . $this->snagSearch . '%')->select('id','description')->with('sub_categ.main_categ')->pluck('description', 'id');


        return view('livewire.snag-to-site')->extends('layouts.app')->section('content');
            // ->layout('');
    }
    public function updatedSelectedMaincateg($value)
    {
        $this->subcategs = SubCateg::where('main_categ_id', $value)->get();
        $this->snagSearch=null;
        // $this->selectedSubcateg = null;
    }
    public function updatedSelectedSubcateg($value)
    {
        if (!is_null($value)) {
            $this->SnagsList = Snag::where('description', 'like', '%' . $this->snagSearch . '%')
            ->where('sub_categ_id', $value)->pluck('description', 'id');
        }
    }
    function close(){
        $this->snag_name = '';
        $this->selectedMaincateg = null;
        $this->selectedSubcateg = null;
        $this->selectedSnag = null;
        $this->subcategs = collect();
        $this->snags = collect();
        $this->SnagsList = collect();
        $this->SitesList = collect();
        $this->selectedSite_id=null;
        $this->selectedSnag_id=null;
        $this->selectedSnag_domain = null;
        $this->selectedSnag_reporter = null;
        $this->selectedSnag_status = null;
        $this->selectedSnag_remarks = null;
        $this->snag_name = null;
        $this->report_date = null;
        $this->closure_date = null;
    }
    public function storeSiteSnag()
    {
        // dd($this->data);
        $this->validate([
            'selectedSnag_id' => 'required',
            'selectedSite_id' => 'required',
        ]);

        $site = Site::find($this->selectedSite_id);
        $site->snags()->attach([$this->selectedSnag_id]);

        $site_snag = SiteSnag::whereSiteId($site->id)->whereSnagId($this->selectedSnag_id)->first();

        $site_snag->domain_id = $this->selectedSnag_domain;
        $site_snag->snag_reported_id = $this->selectedSnag_reporter;
        $site_snag->snagstatus_id = $this->selectedSnag_status;
        $site_snag->snag_closed_by = Auth::user()->id;
        $site_snag->snag_remark_id = $this->selectedSnag_remarks;
        $site_snag->remarks = $this->snag_name;
        $site_snag->report_date = $this->report_date;
        $site_snag->closure_date = $this->closure_date;

        $site_snag->save();

        $this->close();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Snag added successfully',
            'text' => '',
        ]);
        // $site->snag()->attach($this->selectedSnag_id);



    }
}

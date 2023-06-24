<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BatteryAdd;
use App\Models\MainCateg;
use App\Models\Site;
use App\Models\Snag;
use App\Models\SubCateg;
use Illuminate\Support\Facades\Auth;

class ConsumableSpares extends Component
{
    //Site ID	Rectifier Number	Bank#	Battery#	B SN	B Installation Date	#Rectifiers	Airconditioning status		aging of old batteries

    public $test;
    public $site_name = '';
    public $selectedSite_id = null;
    public $siteSearch = null;
    public $Battery_name = '';
    public $BatterySearch = null;
    public $SitesList;
    public $BAtteriesList;
    public $maincategs;
    public $rectifierNum;
    public $BankNum;
    public $shelterNum;
    public $BatteryBankNum;
    public $BatterySN;
    public $batteryInstallationDate;
    public $numOfRectifiers;
    public $airconditioningStatus;
    public $rectifierChargingStatus;
    public $agingOfOldBatteries;

    protected $messages = [
        'selectedSnag_id.required' => 'The Snag cannot be empty.',
        'selectedSite_id.required' => 'The Site_ID cannot be empty.',
    ];

    function mount($test=null){
        $this->maincategs = MainCateg::select('id', 'name')->get();
        $this->subcategs = collect();
        $this->SiteSnagsList = collect();
        $this->test=$test;
    }
    public function render()
    {
        $this->SitesList = Site::where('site_id', 'like', '%' . $this->siteSearch . '%')->select('id', 'site_id')->paginate(100)->pluck('site_id', 'id');
        // $this->SnagsList = Snag::where('description', 'like', '%' . $this->snagSearch . '%')->select('id','description')->with('sub_categ.main_categ')->pluck('description', 'id');
        // return view('livewire.consumable-spares');
        return view('livewire.batteries.add-site-batteries')->extends('layouts.app')->section('content');
            // ->layout('');
    }
    public function updatedSelectedSiteId($value)
    {
        // $this->SiteSnagsList = SiteSnag::where('site_id',  $this->selectedSite_id)->with(['site','snag','reportedBy','snagdomain','snagreporter','snagremark','snagstatus','snag_closed_by'])->get();

        // $this->snagSearch=null;
        // $this->selectedSubcateg = null;
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

        $this->resetValidation();
        $this->resetErrorBag();
    }
    public function storeSiteSnag()
    {
        // dd($this->data);
        $this->validate([
            // 'selectedSnag_id' => 'required',
            'selectedSite_id' => 'required',
        ]);

        $site = Site::find($this->selectedSite_id);
        // $site->snags()->attach([$this->selectedSnag_id]);

        // $site_snag = SiteSnag::whereSiteId($site->id)->whereSnagId($this->selectedSnag_id)->first();
        $addBattery=BatteryAdd::create([
            'deployed_at_site'=>$site->id,
            'deployed_by'=> auth::user()->id
        ]);


        $addBattery->save();

        $this->close();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Snag added successfully',
            'text' => '',
        ]);
        // $site->snag()->attach($this->selectedSnag_id);



    }

}

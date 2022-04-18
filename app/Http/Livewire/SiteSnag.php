<?php

namespace App\Http\Livewire;

use App\Models\MainCateg;
use App\Models\Site;
use App\Models\SiteSnag as ModelsSiteSnag;
use App\Models\Snag;
use App\Models\Snagdomain;
use App\Models\Snagremark;
use App\Models\Snagreporter;
use App\Models\Snagstatus;
use App\Models\SubCateg;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class SiteSnag extends Component
{
    use WithPagination;
    public $maincategs;
    public $subcategs;


    public  $SnagsList, $SitesList;

    public $selectedMaincateg = null;
    public $selectedSubcateg = null;

    public $site_name = null;
    public $snag_name = null;
    public $selectedSite_id = null;
    public $selectedSnag_id = null;
    public $snagSearch = null;
    public $siteSearch = null;
    public $siteOptionListActive = false;

    public $selectedSnagsList = null;
    public $selectedSitesList = null;
    public $siteSelected;
    public $snag_remarks;
    public $snags_status;
    public $snag_domain;
    public $snag_reporter;
    public $selectedSnag_remarks;
    public $selectedSnag_status;
    public $selectedSnag_domain;
    public $selectedSnag_reporter;
    public $report_date;
    public $closure_date;
    public $data = [];


    protected $listeners = ['siteSelected' => 'selectSite'];


    public function mount()
    {
        $this->maincategs = MainCateg::select('id', 'name')->get();
        $this->subcategs = collect();

        $this->SnagsList = Snag::with('sub_categ.main_categ')->pluck('description', 'id');
        $this->snag_remarks = Snagremark::select('id', 'remark')->pluck('remark', 'id');
        $this->snags_status = Snagstatus::select('id', 'name')->pluck('name', 'id');
        $this->snag_domain = Snagdomain::select('id', 'name')->pluck('name', 'id');
        $this->snag_reporter = Snagreporter::select('id', 'name')->pluck('name', 'id');

        $this->data = [
            'selectedSite_id' => $this->selectedSite_id,
            'selectedSnag_id' => $this->selectedSnag_id,
            'Snag_domain' => $this->selectedSnag_domain,
            'Snag_MainCateg' => $this->selectedMaincateg,
            'Snag_remarks' => $this->selectedSnag_remarks,
        ];
        // $this->site_s="";
    }

    public function rules()
    {
        return [];
    }
    public function render()
    {
        // $this->SnagsList = Snagmang::all()->pluck('description','id');
        // $siteSnags = $this->siteSnagRepository->paginate(10);
        // dd($siteSnags);
        // return view('site_snags.create',compact('SnagsList','SitesList'));
        $this->SitesList = Site::where('site_id', 'like', '%' . $this->siteSearch . '%')->select('id', 'site_id')->paginate(100)->pluck('site_id', 'id');
        return view('livewire.site-snag', [
            // 'snags' => Snagmang::with('sub_categ.main_categ')->latest()->take(5)->get(),
            // 'SnagsList'=>Snagmang::with('sub_categ.main_categ')->latest()->take(5)->get(),
        ]);
    }




    // public function updatedSiteId($value)
    // {
    //     if (!is_null($value)) {
    //         $this->site_id = $value;
    //         // $this->site_name=Site::findOrFail($this->site_s)->site_id;
    //         // $this->selectedMaincateg = null;
    //     }
    // }
    public function updatedSelectedMaincateg($value)
    {
        $this->subcategs = SubCateg::where('main_categ_id', $value)->get();
        // $this->selectedSubcateg = null;
    }

    public function updatedSelectedSubcateg($value)
    {
        if (!is_null($value)) {
            // $this->snags = Snagmang::where('sub_categ_id', $value)->get();
            $this->SnagsList = Snag::where('sub_categ_id', $value)
                ->orWhere('description', $this->snagSearch)->pluck('description', 'id');
            // $this->selectedSnagsList=null;
        }
    }

    // public function updatedSnagId($value)
    // {
    //     if (!is_null($value)) {
    //         $this->snag_id = $value;
    //         // $this->selectedSnagsList = null;
    //     }
    // }

    public function storeSiteSnag()
    {
        // dd($this->data);
        $this->validate([
            'selectedSnag_id' => 'required',
            'selectedSite_id' => 'required',
        ]);

        $site = Site::find($this->selectedSite_id);
        $site->snags()->attach([$this->selectedSnag_id]);

        $site_snag = ModelsSiteSnag::whereSiteId($site->id)->whereSnagId($this->selectedSnag_id)->first();

        $site_snag->domain_id = $this->selectedSnag_domain;
        $site_snag->snag_reported_id = $this->selectedSnag_reporter;
        $site_snag->snagstatus_id = $this->selectedSnag_status;
        $site_snag->snag_closed_by = Auth::user()->id;
        $site_snag->snag_remark_id = $this->selectedSnag_remarks;
        $site_snag->remarks = $this->snag_name;
        $site_snag->report_date = $this->report_date;
        $site_snag->closure_date = $this->closure_date;

        $site_snag->save();
        // $site->snag()->attach($this->selectedSnag_id);


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
}

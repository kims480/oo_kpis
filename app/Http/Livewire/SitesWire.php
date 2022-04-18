<?php

namespace App\Http\Livewire;

use App\Exports\SiteAllExport;
use App\Exports\SitesExport;
use App\Imports\SitesAllImport;
use App\Imports\SitesImport;
use App\Models\Site;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class SitesWire extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $perPage=10;
    public $site_id;
    public $prio;
    public $ceteg;
    public $office;
    public $type;
    public $wilayat;
    public $govern;
    public $your_file;
public $imported;
    public function rules():array
    {
        return [
            'your_file' => 'file|mimetypes:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet|max:102400',
        ];
    }

    public function mount(Collection $imported)
    {
        $this->imported=$imported;

    }
    public function render()
    {
        $sites=Site::with(['priority'=>function($pr){
            $pr->select('id','name');
        },'category','office','siteType','wilayat.govern'])
        ->where('site_id','like', '%'.$this->site_id.'%')
        // ->orWhere ('priority.name','like', '%'.$this->prio.'%')

        ->paginate($this->perPage);
        return view('livewire.sites-wire',['sites'=>$sites]);
    }


    // public function updated($your_file)
    // {
    //     $this->validateOnly($your_file, [
    //         'your_file' => 'file|mimetypes:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet|max:102400',
    //     ]);
    // }
     ########## Export Wilayat to Excel ###############
     public function export()
     {
         return Excel::download(new SiteAllExport, 'Sites.xlsx');
     }


     ########## Import Wilayat from Excel ###############
     public function import()
     {
        //  $this->validate($this->rules());
        $import = new SitesAllImport();
        // $import->onlySheets('Worksheet 1', 'Worksheet 3');
        $import =Excel::import($import, $this->your_file);
        // $this->imported= ($import );

        // $this->your_file->store('files');
        //  return redirect('/')->with('success', 'All good!');
     }

}

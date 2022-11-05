<?php

namespace App\Http\Livewire\Batteries;

use App\Exports\BatteryAddExport;
use App\Models\BatteryAdd;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class ListSiteBatteries extends Component
{

    use WithPagination;

    public $perPage = 10;
    public $site_id;
    public $battery_1_sn;
    public $ref_cr;
    public $ref_wo;
    public $install_date;
    public $num_of_rect;

    public $added_by;
    public $your_file;
    public $imported;
    public function rules(): array
    {
        return [
            'your_file' => 'file|mimetypes:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet|max:102400',
        ];
    }

    public function mount(Collection $imported)
    {
        $this->imported = $imported;
    }
    public function render()
    {
        // $batteries = BatteryAdd::with([
        //     "site" => function ($query) {
        //         $query->select('id', 'site_id');
        //     }, "user" => function ($query) {
        //         $query->select('id', 'name');
        //     }
        // ])
        //     // ->where('site_id','like', '%'.$this->site_id.'%')
        //     ->where('batter_1_sn', 'like', '%' . $this->battery_1_sn . '%')
        //     ->orWhere('ref_wo', 'like', '%' . $this->ref_wo . '%')
        //     ->orWhere('ref_cr', 'like', '%' . $this->ref_cr . '%')
        //     // ->orWhereSite('site_id', 'like', '%' . $this->site_id . '%')
        //     ->paginate($this->perPage);

        $batteries=DB::table('battery_add')
            ->Join('sites',function($sites){
                $sites->on('sites.id','=','battery_add.site__deployed')
                                ->Where('sites.site_id', 'like', '%' . $this->site_id . '%')
                                ->Where('sites.prio', 'like', '%' . $this->num_of_rect . '%');
                })
            ->Join('users',function($users){
                $users->on('users.id','=','battery_add.added_by')
                        ->Where('users.name', 'like', '%' . $this->added_by . '%');
            })
            ->select('battery_add.*','sites.id as site__id','sites.prio as site_prio','sites.site_id As site_name','users.id as user_id','users.name as user_name')
            ->where('batter_1_sn', 'like', '%' . $this->battery_1_sn . '%')
            ->where(function ($query) {
                $query->where('ref_wo', 'like', '%' . $this->ref_wo . '%')
                      ->orWhere('ref_wo', null);
            })
            ->where(function ($query) {
                $query->where('ref_cr', 'like', '%' . $this->ref_cr . '%')
                      ->orWhere('ref_cr', null);
            })
            ->Where('install_date', 'like', '%' . $this->install_date . '%')
            ->Where('battery_add.deleted_at', null)
            ->orderByDesc('battery_add.id')
            ->paginate($this->perPage);
        return view('livewire.batteries.list-site-batteries', ['batteries' => $batteries]);
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
        return Excel::download(new BatteryAddExport, 'Batteries.xlsx');
    }


    ########## Import Wilayat from Excel ###############
    public function import()
    {
        //  $this->validate($this->rules());
        // $import = new SitesAllImport();
        // $import->onlySheets('Worksheet 1', 'Worksheet 3');
        // $import =Excel::import($import, $this->your_file);
        // $this->imported= ($import );

        // $this->your_file->store('files');
        //  return redirect('/')->with('success', 'All good!');
    }
}

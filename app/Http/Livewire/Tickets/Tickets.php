<?php

namespace App\Http\Livewire\Tickets;

use App\Exports\TicketExport;
use DB;
use Excel;
use Livewire\Component;
use Livewire\WithPagination;

class Tickets extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $site_id;
    public $site_name;

    public $tt_number;
    public $alarm_name;

    public $created_by;
    public $description;
    public $assigned_to;
    public $created_at;
    public $contractor;
    public $categ;
    public $scope;
    public $status;
    public $sla;
    public $your_file;
    public $imported;
    protected  $tickets;
    public  $exportTT;



    public function rules(): array
    {
        return [
            'your_file' => 'file|mimetypes:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet|max:102400',
        ];
    }

    public function mount()
    {
        // $this->imported = $imported;
        $this->tickets = array();
    }
    public function render()
    {
        $this->tickets=DB::table('tickets')
        ->Join('sites',function($site){
            $site->on('sites.id','=','tickets.site_id')
                            ->select('id','site_id')
                            ->Where('sites.site_id', 'like', '%' . $this->site_id . '%');
            })
        ->leftJoin('users',function($users){
            $users->on('users.id','=','tickets.created_by')
                    ->select('id','name')
                    ->Where('users.name', 'like', '%' . $this->created_by . '%');
        })
        ->Join('otc_alarms',function($alarm){
            $alarm->on('otc_alarms.id','=','tickets.alarm_name')
                    ->Where('otc_alarms.name', 'like', '%' . $this->alarm_name . '%')
                    ->Where('otc_alarms.sla', 'like', '%' . $this->sla . '%');
        })
        ->Join('contractors',function($contractor){
            $contractor->on('contractors.id','=','tickets.contractor')
                    ->select('contractors.id','contractor.name')
                    ->Where('contractors.name', 'like', '%' . $this->contractor . '%');
        })
        ->Join('otc_categs',function($categ){
            $categ->on('otc_categs.id','=','tickets.categ')
                    ->Where('otc_categs.name', 'like', '%' . $this->categ . '%');
        })
        ->Join('otc_scopes',function($scope){
            $scope->on('otc_scopes.id','=','tickets.scope')
                    ->Where('otc_scopes.name', 'like', '%' . $this->scope . '%');
        })
        ->Join('otc_tt_statuss',function($status){
            $status->on('otc_tt_statuss.id','=','tickets.status')
                    ->Where('otc_tt_statuss.name', 'like', '%' . $this->status . '%');
        })
        ->select('tickets.*','sites.id as site__id','sites.site_id As site_name',
        'users.id as user_id','users.name as user_name'
        ,'contractors.name As contractor_name',
        'otc_scopes.name As scope_name',
        'otc_tt_statuss.name As status_name',
        'otc_alarms.name As alarm_name','otc_alarms.sla As alarm_sla',
        'otc_categs.name As categ_name')
        // ,'sites.id as site__id','sites.site_id As site_name','users.id as user_id','users.name as user_name'
         ->where(function ($query) {
            $query->where('tt_number', 'like', '%' . $this->	tt_number . '%')
                  ->orWhere('tt_number', null);
        })
        ->where(function ($query) {
            $query->where('description', 'like', '%' . $this->	description . '%')
                  ->orWhere('description', null);
        })

        ->Where('tickets.deleted_at', null)
        ->orderByDesc('tickets.id')
        ->paginate($this->perPage);
            // dd($this->tickets);
            // $this->exportTT = $tickets;

        return view('livewire.tickets.tickets', ['tickets' => $this->tickets]);
    }






    ########## Export Wilayat to Excel ###############
    public function export()
    {
        $this->exportTT=DB::table('tickets')
        ->Join('sites',function($site){
            $site->on('sites.id','=','tickets.site_id')
                            ->select('id','site_id')
                            ->Where('sites.site_id', 'like', '%' . $this->site_id . '%');
            })
        ->leftJoin('users',function($users){
            $users->on('users.id','=','tickets.created_by')
                    ->select('id','name')
                    ->Where('users.name', 'like', '%' . $this->created_by . '%');
        })

        ->Join('otc_alarms',function($alarm){
            $alarm->on('otc_alarms.id','=','tickets.alarm_name')
                    ->Where('otc_alarms.name', 'like', '%' . $this->alarm_name . '%')
                    ->Where('otc_alarms.sla', 'like', '%' . $this->sla . '%');
        })
        ->Join('contractors',function($contractor){
            $contractor->on('contractors.id','=','tickets.contractor')
                    ->select('contractors.id','contractor.name')
                    ->Where('contractors.name', 'like', '%' . $this->contractor . '%');
        })
        ->Join('otc_categs',function($categ){
            $categ->on('otc_categs.id','=','tickets.categ')
                    ->Where('otc_categs.name', 'like', '%' . $this->categ . '%');
        })
        ->Join('otc_scopes',function($scope){
            $scope->on('otc_scopes.id','=','tickets.scope')
                    ->Where('otc_scopes.name', 'like', '%' . $this->scope . '%');
        })
        ->Join('otc_tt_statuss',function($status){
            $status->on('otc_tt_statuss.id','=','tickets.status')
                    ->Where('otc_tt_statuss.name', 'like', '%' . $this->status . '%');
        })
        ->select('tickets.id As Seq','tickets.tt_number As TT#','sites.site_id As Site ID','otc_categs.name As Category','otc_alarms.name As Alarm Name','otc_alarms.sla As Alarm Sla','tickets.description',
        'users.name as Created by'

        ,'contractors.name As Contractor',
        'otc_scopes.name As Scope',
        'otc_tt_statuss.name As Status',
        'tickets.notes As Notes'
        )
        // ,'sites.id as site__id','sites.site_id As site_name','users.id as user_id','users.name as user_name'
         ->where(function ($query) {
            $query->where('tt_number', 'like', '%' . $this->	tt_number . '%')
                  ->orWhere('tt_number', null);
        })
         ->where(function ($query) {
            $query->where('description', 'like', '%' . $this->	description . '%')
                  ->orWhere('description', null);
        })


        ->Where('tickets.deleted_at', null)
        ->orderByDesc('tickets.id')
        ->get();
// dd($this->exportTT);
        return Excel::download(new TicketExport($this->exportTT), 'Tickets.xlsx');
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

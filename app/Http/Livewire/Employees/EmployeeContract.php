<?php

namespace App\Http\Livewire\Employees;

use App\Exports\EmployeeExport;
use DB;
use Excel;
use Livewire\Component;

class EmployeeContract extends Component
{


    public $perPage = 10;
    public $civil_id;
    public $email;
    public $first_name;
    public $phone;
    public $hr_code;
    public $contract_confirmed;
    public $your_file;
    public $imported;
    protected  $employees;
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
        $this->employees = array();
    }
    public function render()
    {
        $this->employees=DB::table('employees')

        ->select('id','civil_id','email','first_name','phone','hr_code','contract_confirmed')
        // ,'sites.id as site__id','sites.site_id As site_name','users.id as user_id','users.name as user_name'
         ->where(function ($query) {
            $query->where('civil_id', 'like', '%' . $this->	civil_id . '%')
                  ->orWhere('civil_id', null);
        })
         ->where(function ($query) {
            $query->where('first_name', 'like', '%' . $this->	first_name . '%')
                  ->orWhere('first_name', null);
        })
         ->where(function ($query) {
            $query->where('email', 'like', '%' . $this->	email . '%')
                  ->orWhere('email', null);
        })
         ->where(function ($query) {
            $query->where('phone', 'like', '%' . $this->	phone . '%')
                  ->orWhere('phone', null);
        })
         ->where(function ($query) {
            $query->where('hr_code', 'like', '%' . $this->	hr_code . '%')
                  ->orWhere('hr_code', null);
        })
        ->where(function ($query) {
            $query->where('contract_confirmed', 'like', '%' . $this->	contract_confirmed . '%')
                  ->orWhere('contract_confirmed', null);
        })

        ->Where('employees.deleted_at', null)
        ->orderByDesc('employees.id')
        ->paginate($this->perPage);
            // dd($this->employees);
            // $this->exportTT = $employees;

        return view('livewire.employees.employee-contract', ['employees' => $this->employees]);
    }

    ########## Export Wilayat to Excel ###############
    public function export()
    {
        $this->exportTT=DB::table('employees')

        ->select('id','civil_id','email','first_name','phone','hr_code','contract_confirmed')
        // ,'sites.id as site__id','sites.site_id As site_name','users.id as user_id','users.name as user_name'
         ->where(function ($query) {
            $query->where('civil_id', 'like', '%' . $this->	civil_id . '%')
                  ->orWhere('civil_id', null);
        })
         ->where(function ($query) {
            $query->where('first_name', 'like', '%' . $this->	first_name . '%')
                  ->orWhere('first_name', null);
        })
         ->where(function ($query) {
            $query->where('email', 'like', '%' . $this->	email . '%')
                  ->orWhere('email', null);
        })
         ->where(function ($query) {
            $query->where('phone', 'like', '%' . $this->	phone . '%')
                  ->orWhere('phone', null);
        })
         ->where(function ($query) {
            $query->where('hr_code', 'like', '%' . $this->	hr_code . '%')
                  ->orWhere('hr_code', null);
        })
        ->where(function ($query) {
            $query->where('contract_confirmed', 'like', '%' . $this->	contract_confirmed . '%')
                  ->orWhere('contract_confirmed', null);
        })

        ->Where('employees.deleted_at', null)
        ->orderByDesc('employees.id')
        ->get();
// dd($this->exportTT);
        return Excel::download(new EmployeeExport($this->exportTT), 'Employees.xlsx');
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

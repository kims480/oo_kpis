<?php

namespace App\Http\Livewire\Employees;

use App\Models\Employee;
use DB;
use Illuminate\Support\Collection;
use Livewire\Component;

class ContractConfirmation extends Component
{
    public $search=null;
    public $contract_confirmed=null;
    public $civil_id=null;
    public $employee_id=null;

    public function render()
    {
        $employee=$employee=$this->setEmptyEmployee()->all();

        if($this->civil_id){

            $employees=Employee::select('id','civil_id','hr_code','email','first_name','phone','contract_confirmed')
                ->where(function ($query) {
                    $query->where('civil_id', $this->civil_id );

                })
                ->Where('employees.deleted_at', null)
                ->limit(1)->get();
            if($employees->count()>0){
                $employee=$employees;
            }
        }
        $this->employee_id=$employee[0]['id'];
        return view('livewire.employees.contract-confirmation',['employee' =>$employee]);
    }


    public function getCivilId(){
        $this->civil_id=$this->search;
    }
    public function setEmptyEmployee(){
        return new Collection(
            [
             0=>[
                'id'=>null,
             'civil_id'=>null,
             'hr_code'=>null,
             'first_name'=>null,
             'email'=>null,
             'phone'=>null,
             'contract_confirmed'=>null
             ]
            ]
         );
    }
    public function storeContractConfirmed()
    {
        // dd($this->data);
        $this->validate([
            // 'selectedSnag_id' => 'required',
            'contract_confirmed' => 'required',
            'civil_id' => 'required',
        ]);
        // dd($this->employee_id);
        $employee = Employee::find($this->employee_id);
        $employee->contract_confirmed=$this->contract_confirmed;
        $employee->save();

        $this->close();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Contract Updated successfully',
            'text' => '',
        ]);

    }

    function close(){
        $this->contract_confirmed = null;
        $this->search = null;
        $this->civil_id = null;

    }
}

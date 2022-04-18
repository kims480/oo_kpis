<?php

namespace App\Http\Livewire;

use App\Exports\OfficesExport;
use App\Exports\SitesExport;
use App\Exports\UsersExport;
use App\Models\Office;
use App\Repositories\OfficeRepository;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithPagination;
class OfficesWire extends Component
{
    use WithPagination;
    // public $offices;
    public $search = '';


    public function mount(OfficeRepository $officeRepository)
    {
        // $this->offices=$officeRepository;
    }

    public function render()
    {
        $offices =Office::paginate(10);
        return view('livewire.offices-wire',['offices'=>$offices]);
    }
    public function export()
    {
        return Excel::download(new OfficesExport, 'Offices.xlsx');
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
}

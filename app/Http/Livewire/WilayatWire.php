<?php

namespace App\Http\Livewire;

use App\Exports\WilayatsExport;
use App\Imports\WilayatsImport;
use App\Models\Govern;
use App\Models\Wilayat;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class WilayatWire extends Component
{
    use WithPagination;

    public $showModal = false;
    public $wilayatId;
    public $governs;
    public $name, $govern_id;
    public $wilayah;
    public $searchGovern = '';
    public $searchWilayat = '';
    public function rules(): array
    {
        return [
            'name' => 'required|min:3',
            'govern_id' => 'required'
        ];
    }

    protected $listeners = ['delete'];
    // 'govern_id' => 'required',
    // 'name' => 'required',
    // 'title' => 'required|max:100'
    // 'product.price' => 'required|numeric',

    public function render()
    {
        $wilayatsList =  Govern::rightJoin('wilayats', function ($join) {
            $join->on('governs.id', '=', 'wilayats.govern_id')
                ->where('wilayats.name', 'like', '%' . $this->searchWilayat . '%');
        })
            ->select('governs.id as governs_id', 'governs.name as govern_name', 'wilayats.id', 'wilayats.name as wilayat_name')
            ->where('governs.name', 'like', '%' . $this->searchGovern . '%')
            ->paginate(10);
        //     ->select('governs.*', 'wilayats.id as Wilayat_id', 'wilayats.name as Wilayat_Name');
        // return $wilayts;
        // search($this->searchWilayat)->with(['govern' => function ($q) {
        //     $q->where('name', 'like', '%' . $this->searchGovern . '%') ;
        // }])->paginate(10);
        $this->governs = Govern::orderBy('name')->pluck('name', 'id');

        // dd( $wilayatsList);
        return view('wilayats.wilayat-wire', ['wilayatsList' => $wilayatsList]);
    }

    ########## Export Wilayat to Excel ###############
    public function export()
    {
        return Excel::download(new WilayatsExport, 'wilayats.xlsx');
    }


    ########## Import Wilayat from Excel ###############
    public function import()
    {
        Excel::import(new WilayatsImport, request()->file('your_file'));

        return redirect('/')->with('success', 'All good!');
    }
    public function updatingSearch()
    {
        // $this->resetPage();
    }

    # Real-time Validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    ########## Close Model ###############
    public function close()
    {
        $this->showModal = false;
        // $this->governs=;
        $this->wilayah = null;
        $this->wilayatId = null;
        $this->name = null;
        $this->govern_id = null;
        $this->message=null;
    }

    ########## EDIT Wilayat ###############
    public function edit($wilayatId)
    {
        $this->showModal = true;
        $this->wilayatId = $wilayatId;
        $this->wilayah = Wilayat::findOrFail($this->wilayatId);
        $this->name = $this->wilayah->name;
        $this->govern_id = $this->wilayah->govern_id;

    }

    ########## CREATE New Wilayat ###############
    public function create()
    {
        $this->showModal = true;
        // $this->governs=Govern::orderBy('name')->pluck('name','id');
        // $this->wilayah = null;
        $this->wilayatId = null;
    }

    ########## STORE New/Existing Wilayat ###############
    public function save()
    {
        // try {
            $this->validate($this->rules());

            if (is_null($this->wilayah)) {
                Wilayat::create([
                    'name'=>$this->name,
                    'govern_id'=>$this->govern_id]);
                    $this->close();
                    $this->dispatchBrowserEvent('swal:modal', [
                        'type' => 'success',
                        'title' => 'Record added successfully',
                        'text' => '',
                    ]);
            } else {
                $this->wilayah->update(
                    [
                        'name'=>$this->name,
                        'govern_id'=>$this->govern_id]
                    );
                    $this->close();
                $this->dispatchBrowserEvent('swal:modal', [
                    'type' => 'success',
                    'title' => 'Record Updated successfully',
                    'text' => '',
                ]);
            }

        // } catch (\Illuminate\Validation\ValidationException $e) {
            // ...

            // Once you're done, re-throw the exception
            // throw $e;
        // }
    }

    ########## Confirm before deleting Wilayat ###############
    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' => '',
            'id' => $id,
        ]);
    }
    public function toast($id)
    {
        $this->dispatchBrowserEvent('toast', [
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' => '',
            'id' => $id,
        ]);
    }

    ########## DELETE Wilayat ###############
    public function delete($id)
    {

        $wilayah = Wilayat::find($id);
        if ($wilayah) {
            $wilayah->delete();
        }
        // Post::where('id', $id)->delete();
    }
}

<?php

namespace App\Http\Controllers;

// use App\Http\Requests\SnagUploadRequest;

use App\Http\Livewire\MainSubCateg;
use App\Http\Requests\UpdateFileUploadRequest;
use App\Imports\SnagsImport;
use App\Models\MainCateg;
use App\Models\Site;
use App\Models\Snag;
use App\Models\SubCateg;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
// use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Storage;
use Laracasts\Flash\Flash;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;

class SnagsController extends Controller
{
    public $snagsList;
    // public MainSubCateg $MainSubCateg;
    protected $path='snags';

    public function __construct() {
        $this->snagsList = collect();
        // $this->MainSubCateg= MainSubCateg()->ddd();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->snagsList=Snag::with('sub_categ.main_categ')->get();
        return view('snags.index',['snagslist'=>$this->snagsList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sub_categ=SubCateg::select('id','name')->get();
        $main_categ=MainCateg::select('id','name')->get();
        return view('snags.create',['sub_categ'=>$sub_categ,'main_categ'=>$main_categ]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $this->allsnags=collect();
        if ($request->hasFile('snaglist')) {
            // $file_name = $request->snaglist->getClientOriginalName();;
            // dd($request->snaglist);
            $file_extension = $request->snaglist->getClientOriginalExtension();
            $file_name = explode('.',$request->snaglist->getClientOriginalName())[0].'_'.$request->user()->name.'_'.time().'.'.$file_extension;
            $upload1 = $request->snaglist->move($this->path,$file_name);
            // $upload2=Storage::putFileAs('snags', $request->snaglist,$file_name);
            // Excel::import(new SnagsImport, $file_name, 'snags');

            $this->snagsList=Excel::toCollection(new SnagsImport, $file_name, 'snags')->flatten(1)->take(100);//->groupBy('siteid');
             //keyBy('siteid')->
            $this->snagsList->map(function($q){

                unset($q->feedback);
                return $q;
            });
            // $this->snagsList= $this->snagsList->each(function($q){
            //     return $q->only(['siteid','snags']);
            // });


            // $headings = (new HeadingRowImport)->toArray($file_name, 'snags');
             // dd($snagsList);
             // return redirect(route('snags-managing.index'));
             //->with('snagslist',$this->allsnags[0]);'
             if($this->snagsList){
                // $this->MainSubCateg->dispatchBrowserEvent('swal:modal', [
                //     'type' => 'success',
                //     'title' => 'File Uploaded successfully',
                //     'text' => '',
                // ]);

                Flash::success('File Uploaded successfully.');

                // return redirect()->route('imports.index');
                return view('snags.index',['snagslist'=>$this->snagsList,'filter'=>""]);
            }

        }


        // dd([$file_name,$file_extension,$this->myFile->originalName]);
        //echo asset('storage/file.txt');
        // Storage::disk('local')->put($this->path, $request->snaglist);
        // if ($path) {
            Flash::error('File not valid');
            // return redirect(route('snags-managing.index'));

        // }

        // return false;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function snagsList(Collection $snagslist  )
    {

        return $this->snagsList=$snagslist;
    }

    public function getSiteSnags()
    {

        // return Site::with(['snag_mangs','site_snags'])->whereHas('snag_mangs')->get();
        // return SiteSnag::leftJoin('snag_mangs', function($join) {
        //     $join->on('site_snags.snag_mangs', '=', 'snag_mangs.id');
        //   })
        //   ->whereNotNull('site_snags.snag_mangs')
        //   ->get();
    }
    public function export()
    {

    }
}

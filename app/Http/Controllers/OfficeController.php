<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOfficeRequest;
use App\Http\Requests\UpdateOfficeRequest;
use App\Repositories\OfficeRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Region;
use Illuminate\Http\Request;
use Flash;
use Response;

class OfficeController extends AppBaseController
{
    /** @var  OfficeRepository */
    private $officeRepository;

    public function __construct(OfficeRepository $officeRepo)
    {
        $this->officeRepository = $officeRepo;
    }

    /**
     * Display a listing of the Office.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $offices = $this->officeRepository->paginate(10);

        // return $offices;
        return view('offices.index')
            ->with('offices', $offices);
    }

    /**
     * Show the form for creating a new Office.
     *
     * @return Response
     */
    public function create()
    {
        $regions= Region::select('id','name')->pluck('name','id');
        return view('offices.create')->with('regions',$regions);
    }

    /**
     * Store a newly created Office in storage.
     *
     * @param CreateOfficeRequest $request
     *
     * @return Response
     */
    public function store(CreateOfficeRequest $request)
    {
        $input = $request->all();

        $office = $this->officeRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/offices.singular')]));

        return redirect(route('offices.index'));
    }

    /**
     * Display the specified Office.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $office = $this->officeRepository->find($id);

        if (empty($office)) {
            Flash::error(__('messages.not_found', ['model' => __('models/offices.singular')]));

            return redirect(route('offices.index'));
        }

        return view('offices.show')->with('office', $office);
    }

    /**
     * Show the form for editing the specified Office.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $office = $this->officeRepository->find($id);
        $regions= Region::select('id','name')->pluck('name','id');
        if (empty($office)) {
            Flash::error(__('messages.not_found', ['model' => __('models/offices.singular')]));

            return redirect(route('offices.index'));
        }

        return view('offices.edit',['office'=> $office,'regions'=>$regions]);
    }

    /**
     * Update the specified Office in storage.
     *
     * @param int $id
     * @param UpdateOfficeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOfficeRequest $request)
    {
        $office = $this->officeRepository->find($id);

        if (empty($office)) {
            Flash::error(__('messages.not_found', ['model' => __('models/offices.singular')]));

            return redirect(route('offices.index'));
        }

        $office = $this->officeRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/offices.singular')]));

        return redirect(route('offices.index'));
    }

    /**
     * Remove the specified Office from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $office = $this->officeRepository->find($id);

        if (empty($office)) {
            Flash::error(__('messages.not_found', ['model' => __('models/offices.singular')]));

            return redirect(route('offices.index'));
        }

        $this->officeRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/offices.singular')]));

        return redirect(route('offices.index'));
    }
}

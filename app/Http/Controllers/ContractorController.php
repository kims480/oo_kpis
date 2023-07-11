<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContractorRequest;
use App\Http\Requests\UpdateContractorRequest;
use App\Repositories\ContractorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ContractorController extends AppBaseController
{
    /** @var ContractorRepository $contractorRepository*/
    private $contractorRepository;

    public function __construct(ContractorRepository $contractorRepo)
    {
        $this->contractorRepository = $contractorRepo;
    }

    /**
     * Display a listing of the Contractor.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $contractors = $this->contractorRepository->paginate(10);

        return view('contractors.index')
            ->with('contractors', $contractors);
    }

    /**
     * Show the form for creating a new Contractor.
     *
     * @return Response
     */
    public function create()
    {
        return view('contractors.create');
    }

    /**
     * Store a newly created Contractor in storage.
     *
     * @param CreateContractorRequest $request
     *
     * @return Response
     */
    public function store(CreateContractorRequest $request)
    {
        $input = $request->all();

        $contractor = $this->contractorRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/contractors.singular')]));

        return redirect(route('contractors.index'));
    }

    /**
     * Display the specified Contractor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contractor = $this->contractorRepository->find($id);

        if (empty($contractor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contractors.singular')]));

            return redirect(route('contractors.index'));
        }

        return view('contractors.show')->with('contractor', $contractor);
    }

    /**
     * Show the form for editing the specified Contractor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contractor = $this->contractorRepository->find($id);

        if (empty($contractor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contractors.singular')]));

            return redirect(route('contractors.index'));
        }

        return view('contractors.edit')->with('contractor', $contractor);
    }

    /**
     * Update the specified Contractor in storage.
     *
     * @param int $id
     * @param UpdateContractorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContractorRequest $request)
    {
        $contractor = $this->contractorRepository->find($id);

        if (empty($contractor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contractors.singular')]));

            return redirect(route('contractors.index'));
        }

        $contractor = $this->contractorRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/contractors.singular')]));

        return redirect(route('contractors.index'));
    }

    /**
     * Remove the specified Contractor from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contractor = $this->contractorRepository->find($id);

        if (empty($contractor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contractors.singular')]));

            return redirect(route('contractors.index'));
        }

        $this->contractorRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/contractors.singular')]));

        return redirect(route('contractors.index'));
    }
}

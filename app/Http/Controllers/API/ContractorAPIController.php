<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateContractorAPIRequest;
use App\Http\Requests\API\UpdateContractorAPIRequest;
use App\Models\Contractor;
use App\Repositories\ContractorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ContractorController
 * @package App\Http\Controllers\API
 */

class ContractorAPIController extends AppBaseController
{
    /** @var  ContractorRepository */
    private $contractorRepository;

    public function __construct(ContractorRepository $contractorRepo)
    {
        $this->contractorRepository = $contractorRepo;
    }

    /**
     * Display a listing of the Contractor.
     * GET|HEAD /contractors
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $contractors = $this->contractorRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $contractors->toArray(),
            __('messages.retrieved', ['model' => __('models/contractors.plural')])
        );
    }

    /**
     * Store a newly created Contractor in storage.
     * POST /contractors
     *
     * @param CreateContractorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateContractorAPIRequest $request)
    {
        $input = $request->all();

        $contractor = $this->contractorRepository->create($input);

        return $this->sendResponse(
            $contractor->toArray(),
            __('messages.saved', ['model' => __('models/contractors.singular')])
        );
    }

    /**
     * Display the specified Contractor.
     * GET|HEAD /contractors/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Contractor $contractor */
        $contractor = $this->contractorRepository->find($id);

        if (empty($contractor)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/contractors.singular')])
            );
        }

        return $this->sendResponse(
            $contractor->toArray(),
            __('messages.retrieved', ['model' => __('models/contractors.singular')])
        );
    }

    /**
     * Update the specified Contractor in storage.
     * PUT/PATCH /contractors/{id}
     *
     * @param int $id
     * @param UpdateContractorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContractorAPIRequest $request)
    {
        $input = $request->all();

        /** @var Contractor $contractor */
        $contractor = $this->contractorRepository->find($id);

        if (empty($contractor)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/contractors.singular')])
            );
        }

        $contractor = $this->contractorRepository->update($input, $id);

        return $this->sendResponse(
            $contractor->toArray(),
            __('messages.updated', ['model' => __('models/contractors.singular')])
        );
    }

    /**
     * Remove the specified Contractor from storage.
     * DELETE /contractors/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Contractor $contractor */
        $contractor = $this->contractorRepository->find($id);

        if (empty($contractor)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/contractors.singular')])
            );
        }

        $contractor->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/contractors.singular')])
        );
    }
}

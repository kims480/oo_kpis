<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSnagstatusAPIRequest;
use App\Http\Requests\API\UpdateSnagstatusAPIRequest;
use App\Models\Snagstatus;
use App\Repositories\SnagstatusRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SnagstatusController
 * @package App\Http\Controllers\API
 */

class SnagstatusAPIController extends AppBaseController
{
    /** @var  SnagstatusRepository */
    private $snagstatusRepository;

    public function __construct(SnagstatusRepository $snagstatusRepo)
    {
        $this->snagstatusRepository = $snagstatusRepo;
    }

    /**
     * Display a listing of the Snagstatus.
     * GET|HEAD /snagstatuses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $snagstatuses = $this->snagstatusRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $snagstatuses->toArray(),
            __('messages.retrieved', ['model' => __('models/snagstatuses.plural')])
        );
    }

    /**
     * Store a newly created Snagstatus in storage.
     * POST /snagstatuses
     *
     * @param CreateSnagstatusAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSnagstatusAPIRequest $request)
    {
        $input = $request->all();

        $snagstatus = $this->snagstatusRepository->create($input);

        return $this->sendResponse(
            $snagstatus->toArray(),
            __('messages.saved', ['model' => __('models/snagstatuses.singular')])
        );
    }

    /**
     * Display the specified Snagstatus.
     * GET|HEAD /snagstatuses/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Snagstatus $snagstatus */
        $snagstatus = $this->snagstatusRepository->find($id);

        if (empty($snagstatus)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/snagstatuses.singular')])
            );
        }

        return $this->sendResponse(
            $snagstatus->toArray(),
            __('messages.retrieved', ['model' => __('models/snagstatuses.singular')])
        );
    }

    /**
     * Update the specified Snagstatus in storage.
     * PUT/PATCH /snagstatuses/{id}
     *
     * @param int $id
     * @param UpdateSnagstatusAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSnagstatusAPIRequest $request)
    {
        $input = $request->all();

        /** @var Snagstatus $snagstatus */
        $snagstatus = $this->snagstatusRepository->find($id);

        if (empty($snagstatus)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/snagstatuses.singular')])
            );
        }

        $snagstatus = $this->snagstatusRepository->update($input, $id);

        return $this->sendResponse(
            $snagstatus->toArray(),
            __('messages.updated', ['model' => __('models/snagstatuses.singular')])
        );
    }

    /**
     * Remove the specified Snagstatus from storage.
     * DELETE /snagstatuses/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Snagstatus $snagstatus */
        $snagstatus = $this->snagstatusRepository->find($id);

        if (empty($snagstatus)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/snagstatuses.singular')])
            );
        }

        $snagstatus->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/snagstatuses.singular')])
        );
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTTStatusAPIRequest;
use App\Http\Requests\API\UpdateTTStatusAPIRequest;
use App\Models\TTStatus;
use App\Repositories\TTStatusRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TTStatusController
 * @package App\Http\Controllers\API
 */

class TTStatusAPIController extends AppBaseController
{
    /** @var  TTStatusRepository */
    private $tTStatusRepository;

    public function __construct(TTStatusRepository $tTStatusRepo)
    {
        $this->tTStatusRepository = $tTStatusRepo;
    }

    /**
     * Display a listing of the TTStatus.
     * GET|HEAD /tTStatuses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tTStatuses = $this->tTStatusRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $tTStatuses->toArray(),
            __('messages.retrieved', ['model' => __('models/tTStatuses.plural')])
        );
    }

    /**
     * Store a newly created TTStatus in storage.
     * POST /tTStatuses
     *
     * @param CreateTTStatusAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTTStatusAPIRequest $request)
    {
        $input = $request->all();

        $tTStatus = $this->tTStatusRepository->create($input);

        return $this->sendResponse(
            $tTStatus->toArray(),
            __('messages.saved', ['model' => __('models/tTStatuses.singular')])
        );
    }

    /**
     * Display the specified TTStatus.
     * GET|HEAD /tTStatuses/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TTStatus $tTStatus */
        $tTStatus = $this->tTStatusRepository->find($id);

        if (empty($tTStatus)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/tTStatuses.singular')])
            );
        }

        return $this->sendResponse(
            $tTStatus->toArray(),
            __('messages.retrieved', ['model' => __('models/tTStatuses.singular')])
        );
    }

    /**
     * Update the specified TTStatus in storage.
     * PUT/PATCH /tTStatuses/{id}
     *
     * @param int $id
     * @param UpdateTTStatusAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTTStatusAPIRequest $request)
    {
        $input = $request->all();

        /** @var TTStatus $tTStatus */
        $tTStatus = $this->tTStatusRepository->find($id);

        if (empty($tTStatus)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/tTStatuses.singular')])
            );
        }

        $tTStatus = $this->tTStatusRepository->update($input, $id);

        return $this->sendResponse(
            $tTStatus->toArray(),
            __('messages.updated', ['model' => __('models/tTStatuses.singular')])
        );
    }

    /**
     * Remove the specified TTStatus from storage.
     * DELETE /tTStatuses/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TTStatus $tTStatus */
        $tTStatus = $this->tTStatusRepository->find($id);

        if (empty($tTStatus)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/tTStatuses.singular')])
            );
        }

        $tTStatus->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/tTStatuses.singular')])
        );
    }
}

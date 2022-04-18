<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSnagreporterAPIRequest;
use App\Http\Requests\API\UpdateSnagreporterAPIRequest;
use App\Models\Snagreporter;
use App\Repositories\SnagreporterRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SnagreporterController
 * @package App\Http\Controllers\API
 */

class SnagreporterAPIController extends AppBaseController
{
    /** @var  SnagreporterRepository */
    private $snagreporterRepository;

    public function __construct(SnagreporterRepository $snagreporterRepo)
    {
        $this->snagreporterRepository = $snagreporterRepo;
    }

    /**
     * Display a listing of the Snagreporter.
     * GET|HEAD /snagreporters
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $snagreporters = $this->snagreporterRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $snagreporters->toArray(),
            __('messages.retrieved', ['model' => __('models/snagreporters.plural')])
        );
    }

    /**
     * Store a newly created Snagreporter in storage.
     * POST /snagreporters
     *
     * @param CreateSnagreporterAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSnagreporterAPIRequest $request)
    {
        $input = $request->all();

        $snagreporter = $this->snagreporterRepository->create($input);

        return $this->sendResponse(
            $snagreporter->toArray(),
            __('messages.saved', ['model' => __('models/snagreporters.singular')])
        );
    }

    /**
     * Display the specified Snagreporter.
     * GET|HEAD /snagreporters/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Snagreporter $snagreporter */
        $snagreporter = $this->snagreporterRepository->find($id);

        if (empty($snagreporter)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/snagreporters.singular')])
            );
        }

        return $this->sendResponse(
            $snagreporter->toArray(),
            __('messages.retrieved', ['model' => __('models/snagreporters.singular')])
        );
    }

    /**
     * Update the specified Snagreporter in storage.
     * PUT/PATCH /snagreporters/{id}
     *
     * @param int $id
     * @param UpdateSnagreporterAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSnagreporterAPIRequest $request)
    {
        $input = $request->all();

        /** @var Snagreporter $snagreporter */
        $snagreporter = $this->snagreporterRepository->find($id);

        if (empty($snagreporter)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/snagreporters.singular')])
            );
        }

        $snagreporter = $this->snagreporterRepository->update($input, $id);

        return $this->sendResponse(
            $snagreporter->toArray(),
            __('messages.updated', ['model' => __('models/snagreporters.singular')])
        );
    }

    /**
     * Remove the specified Snagreporter from storage.
     * DELETE /snagreporters/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Snagreporter $snagreporter */
        $snagreporter = $this->snagreporterRepository->find($id);

        if (empty($snagreporter)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/snagreporters.singular')])
            );
        }

        $snagreporter->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/snagreporters.singular')])
        );
    }
}

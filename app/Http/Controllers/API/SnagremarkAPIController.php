<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSnagremarkAPIRequest;
use App\Http\Requests\API\UpdateSnagremarkAPIRequest;
use App\Models\Snagremark;
use App\Repositories\SnagremarkRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SnagremarkController
 * @package App\Http\Controllers\API
 */

class SnagremarkAPIController extends AppBaseController
{
    /** @var  SnagremarkRepository */
    private $snagremarkRepository;

    public function __construct(SnagremarkRepository $snagremarkRepo)
    {
        $this->snagremarkRepository = $snagremarkRepo;
    }

    /**
     * Display a listing of the Snagremark.
     * GET|HEAD /snagremarks
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $snagremarks = $this->snagremarkRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $snagremarks->toArray(),
            __('messages.retrieved', ['model' => __('models/snagremarks.plural')])
        );
    }

    /**
     * Store a newly created Snagremark in storage.
     * POST /snagremarks
     *
     * @param CreateSnagremarkAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSnagremarkAPIRequest $request)
    {
        $input = $request->all();

        $snagremark = $this->snagremarkRepository->create($input);

        return $this->sendResponse(
            $snagremark->toArray(),
            __('messages.saved', ['model' => __('models/snagremarks.singular')])
        );
    }

    /**
     * Display the specified Snagremark.
     * GET|HEAD /snagremarks/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Snagremark $snagremark */
        $snagremark = $this->snagremarkRepository->find($id);

        if (empty($snagremark)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/snagremarks.singular')])
            );
        }

        return $this->sendResponse(
            $snagremark->toArray(),
            __('messages.retrieved', ['model' => __('models/snagremarks.singular')])
        );
    }

    /**
     * Update the specified Snagremark in storage.
     * PUT/PATCH /snagremarks/{id}
     *
     * @param int $id
     * @param UpdateSnagremarkAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSnagremarkAPIRequest $request)
    {
        $input = $request->all();

        /** @var Snagremark $snagremark */
        $snagremark = $this->snagremarkRepository->find($id);

        if (empty($snagremark)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/snagremarks.singular')])
            );
        }

        $snagremark = $this->snagremarkRepository->update($input, $id);

        return $this->sendResponse(
            $snagremark->toArray(),
            __('messages.updated', ['model' => __('models/snagremarks.singular')])
        );
    }

    /**
     * Remove the specified Snagremark from storage.
     * DELETE /snagremarks/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Snagremark $snagremark */
        $snagremark = $this->snagremarkRepository->find($id);

        if (empty($snagremark)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/snagremarks.singular')])
            );
        }

        $snagremark->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/snagremarks.singular')])
        );
    }
}

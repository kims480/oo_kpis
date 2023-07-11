<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOtcCategAPIRequest;
use App\Http\Requests\API\UpdateOtcCategAPIRequest;
use App\Models\OtcCateg;
use App\Repositories\OtcCategRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class OtcCategController
 * @package App\Http\Controllers\API
 */

class OtcCategAPIController extends AppBaseController
{
    /** @var  OtcCategRepository */
    private $otcCategRepository;

    public function __construct(OtcCategRepository $otcCategRepo)
    {
        $this->otcCategRepository = $otcCategRepo;
    }

    /**
     * Display a listing of the OtcCateg.
     * GET|HEAD /otcCategs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $otcCategs = $this->otcCategRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $otcCategs->toArray(),
            __('messages.retrieved', ['model' => __('models/otcCategs.plural')])
        );
    }

    /**
     * Store a newly created OtcCateg in storage.
     * POST /otcCategs
     *
     * @param CreateOtcCategAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOtcCategAPIRequest $request)
    {
        $input = $request->all();

        $otcCateg = $this->otcCategRepository->create($input);

        return $this->sendResponse(
            $otcCateg->toArray(),
            __('messages.saved', ['model' => __('models/otcCategs.singular')])
        );
    }

    /**
     * Display the specified OtcCateg.
     * GET|HEAD /otcCategs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OtcCateg $otcCateg */
        $otcCateg = $this->otcCategRepository->find($id);

        if (empty($otcCateg)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/otcCategs.singular')])
            );
        }

        return $this->sendResponse(
            $otcCateg->toArray(),
            __('messages.retrieved', ['model' => __('models/otcCategs.singular')])
        );
    }

    /**
     * Update the specified OtcCateg in storage.
     * PUT/PATCH /otcCategs/{id}
     *
     * @param int $id
     * @param UpdateOtcCategAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOtcCategAPIRequest $request)
    {
        $input = $request->all();

        /** @var OtcCateg $otcCateg */
        $otcCateg = $this->otcCategRepository->find($id);

        if (empty($otcCateg)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/otcCategs.singular')])
            );
        }

        $otcCateg = $this->otcCategRepository->update($input, $id);

        return $this->sendResponse(
            $otcCateg->toArray(),
            __('messages.updated', ['model' => __('models/otcCategs.singular')])
        );
    }

    /**
     * Remove the specified OtcCateg from storage.
     * DELETE /otcCategs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OtcCateg $otcCateg */
        $otcCateg = $this->otcCategRepository->find($id);

        if (empty($otcCateg)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/otcCategs.singular')])
            );
        }

        $otcCateg->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/otcCategs.singular')])
        );
    }
}

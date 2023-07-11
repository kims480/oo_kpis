<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOtcAlarmsAPIRequest;
use App\Http\Requests\API\UpdateOtcAlarmsAPIRequest;
use App\Models\OtcAlarms;
use App\Repositories\OtcAlarmsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class OtcAlarmsController
 * @package App\Http\Controllers\API
 */

class OtcAlarmsAPIController extends AppBaseController
{
    /** @var  OtcAlarmsRepository */
    private $otcAlarmsRepository;

    public function __construct(OtcAlarmsRepository $otcAlarmsRepo)
    {
        $this->otcAlarmsRepository = $otcAlarmsRepo;
    }

    /**
     * Display a listing of the OtcAlarms.
     * GET|HEAD /otcAlarms
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $otcAlarms = $this->otcAlarmsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $otcAlarms->toArray(),
            __('messages.retrieved', ['model' => __('models/otcAlarms.plural')])
        );
    }

    /**
     * Store a newly created OtcAlarms in storage.
     * POST /otcAlarms
     *
     * @param CreateOtcAlarmsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOtcAlarmsAPIRequest $request)
    {
        $input = $request->all();

        $otcAlarms = $this->otcAlarmsRepository->create($input);

        return $this->sendResponse(
            $otcAlarms->toArray(),
            __('messages.saved', ['model' => __('models/otcAlarms.singular')])
        );
    }

    /**
     * Display the specified OtcAlarms.
     * GET|HEAD /otcAlarms/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OtcAlarms $otcAlarms */
        $otcAlarms = $this->otcAlarmsRepository->find($id);

        if (empty($otcAlarms)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/otcAlarms.singular')])
            );
        }

        return $this->sendResponse(
            $otcAlarms->toArray(),
            __('messages.retrieved', ['model' => __('models/otcAlarms.singular')])
        );
    }

    /**
     * Update the specified OtcAlarms in storage.
     * PUT/PATCH /otcAlarms/{id}
     *
     * @param int $id
     * @param UpdateOtcAlarmsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOtcAlarmsAPIRequest $request)
    {
        $input = $request->all();

        /** @var OtcAlarms $otcAlarms */
        $otcAlarms = $this->otcAlarmsRepository->find($id);

        if (empty($otcAlarms)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/otcAlarms.singular')])
            );
        }

        $otcAlarms = $this->otcAlarmsRepository->update($input, $id);

        return $this->sendResponse(
            $otcAlarms->toArray(),
            __('messages.updated', ['model' => __('models/otcAlarms.singular')])
        );
    }

    /**
     * Remove the specified OtcAlarms from storage.
     * DELETE /otcAlarms/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OtcAlarms $otcAlarms */
        $otcAlarms = $this->otcAlarmsRepository->find($id);

        if (empty($otcAlarms)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/otcAlarms.singular')])
            );
        }

        $otcAlarms->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/otcAlarms.singular')])
        );
    }
}

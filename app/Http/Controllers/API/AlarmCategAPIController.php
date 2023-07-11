<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAlarmCategAPIRequest;
use App\Http\Requests\API\UpdateAlarmCategAPIRequest;
use App\Models\AlarmCateg;
use App\Repositories\AlarmCategRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AlarmCategController
 * @package App\Http\Controllers\API
 */

class AlarmCategAPIController extends AppBaseController
{
    /** @var  AlarmCategRepository */
    private $alarmCategRepository;

    public function __construct(AlarmCategRepository $alarmCategRepo)
    {
        $this->alarmCategRepository = $alarmCategRepo;
    }

    /**
     * Display a listing of the AlarmCateg.
     * GET|HEAD /alarmCategs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $alarmCategs = $this->alarmCategRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $alarmCategs->toArray(),
            __('messages.retrieved', ['model' => __('models/alarmCategs.plural')])
        );
    }

    /**
     * Store a newly created AlarmCateg in storage.
     * POST /alarmCategs
     *
     * @param CreateAlarmCategAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAlarmCategAPIRequest $request)
    {
        $input = $request->all();

        $alarmCateg = $this->alarmCategRepository->create($input);

        return $this->sendResponse(
            $alarmCateg->toArray(),
            __('messages.saved', ['model' => __('models/alarmCategs.singular')])
        );
    }

    /**
     * Display the specified AlarmCateg.
     * GET|HEAD /alarmCategs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AlarmCateg $alarmCateg */
        $alarmCateg = $this->alarmCategRepository->find($id);

        if (empty($alarmCateg)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/alarmCategs.singular')])
            );
        }

        return $this->sendResponse(
            $alarmCateg->toArray(),
            __('messages.retrieved', ['model' => __('models/alarmCategs.singular')])
        );
    }

    /**
     * Update the specified AlarmCateg in storage.
     * PUT/PATCH /alarmCategs/{id}
     *
     * @param int $id
     * @param UpdateAlarmCategAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAlarmCategAPIRequest $request)
    {
        $input = $request->all();

        /** @var AlarmCateg $alarmCateg */
        $alarmCateg = $this->alarmCategRepository->find($id);

        if (empty($alarmCateg)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/alarmCategs.singular')])
            );
        }

        $alarmCateg = $this->alarmCategRepository->update($input, $id);

        return $this->sendResponse(
            $alarmCateg->toArray(),
            __('messages.updated', ['model' => __('models/alarmCategs.singular')])
        );
    }

    /**
     * Remove the specified AlarmCateg from storage.
     * DELETE /alarmCategs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AlarmCateg $alarmCateg */
        $alarmCateg = $this->alarmCategRepository->find($id);

        if (empty($alarmCateg)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/alarmCategs.singular')])
            );
        }

        $alarmCateg->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/alarmCategs.singular')])
        );
    }
}

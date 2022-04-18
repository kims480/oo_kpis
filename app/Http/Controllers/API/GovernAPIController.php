<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateGovernAPIRequest;
use App\Http\Requests\API\UpdateGovernAPIRequest;
use App\Models\Govern;
use App\Repositories\GovernRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class GovernController
 * @package App\Http\Controllers\API
 */

class GovernAPIController extends AppBaseController
{
    /** @var  GovernRepository */
    private $governRepository;

    public function __construct(GovernRepository $governRepo)
    {
        $this->governRepository = $governRepo;
    }

    /**
     * Display a listing of the Govern.
     * GET|HEAD /governs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $governs = $this->governRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $governs->toArray(),
            __('messages.retrieved', ['model' => __('models/governs.plural')])
        );
    }

    /**
     * Store a newly created Govern in storage.
     * POST /governs
     *
     * @param CreateGovernAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateGovernAPIRequest $request)
    {
        $input = $request->all();

        $govern = $this->governRepository->create($input);

        return $this->sendResponse(
            $govern->toArray(),
            __('messages.saved', ['model' => __('models/governs.singular')])
        );
    }

    /**
     * Display the specified Govern.
     * GET|HEAD /governs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Govern $govern */
        $govern = $this->governRepository->find($id);

        if (empty($govern)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/governs.singular')])
            );
        }

        return $this->sendResponse(
            $govern->toArray(),
            __('messages.retrieved', ['model' => __('models/governs.singular')])
        );
    }

    /**
     * Update the specified Govern in storage.
     * PUT/PATCH /governs/{id}
     *
     * @param int $id
     * @param UpdateGovernAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGovernAPIRequest $request)
    {
        $input = $request->all();

        /** @var Govern $govern */
        $govern = $this->governRepository->find($id);

        if (empty($govern)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/governs.singular')])
            );
        }

        $govern = $this->governRepository->update($input, $id);

        return $this->sendResponse(
            $govern->toArray(),
            __('messages.updated', ['model' => __('models/governs.singular')])
        );
    }

    /**
     * Remove the specified Govern from storage.
     * DELETE /governs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Govern $govern */
        $govern = $this->governRepository->find($id);

        if (empty($govern)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/governs.singular')])
            );
        }

        $govern->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/governs.singular')])
        );
    }
}

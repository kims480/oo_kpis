<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateGovernControllerAPIRequest;
use App\Http\Requests\API\UpdateGovernControllerAPIRequest;
use App\Models\GovernController;
use App\Repositories\GovernControllerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class GovernControllerController
 * @package App\Http\Controllers\API
 */

class GovernControllerAPIController extends AppBaseController
{
    /** @var  GovernControllerRepository */
    private $governControllerRepository;

    public function __construct(GovernControllerRepository $governControllerRepo)
    {
        $this->governControllerRepository = $governControllerRepo;
    }

    /**
     * Display a listing of the GovernController.
     * GET|HEAD /governControllers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $governControllers = $this->governControllerRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $governControllers->toArray(),
            __('messages.retrieved', ['model' => __('models/governControllers.plural')])
        );
    }

    /**
     * Store a newly created GovernController in storage.
     * POST /governControllers
     *
     * @param CreateGovernControllerAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateGovernControllerAPIRequest $request)
    {
        $input = $request->all();

        $governController = $this->governControllerRepository->create($input);

        return $this->sendResponse(
            $governController->toArray(),
            __('messages.saved', ['model' => __('models/governControllers.singular')])
        );
    }

    /**
     * Display the specified GovernController.
     * GET|HEAD /governControllers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var GovernController $governController */
        $governController = $this->governControllerRepository->find($id);

        if (empty($governController)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/governControllers.singular')])
            );
        }

        return $this->sendResponse(
            $governController->toArray(),
            __('messages.retrieved', ['model' => __('models/governControllers.singular')])
        );
    }

    /**
     * Update the specified GovernController in storage.
     * PUT/PATCH /governControllers/{id}
     *
     * @param int $id
     * @param UpdateGovernControllerAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGovernControllerAPIRequest $request)
    {
        $input = $request->all();

        /** @var GovernController $governController */
        $governController = $this->governControllerRepository->find($id);

        if (empty($governController)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/governControllers.singular')])
            );
        }

        $governController = $this->governControllerRepository->update($input, $id);

        return $this->sendResponse(
            $governController->toArray(),
            __('messages.updated', ['model' => __('models/governControllers.singular')])
        );
    }

    /**
     * Remove the specified GovernController from storage.
     * DELETE /governControllers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var GovernController $governController */
        $governController = $this->governControllerRepository->find($id);

        if (empty($governController)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/governControllers.singular')])
            );
        }

        $governController->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/governControllers.singular')])
        );
    }
}

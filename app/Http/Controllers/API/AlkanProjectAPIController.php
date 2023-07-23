<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAlkanProjectAPIRequest;
use App\Http\Requests\API\UpdateAlkanProjectAPIRequest;
use App\Models\AlkanProject;
use App\Repositories\AlkanProjectRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AlkanProjectController
 * @package App\Http\Controllers\API
 */

class AlkanProjectAPIController extends AppBaseController
{
    /** @var  AlkanProjectRepository */
    private $alkanProjectRepository;

    public function __construct(AlkanProjectRepository $alkanProjectRepo)
    {
        $this->alkanProjectRepository = $alkanProjectRepo;
    }

    /**
     * Display a listing of the AlkanProject.
     * GET|HEAD /alkanProjects
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $alkanProjects = $this->alkanProjectRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $alkanProjects->toArray(),
            __('messages.retrieved', ['model' => __('models/alkanProjects.plural')])
        );
    }

    /**
     * Store a newly created AlkanProject in storage.
     * POST /alkanProjects
     *
     * @param CreateAlkanProjectAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAlkanProjectAPIRequest $request)
    {
        $input = $request->all();

        $alkanProject = $this->alkanProjectRepository->create($input);

        return $this->sendResponse(
            $alkanProject->toArray(),
            __('messages.saved', ['model' => __('models/alkanProjects.singular')])
        );
    }

    /**
     * Display the specified AlkanProject.
     * GET|HEAD /alkanProjects/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AlkanProject $alkanProject */
        $alkanProject = $this->alkanProjectRepository->find($id);

        if (empty($alkanProject)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/alkanProjects.singular')])
            );
        }

        return $this->sendResponse(
            $alkanProject->toArray(),
            __('messages.retrieved', ['model' => __('models/alkanProjects.singular')])
        );
    }

    /**
     * Update the specified AlkanProject in storage.
     * PUT/PATCH /alkanProjects/{id}
     *
     * @param int $id
     * @param UpdateAlkanProjectAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAlkanProjectAPIRequest $request)
    {
        $input = $request->all();

        /** @var AlkanProject $alkanProject */
        $alkanProject = $this->alkanProjectRepository->find($id);

        if (empty($alkanProject)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/alkanProjects.singular')])
            );
        }

        $alkanProject = $this->alkanProjectRepository->update($input, $id);

        return $this->sendResponse(
            $alkanProject->toArray(),
            __('messages.updated', ['model' => __('models/alkanProjects.singular')])
        );
    }

    /**
     * Remove the specified AlkanProject from storage.
     * DELETE /alkanProjects/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AlkanProject $alkanProject */
        $alkanProject = $this->alkanProjectRepository->find($id);

        if (empty($alkanProject)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/alkanProjects.singular')])
            );
        }

        $alkanProject->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/alkanProjects.singular')])
        );
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSitePrioAPIRequest;
use App\Http\Requests\API\UpdateSitePrioAPIRequest;
use App\Models\SitePrio;
use App\Repositories\SitePrioRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SitePrioController
 * @package App\Http\Controllers\API
 */

class SitePrioAPIController extends AppBaseController
{
    /** @var  SitePrioRepository */
    private $sitePrioRepository;

    public function __construct(SitePrioRepository $sitePrioRepo)
    {
        $this->sitePrioRepository = $sitePrioRepo;
    }

    /**
     * Display a listing of the SitePrio.
     * GET|HEAD /sitePrios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $sitePrios = $this->sitePrioRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $sitePrios->toArray(),
            __('messages.retrieved', ['model' => __('models/sitePrios.plural')])
        );
    }

    /**
     * Store a newly created SitePrio in storage.
     * POST /sitePrios
     *
     * @param CreateSitePrioAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSitePrioAPIRequest $request)
    {
        $input = $request->all();

        $sitePrio = $this->sitePrioRepository->create($input);

        return $this->sendResponse(
            $sitePrio->toArray(),
            __('messages.saved', ['model' => __('models/sitePrios.singular')])
        );
    }

    /**
     * Display the specified SitePrio.
     * GET|HEAD /sitePrios/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SitePrio $sitePrio */
        $sitePrio = $this->sitePrioRepository->find($id);

        if (empty($sitePrio)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/sitePrios.singular')])
            );
        }

        return $this->sendResponse(
            $sitePrio->toArray(),
            __('messages.retrieved', ['model' => __('models/sitePrios.singular')])
        );
    }

    /**
     * Update the specified SitePrio in storage.
     * PUT/PATCH /sitePrios/{id}
     *
     * @param int $id
     * @param UpdateSitePrioAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSitePrioAPIRequest $request)
    {
        $input = $request->all();

        /** @var SitePrio $sitePrio */
        $sitePrio = $this->sitePrioRepository->find($id);

        if (empty($sitePrio)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/sitePrios.singular')])
            );
        }

        $sitePrio = $this->sitePrioRepository->update($input, $id);

        return $this->sendResponse(
            $sitePrio->toArray(),
            __('messages.updated', ['model' => __('models/sitePrios.singular')])
        );
    }

    /**
     * Remove the specified SitePrio from storage.
     * DELETE /sitePrios/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SitePrio $sitePrio */
        $sitePrio = $this->sitePrioRepository->find($id);

        if (empty($sitePrio)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/sitePrios.singular')])
            );
        }

        $sitePrio->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/sitePrios.singular')])
        );
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createotc_sitesAPIRequest;
use App\Http\Requests\API\Updateotc_sitesAPIRequest;
use App\Models\otc_sites;
use App\Repositories\otc_sitesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class otc_sitesController
 * @package App\Http\Controllers\API
 */

class otc_sitesAPIController extends AppBaseController
{
    /** @var  otc_sitesRepository */
    private $otcSitesRepository;

    public function __construct(otc_sitesRepository $otcSitesRepo)
    {
        $this->otcSitesRepository = $otcSitesRepo;
    }

    /**
     * Display a listing of the otc_sites.
     * GET|HEAD /otcSites
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $otcSites = $this->otcSitesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $otcSites->toArray(),
            __('messages.retrieved', ['model' => __('models/otcSites.plural')])
        );
    }

    /**
     * Store a newly created otc_sites in storage.
     * POST /otcSites
     *
     * @param Createotc_sitesAPIRequest $request
     *
     * @return Response
     */
    public function store(Createotc_sitesAPIRequest $request)
    {
        $input = $request->all();

        $otcSites = $this->otcSitesRepository->create($input);

        return $this->sendResponse(
            $otcSites->toArray(),
            __('messages.saved', ['model' => __('models/otcSites.singular')])
        );
    }

    /**
     * Display the specified otc_sites.
     * GET|HEAD /otcSites/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var otc_sites $otcSites */
        $otcSites = $this->otcSitesRepository->find($id);

        if (empty($otcSites)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/otcSites.singular')])
            );
        }

        return $this->sendResponse(
            $otcSites->toArray(),
            __('messages.retrieved', ['model' => __('models/otcSites.singular')])
        );
    }

    /**
     * Update the specified otc_sites in storage.
     * PUT/PATCH /otcSites/{id}
     *
     * @param int $id
     * @param Updateotc_sitesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateotc_sitesAPIRequest $request)
    {
        $input = $request->all();

        /** @var otc_sites $otcSites */
        $otcSites = $this->otcSitesRepository->find($id);

        if (empty($otcSites)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/otcSites.singular')])
            );
        }

        $otcSites = $this->otcSitesRepository->update($input, $id);

        return $this->sendResponse(
            $otcSites->toArray(),
            __('messages.updated', ['model' => __('models/otcSites.singular')])
        );
    }

    /**
     * Remove the specified otc_sites from storage.
     * DELETE /otcSites/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var otc_sites $otcSites */
        $otcSites = $this->otcSitesRepository->find($id);

        if (empty($otcSites)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/otcSites.singular')])
            );
        }

        $otcSites->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/otcSites.singular')])
        );
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSiteExtraAPIRequest;
use App\Http\Requests\API\UpdateSiteExtraAPIRequest;
use App\Models\SiteExtra;
use App\Repositories\SiteExtraRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SiteExtraController
 * @package App\Http\Controllers\API
 */

class SiteExtraAPIController extends AppBaseController
{
    /** @var  SiteExtraRepository */
    private $siteExtraRepository;

    public function __construct(SiteExtraRepository $siteExtraRepo)
    {
        $this->siteExtraRepository = $siteExtraRepo;
    }

    /**
     * Display a listing of the SiteExtra.
     * GET|HEAD /siteExtras
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $siteExtras = $this->siteExtraRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $siteExtras->toArray(),
            __('messages.retrieved', ['model' => __('models/siteExtras.plural')])
        );
    }

    /**
     * Store a newly created SiteExtra in storage.
     * POST /siteExtras
     *
     * @param CreateSiteExtraAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSiteExtraAPIRequest $request)
    {
        $input = $request->all();

        $siteExtra = $this->siteExtraRepository->create($input);

        return $this->sendResponse(
            $siteExtra->toArray(),
            __('messages.saved', ['model' => __('models/siteExtras.singular')])
        );
    }

    /**
     * Display the specified SiteExtra.
     * GET|HEAD /siteExtras/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SiteExtra $siteExtra */
        $siteExtra = $this->siteExtraRepository->find($id);

        if (empty($siteExtra)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/siteExtras.singular')])
            );
        }

        return $this->sendResponse(
            $siteExtra->toArray(),
            __('messages.retrieved', ['model' => __('models/siteExtras.singular')])
        );
    }

    /**
     * Update the specified SiteExtra in storage.
     * PUT/PATCH /siteExtras/{id}
     *
     * @param int $id
     * @param UpdateSiteExtraAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSiteExtraAPIRequest $request)
    {
        $input = $request->all();

        /** @var SiteExtra $siteExtra */
        $siteExtra = $this->siteExtraRepository->find($id);

        if (empty($siteExtra)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/siteExtras.singular')])
            );
        }

        $siteExtra = $this->siteExtraRepository->update($input, $id);

        return $this->sendResponse(
            $siteExtra->toArray(),
            __('messages.updated', ['model' => __('models/siteExtras.singular')])
        );
    }

    /**
     * Remove the specified SiteExtra from storage.
     * DELETE /siteExtras/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SiteExtra $siteExtra */
        $siteExtra = $this->siteExtraRepository->find($id);

        if (empty($siteExtra)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/siteExtras.singular')])
            );
        }

        $siteExtra->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/siteExtras.singular')])
        );
    }
}

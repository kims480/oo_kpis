<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSiteSnagAPIRequest;
use App\Http\Requests\API\UpdateSiteSnagAPIRequest;
use App\Models\SiteSnag;
use App\Repositories\SiteSnagRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SiteSnagController
 * @package App\Http\Controllers\API
 */

class SiteSnagAPIController extends AppBaseController
{
    /** @var  SiteSnagRepository */
    private $siteSnagRepository;

    public function __construct(SiteSnagRepository $siteSnagRepo)
    {
        $this->siteSnagRepository = $siteSnagRepo;
    }

    /**
     * Display a listing of the SiteSnag.
     * GET|HEAD /siteSnags
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $siteSnags = $this->siteSnagRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $siteSnags->toArray(),
            __('messages.retrieved', ['model' => __('models/siteSnags.plural')])
        );
    }

    /**
     * Store a newly created SiteSnag in storage.
     * POST /siteSnags
     *
     * @param CreateSiteSnagAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSiteSnagAPIRequest $request)
    {
        $input = $request->all();

        $siteSnag = $this->siteSnagRepository->create($input);

        return $this->sendResponse(
            $siteSnag->toArray(),
            __('messages.saved', ['model' => __('models/siteSnags.singular')])
        );
    }

    /**
     * Display the specified SiteSnag.
     * GET|HEAD /siteSnags/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SiteSnag $siteSnag */
        $siteSnag = $this->siteSnagRepository->find($id);

        if (empty($siteSnag)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/siteSnags.singular')])
            );
        }

        return $this->sendResponse(
            $siteSnag->toArray(),
            __('messages.retrieved', ['model' => __('models/siteSnags.singular')])
        );
    }

    /**
     * Update the specified SiteSnag in storage.
     * PUT/PATCH /siteSnags/{id}
     *
     * @param int $id
     * @param UpdateSiteSnagAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSiteSnagAPIRequest $request)
    {
        $input = $request->all();

        /** @var SiteSnag $siteSnag */
        $siteSnag = $this->siteSnagRepository->find($id);

        if (empty($siteSnag)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/siteSnags.singular')])
            );
        }

        $siteSnag = $this->siteSnagRepository->update($input, $id);

        return $this->sendResponse(
            $siteSnag->toArray(),
            __('messages.updated', ['model' => __('models/siteSnags.singular')])
        );
    }

    /**
     * Remove the specified SiteSnag from storage.
     * DELETE /siteSnags/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SiteSnag $siteSnag */
        $siteSnag = $this->siteSnagRepository->find($id);

        if (empty($siteSnag)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/siteSnags.singular')])
            );
        }

        $siteSnag->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/siteSnags.singular')])
        );
    }
}

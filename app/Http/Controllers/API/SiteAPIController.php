<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSiteAPIRequest;
use App\Http\Requests\API\UpdateSiteAPIRequest;
use App\Models\Site;
use App\Repositories\SiteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SiteController
 * @package App\Http\Controllers\API
 */

class SiteAPIController extends AppBaseController
{
    /** @var  SiteRepository */
    private $siteRepository;

    public function __construct(SiteRepository $siteRepo)
    {
        $this->siteRepository = $siteRepo;
    }

    /**
     * Display a listing of the Site.
     * GET|HEAD /sites
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // $sites = $this->siteRepository->all(
        //     $request->except(['skip', 'limit']),
        //     $request->get('skip'),
        //     $request->get('limit')
        // );
        $sites=Site::all();

        return $this->sendResponse(
            $sites->toArray(),
            __('messages.retrieved', ['model' => __('models/sites.plural')])
        );
    }

    /**
     * Store a newly created Site in storage.
     * POST /sites
     *
     * @param CreateSiteAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSiteAPIRequest $request)
    {
        $input = $request->all();

        $site = $this->siteRepository->create($input);

        return $this->sendResponse(
            $site->toArray(),
            __('messages.saved', ['model' => __('models/sites.singular')])
        );
    }

    /**
     * Display the specified Site.
     * GET|HEAD /sites/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Site $site */
        $site = $this->siteRepository->find($id);

        if (empty($site)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/sites.singular')])
            );
        }

        return $this->sendResponse(
            $site->toArray(),
            __('messages.retrieved', ['model' => __('models/sites.singular')])
        );
    }

    /**
     * Update the specified Site in storage.
     * PUT/PATCH /sites/{id}
     *
     * @param int $id
     * @param UpdateSiteAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSiteAPIRequest $request)
    {
        $input = $request->all();

        /** @var Site $site */
        $site = $this->siteRepository->find($id);

        if (empty($site)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/sites.singular')])
            );
        }

        $site = $this->siteRepository->update($input, $id);

        return $this->sendResponse(
            $site->toArray(),
            __('messages.updated', ['model' => __('models/sites.singular')])
        );
    }

    /**
     * Remove the specified Site from storage.
     * DELETE /sites/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Site $site */
        $site = $this->siteRepository->find($id);

        if (empty($site)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/sites.singular')])
            );
        }

        $site->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/sites.singular')])
        );
    }
}

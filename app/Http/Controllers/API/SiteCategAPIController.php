<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSiteCategAPIRequest;
use App\Http\Requests\API\UpdateSiteCategAPIRequest;
use App\Models\SiteCateg;
use App\Repositories\SiteCategRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SiteCategController
 * @package App\Http\Controllers\API
 */

class SiteCategAPIController extends AppBaseController
{
    /** @var  SiteCategRepository */
    private $siteCategRepository;

    public function __construct(SiteCategRepository $siteCategRepo)
    {
        $this->siteCategRepository = $siteCategRepo;
    }

    /**
     * Display a listing of the SiteCateg.
     * GET|HEAD /siteCategs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $siteCategs = $this->siteCategRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $siteCategs->toArray(),
            __('messages.retrieved', ['model' => __('models/siteCategs.plural')])
        );
    }

    /**
     * Store a newly created SiteCateg in storage.
     * POST /siteCategs
     *
     * @param CreateSiteCategAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSiteCategAPIRequest $request)
    {
        $input = $request->all();

        $siteCateg = $this->siteCategRepository->create($input);

        return $this->sendResponse(
            $siteCateg->toArray(),
            __('messages.saved', ['model' => __('models/siteCategs.singular')])
        );
    }

    /**
     * Display the specified SiteCateg.
     * GET|HEAD /siteCategs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SiteCateg $siteCateg */
        $siteCateg = $this->siteCategRepository->find($id);

        if (empty($siteCateg)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/siteCategs.singular')])
            );
        }

        return $this->sendResponse(
            $siteCateg->toArray(),
            __('messages.retrieved', ['model' => __('models/siteCategs.singular')])
        );
    }

    /**
     * Update the specified SiteCateg in storage.
     * PUT/PATCH /siteCategs/{id}
     *
     * @param int $id
     * @param UpdateSiteCategAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSiteCategAPIRequest $request)
    {
        $input = $request->all();

        /** @var SiteCateg $siteCateg */
        $siteCateg = $this->siteCategRepository->find($id);

        if (empty($siteCateg)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/siteCategs.singular')])
            );
        }

        $siteCateg = $this->siteCategRepository->update($input, $id);

        return $this->sendResponse(
            $siteCateg->toArray(),
            __('messages.updated', ['model' => __('models/siteCategs.singular')])
        );
    }

    /**
     * Remove the specified SiteCateg from storage.
     * DELETE /siteCategs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SiteCateg $siteCateg */
        $siteCateg = $this->siteCategRepository->find($id);

        if (empty($siteCateg)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/siteCategs.singular')])
            );
        }

        $siteCateg->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/siteCategs.singular')])
        );
    }
}

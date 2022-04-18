<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSiteTypeAPIRequest;
use App\Http\Requests\API\UpdateSiteTypeAPIRequest;
use App\Models\SiteType;
use App\Repositories\SiteTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SiteTypeController
 * @package App\Http\Controllers\API
 */

class SiteTypeAPIController extends AppBaseController
{
    /** @var  SiteTypeRepository */
    private $siteTypeRepository;

    public function __construct(SiteTypeRepository $siteTypeRepo)
    {
        $this->siteTypeRepository = $siteTypeRepo;
    }

    /**
     * Display a listing of the SiteType.
     * GET|HEAD /siteTypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $siteTypes = $this->siteTypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $siteTypes->toArray(),
            __('messages.retrieved', ['model' => __('models/siteTypes.plural')])
        );
    }

    /**
     * Store a newly created SiteType in storage.
     * POST /siteTypes
     *
     * @param CreateSiteTypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSiteTypeAPIRequest $request)
    {
        $input = $request->all();

        $siteType = $this->siteTypeRepository->create($input);

        return $this->sendResponse(
            $siteType->toArray(),
            __('messages.saved', ['model' => __('models/siteTypes.singular')])
        );
    }

    /**
     * Display the specified SiteType.
     * GET|HEAD /siteTypes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SiteType $siteType */
        $siteType = $this->siteTypeRepository->find($id);

        if (empty($siteType)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/siteTypes.singular')])
            );
        }

        return $this->sendResponse(
            $siteType->toArray(),
            __('messages.retrieved', ['model' => __('models/siteTypes.singular')])
        );
    }

    /**
     * Update the specified SiteType in storage.
     * PUT/PATCH /siteTypes/{id}
     *
     * @param int $id
     * @param UpdateSiteTypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSiteTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var SiteType $siteType */
        $siteType = $this->siteTypeRepository->find($id);

        if (empty($siteType)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/siteTypes.singular')])
            );
        }

        $siteType = $this->siteTypeRepository->update($input, $id);

        return $this->sendResponse(
            $siteType->toArray(),
            __('messages.updated', ['model' => __('models/siteTypes.singular')])
        );
    }

    /**
     * Remove the specified SiteType from storage.
     * DELETE /siteTypes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SiteType $siteType */
        $siteType = $this->siteTypeRepository->find($id);

        if (empty($siteType)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/siteTypes.singular')])
            );
        }

        $siteType->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/siteTypes.singular')])
        );
    }
}

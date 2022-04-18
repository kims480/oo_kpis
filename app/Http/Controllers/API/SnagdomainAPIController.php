<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSnagdomainAPIRequest;
use App\Http\Requests\API\UpdateSnagdomainAPIRequest;
use App\Models\Snagdomain;
use App\Repositories\SnagdomainRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SnagdomainController
 * @package App\Http\Controllers\API
 */

class SnagdomainAPIController extends AppBaseController
{
    /** @var  SnagdomainRepository */
    private $snagdomainRepository;

    public function __construct(SnagdomainRepository $snagdomainRepo)
    {
        $this->snagdomainRepository = $snagdomainRepo;
    }

    /**
     * Display a listing of the Snagdomain.
     * GET|HEAD /snagdomains
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $snagdomains = $this->snagdomainRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $snagdomains->toArray(),
            __('messages.retrieved', ['model' => __('models/snagdomains.plural')])
        );
    }

    /**
     * Store a newly created Snagdomain in storage.
     * POST /snagdomains
     *
     * @param CreateSnagdomainAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSnagdomainAPIRequest $request)
    {
        $input = $request->all();

        $snagdomain = $this->snagdomainRepository->create($input);

        return $this->sendResponse(
            $snagdomain->toArray(),
            __('messages.saved', ['model' => __('models/snagdomains.singular')])
        );
    }

    /**
     * Display the specified Snagdomain.
     * GET|HEAD /snagdomains/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Snagdomain $snagdomain */
        $snagdomain = $this->snagdomainRepository->find($id);

        if (empty($snagdomain)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/snagdomains.singular')])
            );
        }

        return $this->sendResponse(
            $snagdomain->toArray(),
            __('messages.retrieved', ['model' => __('models/snagdomains.singular')])
        );
    }

    /**
     * Update the specified Snagdomain in storage.
     * PUT/PATCH /snagdomains/{id}
     *
     * @param int $id
     * @param UpdateSnagdomainAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSnagdomainAPIRequest $request)
    {
        $input = $request->all();

        /** @var Snagdomain $snagdomain */
        $snagdomain = $this->snagdomainRepository->find($id);

        if (empty($snagdomain)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/snagdomains.singular')])
            );
        }

        $snagdomain = $this->snagdomainRepository->update($input, $id);

        return $this->sendResponse(
            $snagdomain->toArray(),
            __('messages.updated', ['model' => __('models/snagdomains.singular')])
        );
    }

    /**
     * Remove the specified Snagdomain from storage.
     * DELETE /snagdomains/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Snagdomain $snagdomain */
        $snagdomain = $this->snagdomainRepository->find($id);

        if (empty($snagdomain)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/snagdomains.singular')])
            );
        }

        $snagdomain->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/snagdomains.singular')])
        );
    }
}

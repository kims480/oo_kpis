<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOtcScopeAPIRequest;
use App\Http\Requests\API\UpdateOtcScopeAPIRequest;
use App\Models\OtcScope;
use App\Repositories\OtcScopeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class OtcScopeController
 * @package App\Http\Controllers\API
 */

class OtcScopeAPIController extends AppBaseController
{
    /** @var  OtcScopeRepository */
    private $otcScopeRepository;

    public function __construct(OtcScopeRepository $otcScopeRepo)
    {
        $this->otcScopeRepository = $otcScopeRepo;
    }

    /**
     * Display a listing of the OtcScope.
     * GET|HEAD /otcScopes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $otcScopes = $this->otcScopeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $otcScopes->toArray(),
            __('messages.retrieved', ['model' => __('models/otcScopes.plural')])
        );
    }

    /**
     * Store a newly created OtcScope in storage.
     * POST /otcScopes
     *
     * @param CreateOtcScopeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOtcScopeAPIRequest $request)
    {
        $input = $request->all();

        $otcScope = $this->otcScopeRepository->create($input);

        return $this->sendResponse(
            $otcScope->toArray(),
            __('messages.saved', ['model' => __('models/otcScopes.singular')])
        );
    }

    /**
     * Display the specified OtcScope.
     * GET|HEAD /otcScopes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OtcScope $otcScope */
        $otcScope = $this->otcScopeRepository->find($id);

        if (empty($otcScope)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/otcScopes.singular')])
            );
        }

        return $this->sendResponse(
            $otcScope->toArray(),
            __('messages.retrieved', ['model' => __('models/otcScopes.singular')])
        );
    }

    /**
     * Update the specified OtcScope in storage.
     * PUT/PATCH /otcScopes/{id}
     *
     * @param int $id
     * @param UpdateOtcScopeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOtcScopeAPIRequest $request)
    {
        $input = $request->all();

        /** @var OtcScope $otcScope */
        $otcScope = $this->otcScopeRepository->find($id);

        if (empty($otcScope)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/otcScopes.singular')])
            );
        }

        $otcScope = $this->otcScopeRepository->update($input, $id);

        return $this->sendResponse(
            $otcScope->toArray(),
            __('messages.updated', ['model' => __('models/otcScopes.singular')])
        );
    }

    /**
     * Remove the specified OtcScope from storage.
     * DELETE /otcScopes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OtcScope $otcScope */
        $otcScope = $this->otcScopeRepository->find($id);

        if (empty($otcScope)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/otcScopes.singular')])
            );
        }

        $otcScope->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/otcScopes.singular')])
        );
    }
}

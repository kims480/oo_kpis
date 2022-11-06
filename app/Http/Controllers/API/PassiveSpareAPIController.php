<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePassiveSpareAPIRequest;
use App\Http\Requests\API\UpdatePassiveSpareAPIRequest;
use App\Models\PassiveSpare;
use App\Repositories\PassiveSpareRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PassiveSpareController
 * @package App\Http\Controllers\API
 */

class PassiveSpareAPIController extends AppBaseController
{
    /** @var  PassiveSpareRepository */
    private $passiveSpareRepository;

    public function __construct(PassiveSpareRepository $passiveSpareRepo)
    {
        $this->passiveSpareRepository = $passiveSpareRepo;
    }

    /**
     * Display a listing of the PassiveSpare.
     * GET|HEAD /passiveSpares
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $passiveSpares = $this->passiveSpareRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $passiveSpares->toArray(),
            __('messages.retrieved', ['model' => __('models/passiveSpares.plural')])
        );
    }

    /**
     * Store a newly created PassiveSpare in storage.
     * POST /passiveSpares
     *
     * @param CreatePassiveSpareAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePassiveSpareAPIRequest $request)
    {
        $input = $request->all();

        $passiveSpare = $this->passiveSpareRepository->create($input);

        return $this->sendResponse(
            $passiveSpare->toArray(),
            __('messages.saved', ['model' => __('models/passiveSpares.singular')])
        );
    }

    /**
     * Display the specified PassiveSpare.
     * GET|HEAD /passiveSpares/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PassiveSpare $passiveSpare */
        $passiveSpare = $this->passiveSpareRepository->find($id);

        if (empty($passiveSpare)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/passiveSpares.singular')])
            );
        }

        return $this->sendResponse(
            $passiveSpare->toArray(),
            __('messages.retrieved', ['model' => __('models/passiveSpares.singular')])
        );
    }

    /**
     * Update the specified PassiveSpare in storage.
     * PUT/PATCH /passiveSpares/{id}
     *
     * @param int $id
     * @param UpdatePassiveSpareAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePassiveSpareAPIRequest $request)
    {
        $input = $request->all();

        /** @var PassiveSpare $passiveSpare */
        $passiveSpare = $this->passiveSpareRepository->find($id);

        if (empty($passiveSpare)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/passiveSpares.singular')])
            );
        }

        $passiveSpare = $this->passiveSpareRepository->update($input, $id);

        return $this->sendResponse(
            $passiveSpare->toArray(),
            __('messages.updated', ['model' => __('models/passiveSpares.singular')])
        );
    }

    /**
     * Remove the specified PassiveSpare from storage.
     * DELETE /passiveSpares/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PassiveSpare $passiveSpare */
        $passiveSpare = $this->passiveSpareRepository->find($id);

        if (empty($passiveSpare)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/passiveSpares.singular')])
            );
        }

        $passiveSpare->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/passiveSpares.singular')])
        );
    }
}

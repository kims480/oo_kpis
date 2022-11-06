<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSnagmangAPIRequest;
use App\Http\Requests\API\UpdateSnagmangAPIRequest;
use App\Models\Snagmang;
use App\Repositories\SnagRepository as SnagmangRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SnagmangController
 * @package App\Http\Controllers\API
 */

class SnagmangAPIController extends AppBaseController
{
    private $snagmangRepository;
    /** @var  SnagmangRepository */

    public function __construct(SnagmangRepository $snagmangRepo)
    {
        $this->snagmangRepository = $snagmangRepo;
    }

    /**
     * Display a listing of the Snagmang.
     * GET|HEAD /snagmangs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $snagmangs = $this->snagmangRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $snagmangs->toArray(),
            __('messages.retrieved', ['model' => __('models/snagmangs.plural')])
        );
    }

    /**
     * Store a newly created Snagmang in storage.
     * POST /snagmangs
     *
     * @param CreateSnagmangAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSnagmangAPIRequest $request)
    {
        $input = $request->all();

        $snagmang = $this->snagmangRepository->create($input);

        return $this->sendResponse(
            $snagmang->toArray(),
            __('messages.saved', ['model' => __('models/snagmangs.singular')])
        );
    }

    /**
     * Display the specified Snagmang.
     * GET|HEAD /snagmangs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Snagmang $snagmang */
        $snagmang = $this->snagmangRepository->find($id);

        if (empty($snagmang)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/snagmangs.singular')])
            );
        }

        return $this->sendResponse(
            $snagmang->toArray(),
            __('messages.retrieved', ['model' => __('models/snagmangs.singular')])
        );
    }

    /**
     * Update the specified Snagmang in storage.
     * PUT/PATCH /snagmangs/{id}
     *
     * @param int $id
     * @param UpdateSnagmangAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSnagmangAPIRequest $request)
    {
        $input = $request->all();

        /** @var Snagmang $snagmang */
        $snagmang = $this->snagmangRepository->find($id);

        if (empty($snagmang)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/snagmangs.singular')])
            );
        }

        $snagmang = $this->snagmangRepository->update($input, $id);

        return $this->sendResponse(
            $snagmang->toArray(),
            __('messages.updated', ['model' => __('models/snagmangs.singular')])
        );
    }

    /**
     * Remove the specified Snagmang from storage.
     * DELETE /snagmangs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Snagmang $snagmang */
        $snagmang = $this->snagmangRepository->find($id);

        if (empty($snagmang)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/snagmangs.singular')])
            );
        }

        $snagmang->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/snagmangs.singular')])
        );
    }
}

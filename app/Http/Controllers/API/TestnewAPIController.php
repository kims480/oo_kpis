<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTestnewAPIRequest;
use App\Http\Requests\API\UpdateTestnewAPIRequest;
use App\Models\Testnew;
use App\Repositories\TestnewRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TestnewController
 * @package App\Http\Controllers\API
 */

class TestnewAPIController extends AppBaseController
{
    /** @var  TestnewRepository */
    private $testnewRepository;

    public function __construct(TestnewRepository $testnewRepo)
    {
        $this->testnewRepository = $testnewRepo;
    }

    /**
     * Display a listing of the Testnew.
     * GET|HEAD /testnews
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $testnews = $this->testnewRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $testnews->toArray(),
            __('messages.retrieved', ['model' => __('models/testnews.plural')])
        );
    }

    /**
     * Store a newly created Testnew in storage.
     * POST /testnews
     *
     * @param CreateTestnewAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTestnewAPIRequest $request)
    {
        $input = $request->all();

        $testnew = $this->testnewRepository->create($input);

        return $this->sendResponse(
            $testnew->toArray(),
            __('messages.saved', ['model' => __('models/testnews.singular')])
        );
    }

    /**
     * Display the specified Testnew.
     * GET|HEAD /testnews/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Testnew $testnew */
        $testnew = $this->testnewRepository->find($id);

        if (empty($testnew)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/testnews.singular')])
            );
        }

        return $this->sendResponse(
            $testnew->toArray(),
            __('messages.retrieved', ['model' => __('models/testnews.singular')])
        );
    }

    /**
     * Update the specified Testnew in storage.
     * PUT/PATCH /testnews/{id}
     *
     * @param int $id
     * @param UpdateTestnewAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTestnewAPIRequest $request)
    {
        $input = $request->all();

        /** @var Testnew $testnew */
        $testnew = $this->testnewRepository->find($id);

        if (empty($testnew)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/testnews.singular')])
            );
        }

        $testnew = $this->testnewRepository->update($input, $id);

        return $this->sendResponse(
            $testnew->toArray(),
            __('messages.updated', ['model' => __('models/testnews.singular')])
        );
    }

    /**
     * Remove the specified Testnew from storage.
     * DELETE /testnews/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Testnew $testnew */
        $testnew = $this->testnewRepository->find($id);

        if (empty($testnew)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/testnews.singular')])
            );
        }

        $testnew->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/testnews.singular')])
        );
    }
}

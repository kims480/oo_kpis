<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTestnewRequest;
use App\Http\Requests\UpdateTestnewRequest;
use App\Repositories\TestnewRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TestnewController extends AppBaseController
{
    /** @var  TestnewRepository */
    private $testnewRepository;

    public function __construct(TestnewRepository $testnewRepo)
    {
        $this->testnewRepository = $testnewRepo;
    }

    /**
     * Display a listing of the Testnew.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $testnews = $this->testnewRepository->paginate(10);

        return view('testnews.index')
            ->with('testnews', $testnews);
    }

    /**
     * Show the form for creating a new Testnew.
     *
     * @return Response
     */
    public function create()
    {
        return view('testnews.create');
    }

    /**
     * Store a newly created Testnew in storage.
     *
     * @param CreateTestnewRequest $request
     *
     * @return Response
     */
    public function store(CreateTestnewRequest $request)
    {
        $input = $request->all();

        $testnew = $this->testnewRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/testnews.singular')]));

        return redirect(route('testnews.index'));
    }

    /**
     * Display the specified Testnew.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $testnew = $this->testnewRepository->find($id);

        if (empty($testnew)) {
            Flash::error(__('messages.not_found', ['model' => __('models/testnews.singular')]));

            return redirect(route('testnews.index'));
        }

        return view('testnews.show')->with('testnew', $testnew);
    }

    /**
     * Show the form for editing the specified Testnew.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $testnew = $this->testnewRepository->find($id);

        if (empty($testnew)) {
            Flash::error(__('messages.not_found', ['model' => __('models/testnews.singular')]));

            return redirect(route('testnews.index'));
        }

        return view('testnews.edit')->with('testnew', $testnew);
    }

    /**
     * Update the specified Testnew in storage.
     *
     * @param int $id
     * @param UpdateTestnewRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTestnewRequest $request)
    {
        $testnew = $this->testnewRepository->find($id);

        if (empty($testnew)) {
            Flash::error(__('messages.not_found', ['model' => __('models/testnews.singular')]));

            return redirect(route('testnews.index'));
        }

        $testnew = $this->testnewRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/testnews.singular')]));

        return redirect(route('testnews.index'));
    }

    /**
     * Remove the specified Testnew from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $testnew = $this->testnewRepository->find($id);

        if (empty($testnew)) {
            Flash::error(__('messages.not_found', ['model' => __('models/testnews.singular')]));

            return redirect(route('testnews.index'));
        }

        $this->testnewRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/testnews.singular')]));

        return redirect(route('testnews.index'));
    }
}

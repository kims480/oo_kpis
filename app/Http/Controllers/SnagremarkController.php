<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSnagremarkRequest;
use App\Http\Requests\UpdateSnagremarkRequest;
use App\Repositories\SnagremarkRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SnagremarkController extends AppBaseController
{
    /** @var SnagremarkRepository $snagremarkRepository*/
    private $snagremarkRepository;

    public function __construct(SnagremarkRepository $snagremarkRepo)
    {
        $this->snagremarkRepository = $snagremarkRepo;
    }

    /**
     * Display a listing of the Snagremark.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $snagremarks = $this->snagremarkRepository->paginate(10);

        return view('snagremarks.index')
            ->with('snagremarks', $snagremarks);
    }

    /**
     * Show the form for creating a new Snagremark.
     *
     * @return Response
     */
    public function create()
    {
        return view('snagremarks.create');
    }

    /**
     * Store a newly created Snagremark in storage.
     *
     * @param CreateSnagremarkRequest $request
     *
     * @return Response
     */
    public function store(CreateSnagremarkRequest $request)
    {
        $input = $request->all();

        $snagremark = $this->snagremarkRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/snagremarks.singular')]));

        return redirect(route('snagremarks.index'));
    }

    /**
     * Display the specified Snagremark.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $snagremark = $this->snagremarkRepository->find($id);

        if (empty($snagremark)) {
            Flash::error(__('messages.not_found', ['model' => __('models/snagremarks.singular')]));

            return redirect(route('snagremarks.index'));
        }

        return view('snagremarks.show')->with('snagremark', $snagremark);
    }

    /**
     * Show the form for editing the specified Snagremark.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $snagremark = $this->snagremarkRepository->find($id);

        if (empty($snagremark)) {
            Flash::error(__('messages.not_found', ['model' => __('models/snagremarks.singular')]));

            return redirect(route('snagremarks.index'));
        }

        return view('snagremarks.edit')->with('snagremark', $snagremark);
    }

    /**
     * Update the specified Snagremark in storage.
     *
     * @param int $id
     * @param UpdateSnagremarkRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSnagremarkRequest $request)
    {
        $snagremark = $this->snagremarkRepository->find($id);

        if (empty($snagremark)) {
            Flash::error(__('messages.not_found', ['model' => __('models/snagremarks.singular')]));

            return redirect(route('snagremarks.index'));
        }

        $snagremark = $this->snagremarkRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/snagremarks.singular')]));

        return redirect(route('snagremarks.index'));
    }

    /**
     * Remove the specified Snagremark from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $snagremark = $this->snagremarkRepository->find($id);

        if (empty($snagremark)) {
            Flash::error(__('messages.not_found', ['model' => __('models/snagremarks.singular')]));

            return redirect(route('snagremarks.index'));
        }

        $this->snagremarkRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/snagremarks.singular')]));

        return redirect(route('snagremarks.index'));
    }
}

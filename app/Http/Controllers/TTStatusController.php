<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTTStatusRequest;
use App\Http\Requests\UpdateTTStatusRequest;
use App\Repositories\TTStatusRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TTStatusController extends AppBaseController
{
    /** @var TTStatusRepository $tTStatusRepository*/
    private $tTStatusRepository;

    public function __construct(TTStatusRepository $tTStatusRepo)
    {
        $this->tTStatusRepository = $tTStatusRepo;
    }

    /**
     * Display a listing of the TTStatus.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tTStatuses = $this->tTStatusRepository->paginate(10);

        return view('t_t_statuses.index')
            ->with('tTStatuses', $tTStatuses);
    }

    /**
     * Show the form for creating a new TTStatus.
     *
     * @return Response
     */
    public function create()
    {
        return view('t_t_statuses.create');
    }

    /**
     * Store a newly created TTStatus in storage.
     *
     * @param CreateTTStatusRequest $request
     *
     * @return Response
     */
    public function store(CreateTTStatusRequest $request)
    {
        $input = $request->all();

        $tTStatus = $this->tTStatusRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tTStatuses.singular')]));

        return redirect(route('tTStatuses.index'));
    }

    /**
     * Display the specified TTStatus.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tTStatus = $this->tTStatusRepository->find($id);

        if (empty($tTStatus)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tTStatuses.singular')]));

            return redirect(route('tTStatuses.index'));
        }

        return view('t_t_statuses.show')->with('tTStatus', $tTStatus);
    }

    /**
     * Show the form for editing the specified TTStatus.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tTStatus = $this->tTStatusRepository->find($id);

        if (empty($tTStatus)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tTStatuses.singular')]));

            return redirect(route('tTStatuses.index'));
        }

        return view('t_t_statuses.edit')->with('tTStatus', $tTStatus);
    }

    /**
     * Update the specified TTStatus in storage.
     *
     * @param int $id
     * @param UpdateTTStatusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTTStatusRequest $request)
    {
        $tTStatus = $this->tTStatusRepository->find($id);

        if (empty($tTStatus)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tTStatuses.singular')]));

            return redirect(route('tTStatuses.index'));
        }

        $tTStatus = $this->tTStatusRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tTStatuses.singular')]));

        return redirect(route('tTStatuses.index'));
    }

    /**
     * Remove the specified TTStatus from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tTStatus = $this->tTStatusRepository->find($id);

        if (empty($tTStatus)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tTStatuses.singular')]));

            return redirect(route('tTStatuses.index'));
        }

        $this->tTStatusRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tTStatuses.singular')]));

        return redirect(route('tTStatuses.index'));
    }
}

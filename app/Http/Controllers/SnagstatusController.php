<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSnagstatusRequest;
use App\Http\Requests\UpdateSnagstatusRequest;
use App\Repositories\SnagstatusRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SnagstatusController extends AppBaseController
{
    /** @var SnagstatusRepository $snagstatusRepository*/
    private $snagstatusRepository;

    public function __construct(SnagstatusRepository $snagstatusRepo)
    {
        $this->snagstatusRepository = $snagstatusRepo;
    }

    /**
     * Display a listing of the Snagstatus.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $snagstatuses = $this->snagstatusRepository->paginate(10);

        return view('snagstatuses.index')
            ->with('snagstatuses', $snagstatuses);
    }

    /**
     * Show the form for creating a new Snagstatus.
     *
     * @return Response
     */
    public function create()
    {
        return view('snagstatuses.create');
    }

    /**
     * Store a newly created Snagstatus in storage.
     *
     * @param CreateSnagstatusRequest $request
     *
     * @return Response
     */
    public function store(CreateSnagstatusRequest $request)
    {
        $input = $request->all();

        $snagstatus = $this->snagstatusRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/snagstatuses.singular')]));

        return redirect(route('snagstatuses.index'));
    }

    /**
     * Display the specified Snagstatus.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $snagstatus = $this->snagstatusRepository->find($id);

        if (empty($snagstatus)) {
            Flash::error(__('messages.not_found', ['model' => __('models/snagstatuses.singular')]));

            return redirect(route('snagstatuses.index'));
        }

        return view('snagstatuses.show')->with('snagstatus', $snagstatus);
    }

    /**
     * Show the form for editing the specified Snagstatus.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $snagstatus = $this->snagstatusRepository->find($id);

        if (empty($snagstatus)) {
            Flash::error(__('messages.not_found', ['model' => __('models/snagstatuses.singular')]));

            return redirect(route('snagstatuses.index'));
        }

        return view('snagstatuses.edit')->with('snagstatus', $snagstatus);
    }

    /**
     * Update the specified Snagstatus in storage.
     *
     * @param int $id
     * @param UpdateSnagstatusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSnagstatusRequest $request)
    {
        $snagstatus = $this->snagstatusRepository->find($id);

        if (empty($snagstatus)) {
            Flash::error(__('messages.not_found', ['model' => __('models/snagstatuses.singular')]));

            return redirect(route('snagstatuses.index'));
        }

        $snagstatus = $this->snagstatusRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/snagstatuses.singular')]));

        return redirect(route('snagstatuses.index'));
    }

    /**
     * Remove the specified Snagstatus from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $snagstatus = $this->snagstatusRepository->find($id);

        if (empty($snagstatus)) {
            Flash::error(__('messages.not_found', ['model' => __('models/snagstatuses.singular')]));

            return redirect(route('snagstatuses.index'));
        }

        $this->snagstatusRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/snagstatuses.singular')]));

        return redirect(route('snagstatuses.index'));
    }
}

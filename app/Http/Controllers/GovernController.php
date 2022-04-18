<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGovernRequest;
use App\Http\Requests\UpdateGovernRequest;
use App\Repositories\GovernRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class GovernController extends AppBaseController
{
    /** @var  GovernRepository */
    private $governRepository;

    public function __construct(GovernRepository $governRepo)
    {
        $this->governRepository = $governRepo;
    }

    /**
     * Display a listing of the Govern.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $governs = $this->governRepository->all();

        return view('governs.index')
            ->with('governs', $governs);
    }

    /**
     * Show the form for creating a new Govern.
     *
     * @return Response
     */
    public function create()
    {
        return view('governs.create');
    }

    /**
     * Store a newly created Govern in storage.
     *
     * @param CreateGovernRequest $request
     *
     * @return Response
     */
    public function store(CreateGovernRequest $request)
    {
        $input = $request->all();

        $govern = $this->governRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/governs.singular')]));

        return redirect(route('governs.index'));
    }

    /**
     * Display the specified Govern.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $govern = $this->governRepository->find($id);

        if (empty($govern)) {
            Flash::error(__('messages.not_found', ['model' => __('models/governs.singular')]));

            return redirect(route('governs.index'));
        }

        return view('governs.show')->with('govern', $govern);
    }

    /**
     * Show the form for editing the specified Govern.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $govern = $this->governRepository->find($id);

        if (empty($govern)) {
            Flash::error(__('messages.not_found', ['model' => __('models/governs.singular')]));

            return redirect(route('governs.index'));
        }

        return view('governs.edit')->with('govern', $govern);
    }

    /**
     * Update the specified Govern in storage.
     *
     * @param int $id
     * @param UpdateGovernRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGovernRequest $request)
    {
        $govern = $this->governRepository->find($id);

        if (empty($govern)) {
            Flash::error(__('messages.not_found', ['model' => __('models/governs.singular')]));

            return redirect(route('governs.index'));
        }

        $govern = $this->governRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/governs.singular')]));

        return redirect(route('governs.index'));
    }

    /**
     * Remove the specified Govern from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $govern = $this->governRepository->find($id);

        if (empty($govern)) {
            Flash::error(__('messages.not_found', ['model' => __('models/governs.singular')]));

            return redirect(route('governs.index'));
        }

        $this->governRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/governs.singular')]));

        return redirect(route('governs.index'));
    }
}

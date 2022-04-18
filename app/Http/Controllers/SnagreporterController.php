<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSnagreporterRequest;
use App\Http\Requests\UpdateSnagreporterRequest;
use App\Repositories\SnagreporterRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SnagreporterController extends AppBaseController
{
    /** @var SnagreporterRepository $snagreporterRepository*/
    private $snagreporterRepository;

    public function __construct(SnagreporterRepository $snagreporterRepo)
    {
        $this->snagreporterRepository = $snagreporterRepo;
    }

    /**
     * Display a listing of the Snagreporter.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $snagreporters = $this->snagreporterRepository->paginate(10);

        return view('snagreporters.index')
            ->with('snagreporters', $snagreporters);
    }

    /**
     * Show the form for creating a new Snagreporter.
     *
     * @return Response
     */
    public function create()
    {
        return view('snagreporters.create');
    }

    /**
     * Store a newly created Snagreporter in storage.
     *
     * @param CreateSnagreporterRequest $request
     *
     * @return Response
     */
    public function store(CreateSnagreporterRequest $request)
    {
        $input = $request->all();

        $snagreporter = $this->snagreporterRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/snagreporters.singular')]));

        return redirect(route('snagreporters.index'));
    }

    /**
     * Display the specified Snagreporter.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $snagreporter = $this->snagreporterRepository->find($id);

        if (empty($snagreporter)) {
            Flash::error(__('messages.not_found', ['model' => __('models/snagreporters.singular')]));

            return redirect(route('snagreporters.index'));
        }

        return view('snagreporters.show')->with('snagreporter', $snagreporter);
    }

    /**
     * Show the form for editing the specified Snagreporter.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $snagreporter = $this->snagreporterRepository->find($id);

        if (empty($snagreporter)) {
            Flash::error(__('messages.not_found', ['model' => __('models/snagreporters.singular')]));

            return redirect(route('snagreporters.index'));
        }

        return view('snagreporters.edit')->with('snagreporter', $snagreporter);
    }

    /**
     * Update the specified Snagreporter in storage.
     *
     * @param int $id
     * @param UpdateSnagreporterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSnagreporterRequest $request)
    {
        $snagreporter = $this->snagreporterRepository->find($id);

        if (empty($snagreporter)) {
            Flash::error(__('messages.not_found', ['model' => __('models/snagreporters.singular')]));

            return redirect(route('snagreporters.index'));
        }

        $snagreporter = $this->snagreporterRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/snagreporters.singular')]));

        return redirect(route('snagreporters.index'));
    }

    /**
     * Remove the specified Snagreporter from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $snagreporter = $this->snagreporterRepository->find($id);

        if (empty($snagreporter)) {
            Flash::error(__('messages.not_found', ['model' => __('models/snagreporters.singular')]));

            return redirect(route('snagreporters.index'));
        }

        $this->snagreporterRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/snagreporters.singular')]));

        return redirect(route('snagreporters.index'));
    }
}

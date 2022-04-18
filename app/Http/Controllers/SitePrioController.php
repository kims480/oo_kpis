<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSitePrioRequest;
use App\Http\Requests\UpdateSitePrioRequest;
use App\Repositories\SitePrioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SitePrioController extends AppBaseController
{
    /** @var SitePrioRepository $sitePrioRepository*/
    private $sitePrioRepository;

    public function __construct(SitePrioRepository $sitePrioRepo)
    {
        $this->sitePrioRepository = $sitePrioRepo;
    }

    /**
     * Display a listing of the SitePrio.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $sitePrios = $this->sitePrioRepository->paginate(10);

        return view('site_prios.index')
            ->with('sitePrios', $sitePrios);
    }

    /**
     * Show the form for creating a new SitePrio.
     *
     * @return Response
     */
    public function create()
    {
        return view('site_prios.create');
    }

    /**
     * Store a newly created SitePrio in storage.
     *
     * @param CreateSitePrioRequest $request
     *
     * @return Response
     */
    public function store(CreateSitePrioRequest $request)
    {
        $input = $request->all();

        $sitePrio = $this->sitePrioRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/sitePrios.singular')]));

        return redirect(route('sitePrios.index'));
    }

    /**
     * Display the specified SitePrio.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sitePrio = $this->sitePrioRepository->find($id);

        if (empty($sitePrio)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sitePrios.singular')]));

            return redirect(route('sitePrios.index'));
        }

        return view('site_prios.show')->with('sitePrio', $sitePrio);
    }

    /**
     * Show the form for editing the specified SitePrio.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sitePrio = $this->sitePrioRepository->find($id);

        if (empty($sitePrio)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sitePrios.singular')]));

            return redirect(route('sitePrios.index'));
        }

        return view('site_prios.edit')->with('sitePrio', $sitePrio);
    }

    /**
     * Update the specified SitePrio in storage.
     *
     * @param int $id
     * @param UpdateSitePrioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSitePrioRequest $request)
    {
        $sitePrio = $this->sitePrioRepository->find($id);

        if (empty($sitePrio)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sitePrios.singular')]));

            return redirect(route('sitePrios.index'));
        }

        $sitePrio = $this->sitePrioRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/sitePrios.singular')]));

        return redirect(route('sitePrios.index'));
    }

    /**
     * Remove the specified SitePrio from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sitePrio = $this->sitePrioRepository->find($id);

        if (empty($sitePrio)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sitePrios.singular')]));

            return redirect(route('sitePrios.index'));
        }

        $this->sitePrioRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/sitePrios.singular')]));

        return redirect(route('sitePrios.index'));
    }
}

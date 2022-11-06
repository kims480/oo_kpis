<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSiteExtraRequest;
use App\Http\Requests\UpdateSiteExtraRequest;
use App\Repositories\SiteExtraRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SiteExtraController extends AppBaseController
{
    /** @var SiteExtraRepository $siteExtraRepository*/
    private $siteExtraRepository;

    public function __construct(SiteExtraRepository $siteExtraRepo)
    {
        $this->siteExtraRepository = $siteExtraRepo;
    }

    /**
     * Display a listing of the SiteExtra.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $siteExtras = $this->siteExtraRepository->paginate(10);

        return view('site_extras.index')
            ->with('siteExtras', $siteExtras);
    }

    /**
     * Show the form for creating a new SiteExtra.
     *
     * @return Response
     */
    public function create()
    {
        return view('site_extras.create');
    }

    /**
     * Store a newly created SiteExtra in storage.
     *
     * @param CreateSiteExtraRequest $request
     *
     * @return Response
     */
    public function store(CreateSiteExtraRequest $request)
    {
        $input = $request->all();

        $siteExtra = $this->siteExtraRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/siteExtras.singular')]));

        return redirect(route('siteExtras.index'));
    }

    /**
     * Display the specified SiteExtra.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $siteExtra = $this->siteExtraRepository->find($id);

        if (empty($siteExtra)) {
            Flash::error(__('messages.not_found', ['model' => __('models/siteExtras.singular')]));

            return redirect(route('siteExtras.index'));
        }

        return view('site_extras.show')->with('siteExtra', $siteExtra);
    }

    /**
     * Show the form for editing the specified SiteExtra.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $siteExtra = $this->siteExtraRepository->find($id);

        if (empty($siteExtra)) {
            Flash::error(__('messages.not_found', ['model' => __('models/siteExtras.singular')]));

            return redirect(route('siteExtras.index'));
        }

        return view('site_extras.edit')->with('siteExtra', $siteExtra);
    }

    /**
     * Update the specified SiteExtra in storage.
     *
     * @param int $id
     * @param UpdateSiteExtraRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSiteExtraRequest $request)
    {
        $siteExtra = $this->siteExtraRepository->find($id);

        if (empty($siteExtra)) {
            Flash::error(__('messages.not_found', ['model' => __('models/siteExtras.singular')]));

            return redirect(route('siteExtras.index'));
        }

        $siteExtra = $this->siteExtraRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/siteExtras.singular')]));

        return redirect(route('siteExtras.index'));
    }

    /**
     * Remove the specified SiteExtra from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $siteExtra = $this->siteExtraRepository->find($id);

        if (empty($siteExtra)) {
            Flash::error(__('messages.not_found', ['model' => __('models/siteExtras.singular')]));

            return redirect(route('siteExtras.index'));
        }

        $this->siteExtraRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/siteExtras.singular')]));

        return redirect(route('siteExtras.index'));
    }
}

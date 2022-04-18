<?php

namespace App\Http\Controllers;

use App\DataTables\SiteDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSiteRequest;
use App\Http\Requests\UpdateSiteRequest;
use App\Repositories\SiteRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SiteController extends AppBaseController
{
    /** @var  SiteRepository */
    private $siteRepository;

    public function __construct(SiteRepository $siteRepo)
    {
        $this->siteRepository = $siteRepo;
    }

    /**
     * Display a listing of the Site.
     *
     * @param SiteDataTable $siteDataTable
     * @return Response
     */
    public function index(SiteDataTable $siteDataTable)
    {
        return view('sites.index');
    }

    /**
     * Show the form for creating a new Site.
     *
     * @return Response
     */
    public function create()
    {
        return view('sites.create');
    }

    /**
     * Store a newly created Site in storage.
     *
     * @param CreateSiteRequest $request
     *
     * @return Response
     */
    public function store(CreateSiteRequest $request)
    {
        $input = $request->all();

        $site = $this->siteRepository->create($input);

        Flash::success(__('models.sites.messages.saved', ['model' => __('models/sites.singular')]));

        return redirect(route('sites.index'));
    }

    /**
     * Display the specified Site.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $site = $this->siteRepository->find($id);

        if (empty($site)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sites.singular')]));

            return redirect(route('sites.index'));
        }

        return view('sites.show')->with('site', $site);
    }

    /**
     * Show the form for editing the specified Site.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $site = $this->siteRepository->find($id);

        if (empty($site)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sites.singular')]));

            return redirect(route('sites.index'));
        }

        return view('sites.edit')->with('site', $site);
    }

    /**
     * Update the specified Site in storage.
     *
     * @param  int              $id
     * @param UpdateSiteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSiteRequest $request)
    {
        $site = $this->siteRepository->find($id);

        if (empty($site)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sites.singular')]));

            return redirect(route('sites.index'));
        }

        $site = $this->siteRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/sites.singular')]));

        return redirect(route('sites.index'));
    }

    /**
     * Remove the specified Site from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $site = $this->siteRepository->find($id);

        if (empty($site)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sites.singular')]));

            return redirect(route('sites.index'));
        }

        $this->siteRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/sites.singular')]));

        return redirect(route('sites.index'));
    }
}

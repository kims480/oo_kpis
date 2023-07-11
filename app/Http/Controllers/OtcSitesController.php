<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createotc_sitesRequest;
use App\Http\Requests\Updateotc_sitesRequest;
use App\Repositories\otc_sitesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class OtcSitesController extends AppBaseController
{
    /** @var otc_sitesRepository $otcSitesRepository*/
    private $otcSitesRepository;

    public function __construct(otc_sitesRepository $otcSitesRepo)
    {
        $this->otcSitesRepository = $otcSitesRepo;
    }

    /**
     * Display a listing of the otc_sites.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $otcSites = $this->otcSitesRepository->all();

        return view('otc_sites.index')
            ->with('otcSites', $otcSites);
    }

    /**
     * Show the form for creating a new otc_sites.
     *
     * @return Response
     */
    public function create()
    {
        return view('otc_sites.create');
    }

    /**
     * Store a newly created otc_sites in storage.
     *
     * @param Createotc_sitesRequest $request
     *
     * @return Response
     */
    public function store(Createotc_sitesRequest $request)
    {
        $input = $request->all();

        $otcSites = $this->otcSitesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/otcSites.router')]));

        return redirect(route('otcSites.index'));
    }

    /**
     * Display the specified otc_sites.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $otcSites = $this->otcSitesRepository->find($id);

        if (empty($otcSites)) {
            Flash::error(__('messages.not_found', ['model' => __('models/otcSites.router')]));

            return redirect(route('otcSites.index'));
        }

        return view('otc_sites.show')->with('otcSites', $otcSites);
    }

    /**
     * Show the form for editing the specified otc_sites.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $otcSites = $this->otcSitesRepository->find($id);

        if (empty($otcSites)) {
            Flash::error(__('messages.not_found', ['model' => __('models/otcSites.router')]));

            return redirect(route('otcSites.index'));
        }

        return view('otc_sites.edit')->with('otcSites', $otcSites);
    }

    /**
     * Update the specified otc_sites in storage.
     *
     * @param int $id
     * @param Updateotc_sitesRequest $request
     *
     * @return Response
     */
    public function update($id, Updateotc_sitesRequest $request)
    {
        $otcSites = $this->otcSitesRepository->find($id);

        if (empty($otcSites)) {
            Flash::error(__('messages.not_found', ['model' => __('models/otcSites.router')]));

            return redirect(route('otcSites.index'));
        }

        $otcSites = $this->otcSitesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/otcSites.router')]));

        return redirect(route('otcSites.index'));
    }

    /**
     * Remove the specified otc_sites from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $otcSites = $this->otcSitesRepository->find($id);

        if (empty($otcSites)) {
            Flash::error(__('messages.not_found', ['model' => __('models/otcSites.router')]));

            return redirect(route('otcSites.index'));
        }

        $this->otcSitesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/otcSites.router')]));

        return redirect(route('otcSites.index'));
    }
}

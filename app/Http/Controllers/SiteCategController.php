<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSiteCategRequest;
use App\Http\Requests\UpdateSiteCategRequest;
use App\Repositories\SiteCategRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SiteCategController extends AppBaseController
{
    /** @var SiteCategRepository $siteCategRepository*/
    private $siteCategRepository;

    public function __construct(SiteCategRepository $siteCategRepo)
    {
        $this->siteCategRepository = $siteCategRepo;
    }

    /**
     * Display a listing of the SiteCateg.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $siteCategs = $this->siteCategRepository->paginate(10);

        return view('site_categs.index')
            ->with('siteCategs', $siteCategs);
    }

    /**
     * Show the form for creating a new SiteCateg.
     *
     * @return Response
     */
    public function create()
    {
        return view('site_categs.create');
    }

    /**
     * Store a newly created SiteCateg in storage.
     *
     * @param CreateSiteCategRequest $request
     *
     * @return Response
     */
    public function store(CreateSiteCategRequest $request)
    {
        $input = $request->all();

        $siteCateg = $this->siteCategRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/siteCategs.singular')]));

        return redirect(route('siteCategs.index'));
    }

    /**
     * Display the specified SiteCateg.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $siteCateg = $this->siteCategRepository->find($id);

        if (empty($siteCateg)) {
            Flash::error(__('messages.not_found', ['model' => __('models/siteCategs.singular')]));

            return redirect(route('siteCategs.index'));
        }

        return view('site_categs.show')->with('siteCateg', $siteCateg);
    }

    /**
     * Show the form for editing the specified SiteCateg.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $siteCateg = $this->siteCategRepository->find($id);

        if (empty($siteCateg)) {
            Flash::error(__('messages.not_found', ['model' => __('models/siteCategs.singular')]));

            return redirect(route('siteCategs.index'));
        }

        return view('site_categs.edit')->with('siteCateg', $siteCateg);
    }

    /**
     * Update the specified SiteCateg in storage.
     *
     * @param int $id
     * @param UpdateSiteCategRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSiteCategRequest $request)
    {
        $siteCateg = $this->siteCategRepository->find($id);

        if (empty($siteCateg)) {
            Flash::error(__('messages.not_found', ['model' => __('models/siteCategs.singular')]));

            return redirect(route('siteCategs.index'));
        }

        $siteCateg = $this->siteCategRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/siteCategs.singular')]));

        return redirect(route('siteCategs.index'));
    }

    /**
     * Remove the specified SiteCateg from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $siteCateg = $this->siteCategRepository->find($id);

        if (empty($siteCateg)) {
            Flash::error(__('messages.not_found', ['model' => __('models/siteCategs.singular')]));

            return redirect(route('siteCategs.index'));
        }

        $this->siteCategRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/siteCategs.singular')]));

        return redirect(route('siteCategs.index'));
    }
}

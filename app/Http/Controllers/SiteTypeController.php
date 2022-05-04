<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSiteTypeRequest;
use App\Http\Requests\UpdateSiteTypeRequest;
use App\Repositories\SiteTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SiteTypeController extends AppBaseController
{
    /** @var SiteTypeRepository $siteTypeRepository*/
    private $siteTypeRepository;

    public function __construct(SiteTypeRepository $siteTypeRepo)
    {
        $this->siteTypeRepository = $siteTypeRepo;
    }

    /**
     * Display a listing of the SiteType.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $siteTypes = $this->siteTypeRepository->paginate(10);

        return view('site_types.index')
            ->with('siteTypes', $siteTypes);
    }

    /**
     * Show the form for creating a new SiteType.
     *
     * @return Response
     */
    public function create()
    {
        return view('site_types.create');
    }

    /**
     * Store a newly created SiteType in storage.
     *
     * @param CreateSiteTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateSiteTypeRequest $request)
    {
        $input = $request->all();

        $siteType = $this->siteTypeRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/siteTypes.model')]));

        return redirect(route(__('models/siteTypes.url').'.index'));
    }

    /**
     * Display the specified SiteType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $siteType = $this->siteTypeRepository->find($id);

        if (empty($siteType)) {
            Flash::error(__('messages.not_found', ['model' => __('models/siteTypes.model')]));

            return redirect(route(__('models/siteTypes.url').'.index'));
        }

        return view('site_types.show')->with('siteType', $siteType);
    }

    /**
     * Show the form for editing the specified SiteType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $siteType = $this->siteTypeRepository->find($id);

        if (empty($siteType)) {
            Flash::error(__('messages.not_found', ['model' => __('models/siteTypes.model')]));

            return redirect(route(__('models/siteTypes.url').'.index'));
        }

        return view('site_types.edit')->with('siteType', $siteType);
    }

    /**
     * Update the specified SiteType in storage.
     *
     * @param int $id
     * @param UpdateSiteTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSiteTypeRequest $request)
    {
        $siteType = $this->siteTypeRepository->find($id);

        if (empty($siteType)) {
            Flash::error(__('messages.not_found', ['model' => __('models/siteTypes.model')]));

            return redirect(route(__('models/siteTypes.url').'.index'));
        }

        $siteType = $this->siteTypeRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/siteTypes.model')]));

        return redirect(route(__('models/siteTypes.url').'.index'));
    }

    /**
     * Remove the specified SiteType from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $siteType = $this->siteTypeRepository->find($id);

        if (empty($siteType)) {
            Flash::error(__('messages.not_found', ['model' => __('models/siteTypes.model')]));

            return redirect(route(__('models/siteTypes.url').'.index'));
        }

        $this->siteTypeRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/siteTypes.model')]));

        return redirect(route(__('models/siteTypes.url').'.index'));
    }
}

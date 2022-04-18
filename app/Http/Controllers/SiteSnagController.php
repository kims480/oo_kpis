<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSiteSnagRequest;
use App\Http\Requests\UpdateSiteSnagRequest;
use App\Repositories\SiteSnagRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Site;
use App\Models\SiteSnag;
use App\Models\Snag;
use App\Models\Snagd;
use App\Models\Snagmang;
use Illuminate\Http\Request;
use Flash;
use Response;

class SiteSnagController extends AppBaseController
{
    /** @var SiteSnagRepository $siteSnagRepository*/
    private $siteSnagRepository;

    public function __construct(SiteSnagRepository $siteSnagRepo)
    {
        $this->siteSnagRepository = $siteSnagRepo;
    }

    /**
     * Display a listing of the SiteSnag.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $siteSnags = SiteSnag::with(['site','snag','reportedBy','snagdomain','snagreporter','snagremark','snagstatus','snag_closed_by'])->paginate(10);



        return view('site_snags.index')
            ->with('siteSnags', $siteSnags);
    }

    /**
     * Show the form for creating a new SiteSnag.
     *
     * @return Response
     */
    public function create()
    {
        $SnagsList = Snag::all()->pluck('description','id');
        $SitesList = Site::all()->pluck('site_id','id');
        // $siteSnags = $this->siteSnagRepository->paginate(10);
        // dd($siteSnags);
        return view('site_snags.create',compact('SnagsList','SitesList'));
    }

    /**
     * Store a newly created SiteSnag in storage.
     *
     * @param CreateSiteSnagRequest $request
     *
     * @return Response
     */
    public function store(CreateSiteSnagRequest $request)
    {
        $input = $request->all();

        $siteSnag = $this->siteSnagRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/siteSnags.singular')]));

        return redirect(route('siteSnags.index'));
    }

    /**
     * Display the specified SiteSnag.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $siteSnag = $this->siteSnagRepository->find($id);

        if (empty($siteSnag)) {
            Flash::error(__('messages.not_found', ['model' => __('models/siteSnags.singular')]));

            return redirect(route('siteSnags.index'));
        }

        return view('site_snags.show')->with('siteSnag', $siteSnag);
    }

    /**
     * Show the form for editing the specified SiteSnag.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $siteSnag = $this->siteSnagRepository->find($id);

        if (empty($siteSnag)) {
            Flash::error(__('messages.not_found', ['model' => __('models/siteSnags.singular')]));

            return redirect(route('siteSnags.index'));
        }

        return view('site_snags.edit')->with('siteSnag', $siteSnag);
    }

    /**
     * Update the specified SiteSnag in storage.
     *
     * @param int $id
     * @param UpdateSiteSnagRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSiteSnagRequest $request)
    {
        $siteSnag = $this->siteSnagRepository->find($id);

        if (empty($siteSnag)) {
            Flash::error(__('messages.not_found', ['model' => __('models/siteSnags.singular')]));

            return redirect(route('siteSnags.index'));
        }

        $siteSnag = $this->siteSnagRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/siteSnags.singular')]));

        return redirect(route('siteSnags.index'));
    }

    /**
     * Remove the specified SiteSnag from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $siteSnag = $this->siteSnagRepository->find($id);

        if (empty($siteSnag)) {
            Flash::error(__('messages.not_found', ['model' => __('models/siteSnags.singular')]));

            return redirect(route('siteSnags.index'));
        }

        $this->siteSnagRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/siteSnags.singular')]));

        return redirect(route('siteSnags.index'));
    }
}

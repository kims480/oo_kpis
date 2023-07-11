<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOtcCategRequest;
use App\Http\Requests\UpdateOtcCategRequest;
use App\Repositories\OtcCategRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class OtcCategController extends AppBaseController
{
    /** @var OtcCategRepository $otcCategRepository*/
    private $otcCategRepository;

    public function __construct(OtcCategRepository $otcCategRepo)
    {
        $this->otcCategRepository = $otcCategRepo;
    }

    /**
     * Display a listing of the OtcCateg.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $otcCategs = $this->otcCategRepository->paginate(10);

        return view('otc_categs.index')
            ->with('otcCategs', $otcCategs);
    }

    /**
     * Show the form for creating a new OtcCateg.
     *
     * @return Response
     */
    public function create()
    {
        return view('otc_categs.create');
    }

    /**
     * Store a newly created OtcCateg in storage.
     *
     * @param CreateOtcCategRequest $request
     *
     * @return Response
     */
    public function store(CreateOtcCategRequest $request)
    {
        $input = $request->all();

        $otcCateg = $this->otcCategRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/otcCategs.singular')]));

        return redirect(route('otcCategs.index'));
    }

    /**
     * Display the specified OtcCateg.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $otcCateg = $this->otcCategRepository->find($id);

        if (empty($otcCateg)) {
            Flash::error(__('messages.not_found', ['model' => __('models/otcCategs.singular')]));

            return redirect(route('otcCategs.index'));
        }

        return view('otc_categs.show')->with('otcCateg', $otcCateg);
    }

    /**
     * Show the form for editing the specified OtcCateg.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $otcCateg = $this->otcCategRepository->find($id);

        if (empty($otcCateg)) {
            Flash::error(__('messages.not_found', ['model' => __('models/otcCategs.singular')]));

            return redirect(route('otcCategs.index'));
        }

        return view('otc_categs.edit')->with('otcCateg', $otcCateg);
    }

    /**
     * Update the specified OtcCateg in storage.
     *
     * @param int $id
     * @param UpdateOtcCategRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOtcCategRequest $request)
    {
        $otcCateg = $this->otcCategRepository->find($id);

        if (empty($otcCateg)) {
            Flash::error(__('messages.not_found', ['model' => __('models/otcCategs.singular')]));

            return redirect(route('otcCategs.index'));
        }

        $otcCateg = $this->otcCategRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/otcCategs.singular')]));

        return redirect(route('otcCategs.index'));
    }

    /**
     * Remove the specified OtcCateg from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $otcCateg = $this->otcCategRepository->find($id);

        if (empty($otcCateg)) {
            Flash::error(__('messages.not_found', ['model' => __('models/otcCategs.singular')]));

            return redirect(route('otcCategs.index'));
        }

        $this->otcCategRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/otcCategs.singular')]));

        return redirect(route('otcCategs.index'));
    }
}

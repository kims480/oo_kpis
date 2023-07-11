<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOtcScopeRequest;
use App\Http\Requests\UpdateOtcScopeRequest;
use App\Repositories\OtcScopeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class OtcScopeController extends AppBaseController
{
    /** @var OtcScopeRepository $otcScopeRepository*/
    private $otcScopeRepository;

    public function __construct(OtcScopeRepository $otcScopeRepo)
    {
        $this->otcScopeRepository = $otcScopeRepo;
    }

    /**
     * Display a listing of the OtcScope.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $otcScopes = $this->otcScopeRepository->paginate(10);

        return view('otc_scopes.index')
            ->with('otcScopes', $otcScopes);
    }

    /**
     * Show the form for creating a new OtcScope.
     *
     * @return Response
     */
    public function create()
    {
        return view('otc_scopes.create');
    }

    /**
     * Store a newly created OtcScope in storage.
     *
     * @param CreateOtcScopeRequest $request
     *
     * @return Response
     */
    public function store(CreateOtcScopeRequest $request)
    {
        $input = $request->all();

        $otcScope = $this->otcScopeRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/otcScopes.singular')]));

        return redirect(route('otcScopes.index'));
    }

    /**
     * Display the specified OtcScope.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $otcScope = $this->otcScopeRepository->find($id);

        if (empty($otcScope)) {
            Flash::error(__('messages.not_found', ['model' => __('models/otcScopes.singular')]));

            return redirect(route('otcScopes.index'));
        }

        return view('otc_scopes.show')->with('otcScope', $otcScope);
    }

    /**
     * Show the form for editing the specified OtcScope.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $otcScope = $this->otcScopeRepository->find($id);

        if (empty($otcScope)) {
            Flash::error(__('messages.not_found', ['model' => __('models/otcScopes.singular')]));

            return redirect(route('otcScopes.index'));
        }

        return view('otc_scopes.edit')->with('otcScope', $otcScope);
    }

    /**
     * Update the specified OtcScope in storage.
     *
     * @param int $id
     * @param UpdateOtcScopeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOtcScopeRequest $request)
    {
        $otcScope = $this->otcScopeRepository->find($id);

        if (empty($otcScope)) {
            Flash::error(__('messages.not_found', ['model' => __('models/otcScopes.singular')]));

            return redirect(route('otcScopes.index'));
        }

        $otcScope = $this->otcScopeRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/otcScopes.singular')]));

        return redirect(route('otcScopes.index'));
    }

    /**
     * Remove the specified OtcScope from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $otcScope = $this->otcScopeRepository->find($id);

        if (empty($otcScope)) {
            Flash::error(__('messages.not_found', ['model' => __('models/otcScopes.singular')]));

            return redirect(route('otcScopes.index'));
        }

        $this->otcScopeRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/otcScopes.singular')]));

        return redirect(route('otcScopes.index'));
    }
}

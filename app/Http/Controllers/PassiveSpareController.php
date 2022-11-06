<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePassiveSpareRequest;
use App\Http\Requests\UpdatePassiveSpareRequest;
use App\Repositories\PassiveSpareRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PassiveSpareController extends AppBaseController
{
    /** @var PassiveSpareRepository $passiveSpareRepository*/
    private $passiveSpareRepository;

    public function __construct(PassiveSpareRepository $passiveSpareRepo)
    {
        $this->passiveSpareRepository = $passiveSpareRepo;
    }

    /**
     * Display a listing of the PassiveSpare.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $passiveSpares = $this->passiveSpareRepository->paginate(10);

        return view('passive_spares.index')
            ->with('passiveSpares', $passiveSpares);
    }

    /**
     * Show the form for creating a new PassiveSpare.
     *
     * @return Response
     */
    public function create()
    {
        return view('passive_spares.create');
    }

    /**
     * Store a newly created PassiveSpare in storage.
     *
     * @param CreatePassiveSpareRequest $request
     *
     * @return Response
     */
    public function store(CreatePassiveSpareRequest $request)
    {
        $input = $request->all();

        $passiveSpare = $this->passiveSpareRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/passiveSpares.singular')]));

        return redirect(route('passiveSpares.index'));
    }

    /**
     * Display the specified PassiveSpare.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $passiveSpare = $this->passiveSpareRepository->find($id);

        if (empty($passiveSpare)) {
            Flash::error(__('messages.not_found', ['model' => __('models/passiveSpares.singular')]));

            return redirect(route('passiveSpares.index'));
        }

        return view('passive_spares.show')->with('passiveSpare', $passiveSpare);
    }

    /**
     * Show the form for editing the specified PassiveSpare.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $passiveSpare = $this->passiveSpareRepository->find($id);

        if (empty($passiveSpare)) {
            Flash::error(__('messages.not_found', ['model' => __('models/passiveSpares.singular')]));

            return redirect(route('passiveSpares.index'));
        }

        return view('passive_spares.edit')->with('passiveSpare', $passiveSpare);
    }

    /**
     * Update the specified PassiveSpare in storage.
     *
     * @param int $id
     * @param UpdatePassiveSpareRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePassiveSpareRequest $request)
    {
        $passiveSpare = $this->passiveSpareRepository->find($id);

        if (empty($passiveSpare)) {
            Flash::error(__('messages.not_found', ['model' => __('models/passiveSpares.singular')]));

            return redirect(route('passiveSpares.index'));
        }

        $passiveSpare = $this->passiveSpareRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/passiveSpares.singular')]));

        return redirect(route('passiveSpares.index'));
    }

    /**
     * Remove the specified PassiveSpare from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $passiveSpare = $this->passiveSpareRepository->find($id);

        if (empty($passiveSpare)) {
            Flash::error(__('messages.not_found', ['model' => __('models/passiveSpares.singular')]));

            return redirect(route('passiveSpares.index'));
        }

        $this->passiveSpareRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/passiveSpares.singular')]));

        return redirect(route('passiveSpares.index'));
    }
}

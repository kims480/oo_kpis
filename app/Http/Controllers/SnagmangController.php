<?php

namespace App\Http\Controllers;

use App\DataTables\SnagmangDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSnagmangRequest;
use App\Http\Requests\UpdateSnagmangRequest;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Repositories\SnagRepository;
use Response;

class SnagmangController extends AppBaseController
{
    /** @var snagRepository $snagRepository*/
    private $snagRepository;

    public function __construct(SnagRepository $snagRepo)
    {
        $this->snagRepository = $snagRepo;
    }

    /**
     * Display a listing of the Snagmang.
     *
     * @param SnagmangDataTable $snagmangDataTable
     *
     * @return Response
     */
    public function index(SnagDataTable $snagDataTable)
    {
        return $snagDataTable->render('snagmangs.index');
    }

    /**
     * Show the form for creating a new Snagmang.
     *
     * @return Response
     */
    public function create()
    {
        return view('snagmangs.create');
    }

    /**
     * Store a newly created Snagmang in storage.
     *
     * @param CreateSnagmangRequest $request
     *
     * @return Response
     */
    public function store(CreateSnagmangRequest $request)
    {
        $input = $request->all();

        $snagmang = $this->snagRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/snagmangs.singular')]));

        return redirect(route('snagmangs.index'));
    }

    /**
     * Display the specified Snagmang.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $snagmang = $this->snagRepository->find($id);

        if (empty($snagmang)) {
            Flash::error(__('messages.not_found', ['model' => __('models/snagmangs.singular')]));

            return redirect(route('snagmangs.index'));
        }

        return view('snagmangs.show')->with('snagmang', $snagmang);
    }

    /**
     * Show the form for editing the specified Snagmang.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $snagmang = $this->snagRepository->find($id);

        if (empty($snagmang)) {
            Flash::error(__('messages.not_found', ['model' => __('models/snagmangs.singular')]));

            return redirect(route('snagmangs.index'));
        }

        return view('snagmangs.edit')->with('snagmang', $snagmang);
    }

    /**
     * Update the specified Snagmang in storage.
     *
     * @param int $id
     * @param UpdateSnagmangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSnagmangRequest $request)
    {
        $snagmang = $this->snagRepository->find($id);

        if (empty($snagmang)) {
            Flash::error(__('messages.not_found', ['model' => __('models/snagmangs.singular')]));

            return redirect(route('snagmangs.index'));
        }

        $snagmang = $this->snagRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/snagmangs.singular')]));

        return redirect(route('snagmangs.index'));
    }

    /**
     * Remove the specified Snagmang from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $snagmang = $this->snagRepository->find($id);

        if (empty($snagmang)) {
            Flash::error(__('messages.not_found', ['model' => __('models/snagmangs.singular')]));

            return redirect(route('snagmangs.index'));
        }

        $this->snagRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/snagmangs.singular')]));

        return redirect(route('snagmangs.index'));
    }
}

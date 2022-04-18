<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWilayatRequest;
use App\Http\Requests\UpdateWilayatRequest;
use App\Repositories\WilayatRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Govern;
use Illuminate\Http\Request;
use Flash;
use Response;

class WilayatController extends AppBaseController
{
    /** @var  WilayatRepository */
    private $wilayatRepository;

    public function __construct(WilayatRepository $wilayatRepo)
    {
        $this->wilayatRepository = $wilayatRepo;
    }

    /**
     * Display a listing of the Wilayat.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // $wilayats = $this->wilayatRepository->all(['govern'])->sortBy(['govern.name','ASC']);

        return view('wilayats.index');
            // ->with('wilayats', $wilayats);
    }

    /**
     * Show the form for creating a new Wilayat.
     *
     * @return Response
     */
    public function create()
    {
        $governs=Govern::orderBy('name')->pluck('name','id');
            // ->get()
            // ->flatMap(function($govern){
            //     return
            //         array_map('strtoupper', $govern);

            // })->all();
            // dump($governs);
        return view('wilayats.create',['governs'=>$governs]);
    }

    /**
     * Store a newly created Wilayat in storage.
     *
     * @param CreateWilayatRequest $request
     *
     * @return Response
     */
    public function store(CreateWilayatRequest $request)
    {
        $input = $request->all();
        // dd($input);

        $wilayat = $this->wilayatRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/wilayats.singular')]));

        return redirect(route('wilayats.index'));
    }

    /**
     * Display the specified Wilayat.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $wilayat = $this->wilayatRepository->find($id);

        if (empty($wilayat)) {
            Flash::error(__('messages.not_found', ['model' => __('models/wilayats.singular')]));

            return redirect(route('wilayats.index'));
        }

        return view('wilayats.show')->with('wilayat', $wilayat);
    }

    /**
     * Show the form for editing the specified Wilayat.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $governs=Govern::orderBy('name')->pluck('name','id');
        $wilayat = $this->wilayatRepository->find($id);

        if (empty($wilayat)) {
            Flash::error(__('messages.not_found', ['model' => __('models/wilayats.singular')]));

            return redirect(route('wilayats.index'));
        }

        return view('wilayats.edit',['wilayat'=>$wilayat,'governs'=>$governs]);
    }

    /**
     * Update the specified Wilayat in storage.
     *
     * @param int $id
     * @param UpdateWilayatRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWilayatRequest $request)
    {
        $wilayat = $this->wilayatRepository->find($id);

        if (empty($wilayat)) {
            Flash::error(__('messages.not_found', ['model' => __('models/wilayats.singular')]));

            return redirect(route('wilayats.index'));
        }

        $wilayat = $this->wilayatRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/wilayats.singular')]));

        return redirect(route('wilayats.index'));
    }

    /**
     * Remove the specified Wilayat from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $wilayat = $this->wilayatRepository->find($id);

        if (empty($wilayat)) {
            Flash::error(__('messages.not_found', ['model' => __('models/wilayats.singular')]));

            return redirect(route('wilayats.index'));
        }

        $this->wilayatRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/wilayats.singular')]));

        return redirect(route('wilayats.index'));
    }
}

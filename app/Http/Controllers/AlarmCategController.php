<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAlarmCategRequest;
use App\Http\Requests\UpdateAlarmCategRequest;
use App\Repositories\AlarmCategRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AlarmCategController extends AppBaseController
{
    /** @var AlarmCategRepository $alarmCategRepository*/
    private $alarmCategRepository;

    public function __construct(AlarmCategRepository $alarmCategRepo)
    {
        $this->alarmCategRepository = $alarmCategRepo;
    }

    /**
     * Display a listing of the AlarmCateg.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $alarmCategs = $this->alarmCategRepository->paginate(10);

        return view('alarm_categs.index')
            ->with('alarmCategs', $alarmCategs);
    }

    /**
     * Show the form for creating a new AlarmCateg.
     *
     * @return Response
     */
    public function create()
    {
        return view('alarm_categs.create');
    }

    /**
     * Store a newly created AlarmCateg in storage.
     *
     * @param CreateAlarmCategRequest $request
     *
     * @return Response
     */
    public function store(CreateAlarmCategRequest $request)
    {
        $input = $request->all();

        $alarmCateg = $this->alarmCategRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/alarmCategs.singular')]));

        return redirect(route('alarmCategs.index'));
    }

    /**
     * Display the specified AlarmCateg.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $alarmCateg = $this->alarmCategRepository->find($id);

        if (empty($alarmCateg)) {
            Flash::error(__('messages.not_found', ['model' => __('models/alarmCategs.singular')]));

            return redirect(route('alarmCategs.index'));
        }

        return view('alarm_categs.show')->with('alarmCateg', $alarmCateg);
    }

    /**
     * Show the form for editing the specified AlarmCateg.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $alarmCateg = $this->alarmCategRepository->find($id);

        if (empty($alarmCateg)) {
            Flash::error(__('messages.not_found', ['model' => __('models/alarmCategs.singular')]));

            return redirect(route('alarmCategs.index'));
        }

        return view('alarm_categs.edit')->with('alarmCateg', $alarmCateg);
    }

    /**
     * Update the specified AlarmCateg in storage.
     *
     * @param int $id
     * @param UpdateAlarmCategRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAlarmCategRequest $request)
    {
        $alarmCateg = $this->alarmCategRepository->find($id);

        if (empty($alarmCateg)) {
            Flash::error(__('messages.not_found', ['model' => __('models/alarmCategs.singular')]));

            return redirect(route('alarmCategs.index'));
        }

        $alarmCateg = $this->alarmCategRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/alarmCategs.singular')]));

        return redirect(route('alarmCategs.index'));
    }

    /**
     * Remove the specified AlarmCateg from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $alarmCateg = $this->alarmCategRepository->find($id);

        if (empty($alarmCateg)) {
            Flash::error(__('messages.not_found', ['model' => __('models/alarmCategs.singular')]));

            return redirect(route('alarmCategs.index'));
        }

        $this->alarmCategRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/alarmCategs.singular')]));

        return redirect(route('alarmCategs.index'));
    }
}

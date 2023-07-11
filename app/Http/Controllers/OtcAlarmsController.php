<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOtcAlarmsRequest;
use App\Http\Requests\UpdateOtcAlarmsRequest;
use App\Repositories\OtcAlarmsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class OtcAlarmsController extends AppBaseController
{
    /** @var OtcAlarmsRepository $otcAlarmsRepository*/
    private $otcAlarmsRepository;

    public function __construct(OtcAlarmsRepository $otcAlarmsRepo)
    {
        $this->otcAlarmsRepository = $otcAlarmsRepo;
    }

    /**
     * Display a listing of the OtcAlarms.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $otcAlarms = $this->otcAlarmsRepository->paginate(10);

        return view('otc_alarms.index')
            ->with('otcAlarms', $otcAlarms);
    }

    /**
     * Show the form for creating a new OtcAlarms.
     *
     * @return Response
     */
    public function create()
    {
        return view('otc_alarms.create');
    }

    /**
     * Store a newly created OtcAlarms in storage.
     *
     * @param CreateOtcAlarmsRequest $request
     *
     * @return Response
     */
    public function store(CreateOtcAlarmsRequest $request)
    {
        $input = $request->all();

        $otcAlarms = $this->otcAlarmsRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/otcAlarms.singular')]));

        return redirect(route('otcAlarms.index'));
    }

    /**
     * Display the specified OtcAlarms.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $otcAlarms = $this->otcAlarmsRepository->find($id);

        if (empty($otcAlarms)) {
            Flash::error(__('messages.not_found', ['model' => __('models/otcAlarms.singular')]));

            return redirect(route('otcAlarms.index'));
        }

        return view('otc_alarms.show')->with('otcAlarms', $otcAlarms);
    }

    /**
     * Show the form for editing the specified OtcAlarms.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $otcAlarms = $this->otcAlarmsRepository->find($id);

        if (empty($otcAlarms)) {
            Flash::error(__('messages.not_found', ['model' => __('models/otcAlarms.singular')]));

            return redirect(route('otcAlarms.index'));
        }

        return view('otc_alarms.edit')->with('otcAlarms', $otcAlarms);
    }

    /**
     * Update the specified OtcAlarms in storage.
     *
     * @param int $id
     * @param UpdateOtcAlarmsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOtcAlarmsRequest $request)
    {
        $otcAlarms = $this->otcAlarmsRepository->find($id);

        if (empty($otcAlarms)) {
            Flash::error(__('messages.not_found', ['model' => __('models/otcAlarms.singular')]));

            return redirect(route('otcAlarms.index'));
        }

        $otcAlarms = $this->otcAlarmsRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/otcAlarms.singular')]));

        return redirect(route('otcAlarms.index'));
    }

    /**
     * Remove the specified OtcAlarms from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $otcAlarms = $this->otcAlarmsRepository->find($id);

        if (empty($otcAlarms)) {
            Flash::error(__('messages.not_found', ['model' => __('models/otcAlarms.singular')]));

            return redirect(route('otcAlarms.index'));
        }

        $this->otcAlarmsRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/otcAlarms.singular')]));

        return redirect(route('otcAlarms.index'));
    }
}

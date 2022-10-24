<?php

namespace App\Http\Controllers;

use App\DataTables\BatteryAddDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBatteryAddRequest;
use App\Http\Requests\UpdateBatteryAddRequest;
use App\Repositories\BatteryAddRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BatteryAddController extends AppBaseController
{
    /** @var BatteryAddRepository $batteryAddRepository*/
    private $batteryAddRepository;

    public function __construct(BatteryAddRepository $batteryAddRepo)
    {
        $this->batteryAddRepository = $batteryAddRepo;
    }

    /**
     * Display a listing of the BatteryAdd.
     *
     * @param BatteryAddDataTable $batteryAddDataTable
     *
     * @return Response
     */
    public function index(BatteryAddDataTable $batteryAddDataTable)
    {
        return $batteryAddDataTable->render('battery_adds.index');
    }

    /**
     * Show the form for creating a new BatteryAdd.
     *
     * @return Response
     */
    public function create()
    {
        return view('battery_adds.create');
    }

    /**
     * Store a newly created BatteryAdd in storage.
     *
     * @param CreateBatteryAddRequest $request
     *
     * @return Response
     */
    public function store(CreateBatteryAddRequest $request)
    {
        $input = $request->all();

        $batteryAdd = $this->batteryAddRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/batteryAdds.singular')]));

        return redirect(route('batteryAdds.index'));
    }

    /**
     * Display the specified BatteryAdd.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $batteryAdd = $this->batteryAddRepository->find($id);

        if (empty($batteryAdd)) {
            Flash::error(__('messages.not_found', ['model' => __('models/batteryAdds.singular')]));

            return redirect(route('batteryAdds.index'));
        }

        return view('battery_adds.show')->with('batteryAdd', $batteryAdd);
    }

    /**
     * Show the form for editing the specified BatteryAdd.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $batteryAdd = $this->batteryAddRepository->find($id);

        if (empty($batteryAdd)) {
            Flash::error(__('messages.not_found', ['model' => __('models/batteryAdds.singular')]));

            return redirect(route('batteryAdds.index'));
        }

        return view('battery_adds.edit')->with('batteryAdd', $batteryAdd);
    }

    /**
     * Update the specified BatteryAdd in storage.
     *
     * @param int $id
     * @param UpdateBatteryAddRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBatteryAddRequest $request)
    {
        $batteryAdd = $this->batteryAddRepository->find($id);

        if (empty($batteryAdd)) {
            Flash::error(__('messages.not_found', ['model' => __('models/batteryAdds.singular')]));

            return redirect(route('batteryAdds.index'));
        }

        $batteryAdd = $this->batteryAddRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/batteryAdds.singular')]));

        return redirect(route('batteryAdds.index'));
    }

    /**
     * Remove the specified BatteryAdd from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $batteryAdd = $this->batteryAddRepository->find($id);

        if (empty($batteryAdd)) {
            Flash::error(__('messages.not_found', ['model' => __('models/batteryAdds.singular')]));

            return redirect(route('batteryAdds.index'));
        }

        $this->batteryAddRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/batteryAdds.singular')]));

        return redirect(route('batteryAdds.index'));
    }
}

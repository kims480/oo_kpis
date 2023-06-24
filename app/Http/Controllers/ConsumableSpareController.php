<?php

namespace App\Http\Controllers;

use App\Models\ConsumableSpare;
use App\Http\Requests\StoreConsumableSpareRequest;
use App\Http\Requests\UpdateConsumableSpareRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ConsumableSpareRepository;
use Illuminate\Http\Request;
use Flash;
use Response;

class ConsumableSpareController extends AppBaseController
{
     /** @var consumableSpareRepository $consumableSpareRepository*/
     private $consumableSpareRepository;

     public function __construct(ConsumableSpareRepository $consumableSpareRepo)
     {
         $this->consumableSpareRepository = $consumableSpareRepo;
     }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny',ConsumableSpare::class);
        $consumableSpares = $this->consumableSpareRepository->paginate(10);

        return view('consumable_spares.index')
            ->with('consumableSpares', $consumableSpares);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('consumable_spares.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreConsumableSpareRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConsumableSpareRequest $request)
    {
        $input = $request->all();

        $consumableSpare = $this->consumableSpareRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/consumableSpares.singular')]));

        return redirect(route(__('models/consumableSpares.route').'.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConsumableSpare  $consumableSpare
     * @return \Illuminate\Http\Response
     */
    public function show(ConsumableSpare $consumableSpare)
    {
        $consumableSpare = $this->consumableSpareRepository->find($id);

        if (empty($consumableSpare)) {
            Flash::error(__('messages.not_found', ['model' => __('models/consumableSpares.singular')]));

            return redirect(route(__('models/consumableSpares.route').'.index'));
        }

        return view('consumable_spares.show')->with('consumableSpare', $consumableSpare);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConsumableSpare  $consumableSpare
     * @return \Illuminate\Http\Response
     */
    public function edit(ConsumableSpare $consumableSpare)
    {
        $consumableSpare = $this->consumableSpareRepository->find($consumableSpare->id);

        if (empty($consumableSpare)) {
            Flash::error(__('messages.not_found', ['model' => __('models/consumableSpares.singular')]));

            return redirect(route(__('models/consumableSpares.route').'.index'));
        }

        return view('consumable_spares.edit')->with('consumableSpare', $consumableSpare);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateConsumableSpareRequest  $request
     * @param  \App\Models\ConsumableSpare  $consumableSpare
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConsumableSpareRequest $request, ConsumableSpare $consumableSpare)
    {
        $consumableSpare = $this->consumableSpareRepository->find($consumableSpare->id);

        if (empty($consumableSpare)) {
            Flash::error(__('messages.not_found', ['model' => __('models/consumableSpares.singular')]));

            return redirect(route(__('models/consumableSpares.route').'.index'));
        }

        $consumableSpare = $this->consumableSpareRepository->update($request->all(), $consumableSpare->id);

        Flash::success(__('messages.updated', ['model' => __('models/consumableSpares.singular')]));

        return redirect(route(__('models/consumableSpares.route').'.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConsumableSpare  $consumableSpare
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConsumableSpare $consumableSpare)
    {
        $passiveSpare = $this->consumableSpareRepository->find($consumableSpare->id);

        if (empty($passiveSpare)) {
            Flash::error(__('messages.not_found', ['model' => __('models/consumableSpares.route')]));

            return redirect(route('passiveSpares.index'));
        }

        $this->consumableSpareRepository->delete($consumableSpare->id);

        Flash::success(__('messages.deleted', ['model' => __('models/consumableSpares.route')]));

        return redirect(route(__('models/consumableSpares.route').'.index'));

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ConsumableMove;
use App\Http\Requests\StoreConsumableMoveRequest;
use App\Http\Requests\UpdateConsumableMoveRequest;

class ConsumableMoveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreConsumableMoveRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConsumableMoveRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConsumableMove  $consumableMove
     * @return \Illuminate\Http\Response
     */
    public function show(ConsumableMove $consumableMove)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConsumableMove  $consumableMove
     * @return \Illuminate\Http\Response
     */
    public function edit(ConsumableMove $consumableMove)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateConsumableMoveRequest  $request
     * @param  \App\Models\ConsumableMove  $consumableMove
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConsumableMoveRequest $request, ConsumableMove $consumableMove)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConsumableMove  $consumableMove
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConsumableMove $consumableMove)
    {
        //
    }
}

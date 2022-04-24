<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Http\Requests\StoreAssetRequest;
use App\Http\Requests\UpdateAssetRequest;
use Laracasts\Flash\Flash;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $assets=Asset::all();
        return view('assets.index')->with('assets',$assets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('assets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAssetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssetRequest $request)
    {
        $input = $request->only('name');

        $asset = Asset::create($input);

        Flash::success(__('Asset Added Successfully', ['model' => __('models/assets.singular')]));

        return redirect(route('assets.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        if (empty($asset)) {
            Flash::error(__('The required Asset is not found', ['model' => __('models/assets.singular')]));

            return redirect(route('assets.index'));
        }
        return view('assets.edit')->with('asset',$asset);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAssetRequest  $request
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAssetRequest $request, Asset $asset)
    {
        if (empty($asset)) {
            Flash::error(__('The required Asset is not found', ['model' => __('models/assets.singular')]));

            return redirect(route('assets.index'));
        }
        // dump($asset);
        $asset->name=$request->name;

        $asset->save();
        Flash::success(__('Asset Saved Successfully', ['model' => __('models/assets.singular')]));

        return redirect(route('assets.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset $asset)
    {
        // $office = Asset::find($id);

        if (empty($asset)) {
            Flash::error(__('The required Asset is not found', ['model' => __('models/assets.singular')]));

            return redirect(route('assets.index'));
        }

        $asset->delete($asset->id);

        Flash::success(__('Asset deleted', ['model' => __('models/assets.singular')]));

        return redirect(route('assets.index'));
    }
}

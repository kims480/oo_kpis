<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\SiteAccess;
use Illuminate\Http\Request;

class SiteAccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SitesList = Site::select('id', 'site_id')->get()->pluck('site_id', 'id');
        // $ContractorsList = Contractor::select('id', 'name')->get()->pluck('name', 'id');
        // $AlarmsList = OtcAlarms::select('id', 'name')->get()->pluck('name', 'id');




        return view('site_access.index', compact('SitesList'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site_access.list_view');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SiteAccess  $siteAccess
     * @return \Illuminate\Http\Response
     */
    public function show(SiteAccess $siteAccess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SiteAccess  $siteAccess
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteAccess $siteAccess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SiteAccess  $siteAccess
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SiteAccess $siteAccess)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SiteAccess  $siteAccess
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteAccess $siteAccess)
    {
        //
    }
}

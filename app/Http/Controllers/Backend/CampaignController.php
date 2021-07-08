<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaigns = Campaign::latest()->get();
        return view('backend.campaigns.index',compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $volunteers = Volunteer::where('status',1)->get();
        return view('backend.campaigns.create',compact('volunteers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required',
            'status' => 'required',
            'date' => 'date|required',
            'volunteer_id' => 'required',
        ]);
        //dd($request->all());
        $campaign = Campaign::create([
            'name'      => $request->get('name'),
            'date'      => $request->get('date'),
            'address'      => $request->get('address'),
            'status'      => $request->get('status'),
            'volunteer_id'      => $request->get('volunteer_id'),
        ]);
        return redirect()->route('volunteer-campaign.index')->with('success', 'Campaign Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campaign = Campaign::find($id);
        $volunteers = Volunteer::all();
        return view('backend.campaigns.edit',compact('volunteers','campaign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required',
            'status' => 'required',
            'date' => 'date|required',
            'volunteer_id' => 'required',
        ]);
        //dd($request->all());
        $campaign = Campaign::find($id);
        $campaign->update([
            'name'      => $request->get('name'),
            'date'      => $request->get('date'),
            'address'      => $request->get('address'),
            'status'      => $request->get('status'),
            'volunteer_id'      => $request->get('volunteer_id'),
        ]);
        return redirect()->route('volunteer-campaign.index')->with('success', 'Campaign Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campaign = Campaign::find($id);
        $campaign->delete();
        return redirect()->route('volunteer-campaign.index')->with('success', 'Campaign Deleted Successfully');
    }
}

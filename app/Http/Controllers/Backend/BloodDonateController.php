<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blood;
use App\Models\BloodDonate;
use App\Models\Donor;
use Illuminate\Http\Request;

class BloodDonateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donates = BloodDonate::all();
        return view('backend.donates.index',compact('donates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bloods = Blood::all();
        $donors = Donor::all();
        return view('backend.donates.create',compact('bloods','donors'));
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
            'donate_date' => 'date|required',
            'donate_before' => 'required',
            'blood'       => 'required',
            'donor'       => 'required',
        ]);
        //dd($request->all());
        $bloodDonate = BloodDonate::create([
            'name'      => $request->get('name'),
            'donate_date'      => $request->get('donate_date'),
            'donate_before'      => $request->get('donate_before'),
            'blood_id'      => $request->get('blood'),
            'donor_id'      => $request->get('donor'),
        ]);
        return redirect()->route('blood-donate.index')->with('success', 'BloodDonate Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BloodDonate  $bloodDonate
     * @return \Illuminate\Http\Response
     */
    public function show(BloodDonate $bloodDonate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BloodDonate  $bloodDonate
     * @return \Illuminate\Http\Response
     */
    public function edit(BloodDonate $bloodDonate)
    {
        $bloodDonate = BloodDonate::find($bloodDonate->id);
        $bloods = Blood::all();
        $donors = Donor::all();
        return view('backend.donates.edit',compact('bloods','donors','bloodDonate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BloodDonate  $bloodDonate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BloodDonate $bloodDonate)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'donate_date' => 'date|required',
            'donate_before' => 'required',
            'blood'       => 'required',
            'donor'       => 'required',
        ]);

        $bloodDonate = BloodDonate::find($bloodDonate->id);
        $bloodDonate->update([
            'name'      => $request->get('name'),
            'donate_date'      => $request->get('donate_date'),
            'donate_before'      => $request->get('donate_before'),
            'blood_id'      => $request->get('blood'),
            'donor_id'      => $request->get('donor'),
        ]);
        return redirect()->route('blood-donate.index')->with('success', 'BloodDonate Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BloodDonate  $bloodDonate
     * @return \Illuminate\Http\Response
     */
    public function destroy(BloodDonate $bloodDonate)
    {
        $bloodDonate = BloodDonate::find($bloodDonate->id);
        $bloodDonate->delete();
        return redirect()->route('blood-donate.index')->with('success', 'BloodDonate Deleted Successfully');
    }
}

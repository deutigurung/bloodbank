<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use App\Models\Location;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donors = Donor::latest()->get();
        return view('backend.donors.index',compact('donors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::get();
        return view('backend.donors.create',compact('locations'));
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
            'permanent_address' => 'required|string|max:255',
            'temporary_address' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string', 'min:8',
            'dob' => 'required',
            'age' => 'nullable',
            'gender' => 'required',
            'phone' => 'required|unique:users',
            'father_name' => 'nullable',
            'mother_name' => 'nullable',
            'blood_group' => 'required',
            'location' => 'required',
            'martial_status' => 'required',
            'image' => 'nullable',
        ]);
        //dd($request->all());
        $user = User::create([
            'name'  => $request->get('name'),
            'address'         => $request->get('permanent_address'),
            'email'       => $request->get('email'),
            'password'    => Hash::make($request->get('password')),
            'dob'      => $request->get('dob'),
            'age'      => $request->get('age'),
            'phone'      => $request->get('phone'),
            'gender'      => $request->get('gender'),
        ]);

        $donor = Donor::create([
            'permanent_address'      => $request->get('permanent_address'),
            'temporary_address'      => $request->get('temporary_address'),
            'father_name'      => $request->get('father_name'),
            'mother_name'      => $request->get('mother_name'),
            'martial_status'      => $request->get('martial_status'),
            'blood_group'      => $request->get('blood_group'),
            'location_id'      => $request->get('location'),
            'user_id'      => $user->id,
            'status'      => 1,
        ]);
        return redirect()->route('donor.index')->with('success', 'Donor Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function show(Donor $donor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function edit(Donor $donor)
    {
        $donor = Donor::find($donor->id);
        $locations = Location::get();
        return view('backend.donors.edit',compact('donor','locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donor $donor)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'permanent_address' => 'required|string|max:255',
            'temporary_address' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email,'.$donor->user->id,
            'password' => 'nullable|string', 'min:8',
            'dob' => 'required',
            'age' => 'nullable',
            'gender' => 'required',
            'phone' => 'required|unique:users,phone,'.$donor->user->id,
            'father_name' => 'nullable',
            'mother_name' => 'nullable',
            'blood_group' => 'required',
            'location' => 'required',
            'martial_status' => 'required',
            'image' => 'nullable',
        ]);
        //dd($request->all());
        $donor = Donor::find($donor->id);
        $donor->update([
            'father_name'       => $request->father_name,
            'mother_name'       => $request->mother_name,
            'temporary_address' => $request->temporary_address,
            'permanent_address' => $request->permanent_address,
            'blood_group'       => $request->blood_group,
            'location_id'       => $request->location,
            'martial_status'    => $request->get('martial_status'),
        ]);

        User::find($donor->user->id)->update([
            'name'  => $request->name,
            'email' => $request->email,
            'dob' => $request->dob,
            'age' => $request->age,
            'phone' => $request->phone,
            'address' => $request->permanent_address,
            'gender' => $request->gender,
        ]);
        return redirect()->route('donor.index')->with('success', 'Donor Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donor $donor)
    {
        $donor = Donor::find($donor->id);
        $user = User::find($donor->user->id);
        $donor->delete();
        $user->delete();
        return redirect()->route('donor.index')->with('success', 'Donor Deleted Successfully');
    }
}

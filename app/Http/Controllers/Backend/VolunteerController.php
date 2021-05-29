<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Volunteer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $volunteers = Volunteer::latest()->get();
        return view('backend.volunteers.index',compact('volunteers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::get();
        return view('backend.volunteers.create',compact('locations'));
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
            'designation' => 'required|string',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'instagram' => 'nullable',
            'linkedin' => 'nullable',
            'blood_group' => 'required',
            'location' => 'required',
            'image'           => 'nullable|mimes:jpg,jpeg,png|max:2060',
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

        if ($request->hasFile('image')) {
            $file        = $request->file('image');
            $extension   = $file->getClientOriginalExtension();
            $destination = 'assets/uploads/volunteers';
            $file_name   = 'volunteer-pic-' . $user->id . '.' . $extension;
            $file->move($destination, $file_name);
        }
        $volunteer = Volunteer::create([
            'permanent_address'      => $request->get('permanent_address'),
            'temporary_address'      => $request->get('temporary_address'),
            'designation'      => $request->get('designation'),
            'facebook'      => $request->get('facebook'),
            'twitter'      => $request->get('twitter'),
            'linkedin'      => $request->get('linkedin'),
            'instagram'      => $request->get('instagram'),
            'blood_group'      => $request->get('blood_group'),
            'location_id'      => $request->get('location'),
            'user_id'      => $user->id,
            'image'    => $request->hasFile('image') ? $file_name : null,
            'status'      => 1,
        ]);
        return redirect()->route('volunteer.index')->with('success', 'Volunteer Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function show(Volunteer $volunteer)
    {
        $volunteer = Volunteer::find($volunteer->id);
        return view('backend.volunteers.show',compact('volunteer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function edit(Volunteer $volunteer)
    {
        $volunteer = Volunteer::find($volunteer->id);
        $locations = Location::get();
        return view('backend.volunteers.edit',compact('volunteer','locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Volunteer $volunteer)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'permanent_address' => 'required|string|max:255',
            'temporary_address' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email,'.$volunteer->user->id,
            'dob' => 'required',
            'age' => 'nullable',
            'gender' => 'required',
            'phone' => 'required|unique:users,phone,'.$volunteer->user->id,
            'designation' => 'required|string',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'instagram' => 'nullable',
            'linkedin' => 'nullable',
            'blood_group' => 'required',
            'location' => 'required',
            'image'           => 'nullable|mimes:jpg,jpeg,png|max:2060',
        ]);
        //dd($request->all());
        $volunteer = Volunteer::find($volunteer->id);
        if ($request->hasFile('image')) {
            if (isset($volunteer->image) && app('files')->exists($volunteer->image)) {
                app('files')->delete($volunteer->image);
            }
            $file        = $request->file('image');
            $extension   = $file->getClientOriginalExtension();
            $destination = 'assets/uploads/volunteers';
            $file_name   = 'volunteer-pic-' . $volunteer->user->id . '.' . $extension;
            $file->move($destination, $file_name);
        }
        $volunteer->update([
            'facebook'       => $request->facebook,
            'instagram'       => $request->instagram,
            'twitter'       => $request->twitter,
            'linkedin'       => $request->linkedin,
            'designation'       => $request->designation,
            'temporary_address' => $request->temporary_address,
            'permanent_address' => $request->permanent_address,
            'blood_group'       => $request->blood_group,
            'location_id'       => $request->location,
            'image'    => $request->hasFile('image') ? $file_name : null,
        ]);
        User::find($volunteer->user->id)->update([
            'name'  => $request->name,
            'email' => $request->email,
            'dob' => $request->dob,
            'age' => $request->age,
            'phone' => $request->phone,
            'address' => $request->permanent_address,
            'gender' => $request->gender,
        ]);
        return redirect()->route('volunteer.index')->with('success', 'Volunteer Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Volunteer $volunteer)
    {
        $volunteer = Volunteer::find($volunteer->id);
        $user = User::find($volunteer->user->id);
        $volunteer->delete();
        $user->delete();
        return redirect()->route('volunteer.index')->with('success', 'Volunteer Deleted Successfully');
    }
}

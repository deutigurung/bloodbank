<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blood;
use App\Models\BloodSeeker;
use Illuminate\Http\Request;

class BloodSeekerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seekers = BloodSeeker::latest()->get();
        return view('backend.seekers.index',compact('seekers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bloods = Blood::all();
        return view('backend.seekers.create',compact('bloods'));
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
            'age' => 'nullable',
            'gender' => 'required',
            'phone' => 'nullable',
            'receive_date' => 'date|required',
            'blood'       => 'required',
        ]);
        //dd($request->all());
        $bloodSeeker = BloodSeeker::create([
            'name'      => $request->get('name'),
            'age'      => $request->get('age'),
            'gender'      => $request->get('gender'),
            'phone'      => $request->get('phone'),
            'receive_date'      => $request->get('receive_date'),
            'blood_id'      => $request->get('blood'),
        ]);
        return redirect()->route('blood-seeker.index')->with('success', 'BloodSeeker Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bloodSeeker = BloodSeeker::find($id);
        $bloods = Blood::all();
        return view('backend.seekers.edit',compact('bloods','bloodSeeker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'nullable',
            'gender' => 'required',
            'phone' => 'nullable',
            'receive_date' => 'date|required',
            'blood'       => 'required',
        ]);
        //dd($request->all());
        $bloodSeeker = BloodSeeker::find($id);
        $bloodSeeker->update([
            'name'      => $request->get('name'),
            'age'      => $request->get('age'),
            'gender'      => $request->get('gender'),
            'phone'      => $request->get('phone'),
            'receive_date'      => $request->get('receive_date'),
            'blood_id'      => $request->get('blood'),
        ]);
        return redirect()->route('blood-seeker.index')->with('success', 'BloodSeeker Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bloodSeeker = BloodSeeker::find($id);
        $bloodSeeker->delete();
        return redirect()->route('blood-seeker.index')->with('success', 'BloodSeeker Deleted Successfully');
    }
}

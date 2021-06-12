<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Donor;
use App\Models\Volunteer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    public function index()
    {
        $users = User::get();
        $blogs = Blog::latest()->take(4)->get();
        return view('frontend.main',compact('blogs','users'));
    }

    public function joinForm()
    {
        return view('frontend.form');
    }

    public function joinRequest(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'permanent_address' => 'required|string|max:255',
            'temporary_address' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'dob' => 'required',
            'age' => 'nullable',
            'gender' => 'required',
            'phone' => 'required|unique:users',
            'role' => 'required',
            'designation' => 'required|string',
            'blood_group' => 'required',
            'image'           => 'nullable|mimes:jpg,jpeg,png|max:2060',
        ]);
        //dd($request->all());
        $user = User::create([
            'name'  => $request->get('name'),
            'address'         => $request->get('permanent_address'),
            'email'       => $request->get('email'),
            'password'    => Hash::make('password'),
            'dob'      => $request->get('dob'),
            'age'      => $request->get('age'),
            'phone'      => $request->get('phone'),
            'gender'      => $request->get('gender'),
        ]);
        $user->assignRole($request->get('role'));
        if ($request->hasFile('image')) {
            $file        = $request->file('image');
            $extension   = $file->getClientOriginalExtension();
            if($request->get('role') == "donor") {
                $destination = 'assets/uploads/donors';
                $file_name   = 'donor-pic-' . $user->id . '.' . $extension;
            }else{
                $destination = 'assets/uploads/volunteers';
                $file_name   = 'volunteer-pic-' . $user->id . '.' . $extension;
            }
            $file->move($destination, $file_name);
        }
        if($request->get('role') == "donor"){
            $donor = Donor::create([
                'permanent_address'      => $request->get('permanent_address'),
                'temporary_address'      => $request->get('temporary_address'),
                'father_name'      => $request->get('father_name'),
                'mother_name'      => $request->get('mother_name'),
                'blood_group'      => $request->get('blood_group'),
                'location_id'      => 1,
                'user_id'      => $user->id,
                'image'    => $request->hasFile('image') ? $file_name : null,
                'status'      => 0,
            ]);
        }else{
            $volunteer = Volunteer::create([
                'permanent_address'      => $request->get('permanent_address'),
                'temporary_address'      => $request->get('temporary_address'),
                'designation'      => $request->get('designation'),
                'facebook'      => $request->get('facebook'),
                'twitter'      => $request->get('twitter'),
                'linkedin'      => $request->get('linkedin'),
                'instagram'      => $request->get('instagram'),
                'blood_group'      => $request->get('blood_group'),
                'location_id'      => 1,
                'user_id'      => $user->id,
                'image'    => $request->hasFile('image') ? $file_name : null,
                'status'      => 0,
            ]);
        }
        return redirect()->back()->with('success', ' Register Successful. Please waiting for approval');
    }

    public function searchBloodForm()
    {
        $donors = [];
        return view('frontend.blood-search',compact('donors'));
    }

    public function searchBloodStore(Request $request)
    {
        $donors = Donor::where('blood_group',$request->get('blood_group'))->where('status',1)->get();
        return view('frontend.blood-search',compact('donors'));
    }

    public function contactStore(Request $request)
    {
        //dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'nullable|string',
            'phone' => 'required',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:contacts',
        ]);
        $contact = Contact::create($validatedData);
        return redirect()->back()->with('success', 'Your message has been send successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Contact;
use App\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $users = User::get();
        $blogs = Blog::latest()->take(4)->get();
        return view('frontend.main',compact('blogs','users'));
    }

    public function joinForm(){
        return view('frontend.form');
    }

    public function joinRequest(Request $request){
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
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'instagram' => 'nullable',
            'linkedin' => 'nullable',
            'blood_group' => 'required',
            'image'           => 'nullable|mimes:jpg,jpeg,png|max:2060',
        ]);
        //dd($request->all());
        $user = User::create([
            'name'  => $request->get('name'),
            'address'         => $request->get('permanent_address'),
            'email'       => $request->get('email'),
            'dob'      => $request->get('dob'),
            'age'      => $request->get('age'),
            'phone'      => $request->get('phone'),
            'gender'      => $request->get('gender'),
        ]);
        $role = $user->assignRole('role');
        if ($request->hasFile('image')) {
            $file        = $request->file('image');
            $extension   = $file->getClientOriginalExtension();
            $destination = 'assets/uploads/'.$role;
            $file_name   = $role.'-pic-' . $user->id . '.' . $extension;
            $file->move($destination, $file_name);
        }
        return redirect()->route('volunteer.index')->with('success', ' Added Successfully');
    }

    public function searchBloodForm(){
        return view('frontend.blood-search');
    }

    public function searchBloodStore(Request $request){

    }

    public function contactStore(Request $request){
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

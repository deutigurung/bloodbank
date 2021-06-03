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

    public function donorForm(){
        dd('donor form');
    }

    public function donorStore(Request $request){

    }

    public function searchBloodForm(){
        dd('search blood form');
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

<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Donor;
use App\Models\EmergencyRequest;
use App\Models\Volunteer;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_users = User::count();
        $total_blogs = Blog::count();
        $donor_inactive = Donor::where('status','=',0)->get();
        $volunteer_inactive = Volunteer::where('status','=',0)->get();
        $request_blood = EmergencyRequest::where('status','=',0)->count();
        return view('home',compact('total_users','total_blogs','donor_inactive','volunteer_inactive','request_blood'));
    }
}

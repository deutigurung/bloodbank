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

    public function bloodStock()
    {
        $this->data['o_positive'] = Donor::where('blood_group','=','o+')->where('status','=',1)->count();
        $this->data['o_negative'] = Donor::where('blood_group','=','o-')->where('status','=',1)->count();
        $this->data['b_positive'] = Donor::where('blood_group','=','b+')->where('status','=',1)->count();
        $this->data['b_negative'] = Donor::where('blood_group','=','b-')->where('status','=',1)->count();
        $this->data['a_positive'] = Donor::where('blood_group','=','a+')->where('status','=',1)->count();
        $this->data['a_negative'] = Donor::where('blood_group','=','a-')->where('status','=',1)->count();
        $this->data['ab_positive'] = Donor::where('blood_group','=','ab+')->where('status','=',1)->count();
        $this->data['ab_negative'] = Donor::where('blood_group','=','ab-')->where('status','=',1)->count();

        $this->data['o_positive_donate'] = EmergencyRequest::where('blood_group','=','o+')->where('status','=',1)->count();
        $this->data['o_negative_donate'] = EmergencyRequest::where('blood_group','=','o-')->where('status','=',1)->count();
        $this->data['b_positive_donate'] = EmergencyRequest::where('blood_group','=','b+')->where('status','=',1)->count();
        $this->data['b_negative_donate'] = EmergencyRequest::where('blood_group','=','b-')->where('status','=',1)->count();
        $this->data['a_positive_donate'] = EmergencyRequest::where('blood_group','=','a+')->where('status','=',1)->count();
        $this->data['a_negative_donate'] = EmergencyRequest::where('blood_group','=','a-')->where('status','=',1)->count();
        $this->data['ab_positive_donate'] = EmergencyRequest::where('blood_group','=','ab+')->where('status','=',1)->count();
        $this->data['ab_negative_donate'] = EmergencyRequest::where('blood_group','=','ab-')->where('status','=',1)->count();

        return view('backend.bloodStock',$this->data);
    }
}

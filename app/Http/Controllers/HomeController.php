<?php

namespace App\Http\Controllers;

use App\Models\Blog;
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
        return view('home',compact('total_users','total_blogs'));
    }
}

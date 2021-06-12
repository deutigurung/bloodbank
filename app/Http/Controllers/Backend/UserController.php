<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id','=',1)->latest()->get();
        return view('backend.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
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
            'name' => 'required', 'string', 'max:255',
            'address' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8',
            'dob' => 'nullable',
            'age' => 'nullable',
            'gender' => 'required',
            'phone' => 'nullable',
        ]);

        $users = User::create([
            'name'  => $request->get('name'),
            'address'         => $request->get('address'),
            'email'       => $request->get('email'),
            'password'    => Hash::make($request->get('password')),
            'dob'      => $request->get('dob'),
            'age'      => $request->get('age'),
            'phone'      => $request->get('phone'),
            'gender'      => $request->get('gender'),
        ]);

        return redirect()->route('user.index')->with('success', 'User Added Successfully');
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
        $user = User::find($id);
        $roles = Role::all();
        $userRole = $user->roles->pluck('id','id')->all();
        return view('backend.users.edit',compact('user','roles','userRole'));
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
        //dd($request->input('role'));
        $validatedData = $request->validate([
            'name' => 'required', 'string', 'max:255',
            'address' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            //'password' => 'required', 'string', 'min:8',
            'dob' => 'nullable',
            'age' => 'nullable',
            'gender' => 'required',
            'phone' => 'nullable',
        ]);

        $user = User::find($id);
        $user->update([
            'name'  => $request->get('name'),
            'address'         => $request->get('address'),
            'email'       => $request->get('email'),
            //'password'    => Hash::make($request->get('password')),
            'dob'      => $request->get('dob'),
            'age'      => $request->get('age'),
            'phone'      => $request->get('phone'),
            'gender'      => $request->get('gender'),
        ]);
        $user->save();
        DB::table('model_has_roles')->where('model_id', $user->id)->delete();
        $user->assignRole($request->input('role'));
        return redirect()->route('user.index')->with('success', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User Deleted Successfully');
    }

    public function profile()
    {
        $user = auth()->id();
        $user = User::find($user);
        $roles = Role::all();
        return view('backend.users.profile',compact('user','roles'));
    }
    public function changePassword(Request $request)
    {
        $validatedData = $request->validate([
            'password' => 'required', 'string', 'min:8','confirmed',
        ]);
        $user = User::find($request->user);
        $user->password = Hash::make($request->get('password'));
        $user->save();
        return redirect()->back()->with('success', 'Password Change Successfully');
    }
}

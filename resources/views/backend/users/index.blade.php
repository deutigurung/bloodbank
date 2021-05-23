@extends('adminlte::page')

@section('title', 'Blood Bank | User')

@section('content_header')
    <h1 class="m-0 text-dark">All User</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('layouts.notification')
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Date of Birth</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->dob }}</td>
                                <td>{{ $user->age }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    <a href="{{ route('user.edit',$user->id) }}" class="btn btn-success btn-sm">Edit</a>
                                    <a href="{{ route('user.destroy',$user->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Date of Birth</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

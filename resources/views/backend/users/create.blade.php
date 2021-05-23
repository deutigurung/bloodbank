@extends('adminlte::page')

@section('title', 'Blood Bank | User')

@section('content_header')
    <h1 class="m-0 text-dark">Add User</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form role="form" class="form" method="post" action="{{ route('user.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Enter Full Name" autofocus>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="example@exmaple.com" autofocus>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" placeholder="Enter Password" autofocus>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input id="dob" type="date" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ old('dob') }}" placeholder="" autofocus>
                            @if ($errors->has('dob'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('dob') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input id="age" type="number" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{ old('age') }}" placeholder="" autofocus>
                            @if ($errors->has('age'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('age') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" placeholder="Enter Address" autofocus>
                            @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" placeholder="+977-9XXXXXXXX" autofocus>
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

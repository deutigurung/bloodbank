@extends('adminlte::page')

@section('title', 'Blood Bank | Profile')

@section('content_header')
    <h1 class="m-0 text-dark">Profile</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                             src=""
                             alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{ $user->name }}</h3>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">About Me</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <strong><i class="fas fa-mailchimp mr-1"></i> Email</strong>

                    <p class="text-muted">
                        {{ $user->email }}
                    </p>

                    <hr>
                    <strong><i class="fas fa-phone mr-1"></i> Phone</strong>

                    <p class="text-muted">
                        {{ $user->phone }}
                    </p>

                    <hr>
                    <strong><i class="fas fa-book mr-1"></i> Join Date</strong>

                    <p class="text-muted">
                        {{ date('jS F Y',strtotime($user->created_at)) }}
                    </p>

                    <hr>
                    <strong><i class="fas fa-calendar mr-1"></i> Birthday</strong>

                    <p class="text-muted">
                        {{ date('jS F Y',strtotime($user->dob)) }} , Age : {{ $user->age }}
                    </p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                    <p class="text-muted">{{ $user->address }}</p>

                    <hr>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Change Password</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    @include('layouts.notification')
                    <div class="tab-content">
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">
                            <form role="form" class="form" method="post" action="{{ route('user.changePassword') }}">
                                @csrf
                                <input type="hidden" name="user" value="{{ $user->id }}">
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="" placeholder="Enter Password" autofocus>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input id="password_confirmation" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" value="" placeholder="Confirm Password" autofocus>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->

                        <div class="active tab-pane" id="settings">
                            <form role="form" class="form" method="post" action="{{ route('user.update',$user) }}">
                                @csrf
                                {{ method_field('put') }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" placeholder="Enter Full Name" autofocus>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" placeholder="example@exmaple.com" autofocus>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="dob">Date of Birth</label>
                                        <input id="dob" type="date" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ $user->dob }}" placeholder="" autofocus>
                                        @if ($errors->has('dob'))
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('dob') }}</strong>
                                </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="age">Age</label>
                                        <input id="age" type="number" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{ $user->age }}" placeholder="" autofocus>
                                        @if ($errors->has('age'))
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('age') }}</strong>
                                </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $user->address }}" placeholder="Enter Address" autofocus>
                                        @if ($errors->has('address'))
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $user->phone }}" placeholder="+977-9XXXXXXXX" autofocus>
                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select class="form-control" name="gender">
                                            <option value="male" @if($user->gender === 'male') ? selected @endif>Male</option>
                                            <option value="female" @if($user->gender === 'female') ? selected @endif>Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select class="form-control" name="role">
                                            @foreach($roles as $role)
                                            <option value="{{$role->id}}" @if($user->gender === 'male') ? selected @endif>{{ $role->name }}</option>
                                            @endforeach
                                            </select>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@stop

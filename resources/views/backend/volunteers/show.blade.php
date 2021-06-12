@extends('adminlte::page')

@section('title', 'Blood Bank | Volunteer')

@section('content_header')
    <h1 class="m-0 text-dark">Volunteer</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                             src="{{ asset('assets/uploads/volunteers/'.$volunteer->image) }}"
                             alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{ $volunteer->user->name }}</h3>
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
                        {{ $volunteer->user->email }}
                    </p>

                    <hr>
                    <strong><i class="fas fa-phone mr-1"></i> Phone</strong>

                    <p class="text-muted">
                        {{ $volunteer->user->phone }}
                    </p>

                    <hr>
                    <strong><i class="fas fa-book mr-1"></i> Join Date</strong>

                    <p class="text-muted">
                        {{ date('jS F Y',strtotime($volunteer->created_at)) }}
                    </p>

                    <hr>
                    <strong><i class="fas fa-calendar mr-1"></i> Birthday</strong>

                    <p class="text-muted">
                        {{ date('jS F Y',strtotime($volunteer->user->dob)) }} , Age : {{ $volunteer->user->age }}
                    </p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                    <p class="text-muted">Permanent: {{ $volunteer->permanent_address }}</p>
                    <p class="text-muted">Temporary: {{ $volunteer->temporary_address }}</p>

                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i> Designation</strong>

                    <p class="text-muted"> {{ $volunteer->designation }} </p>

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
                        <li class="nav-item"><a class="nav-link" href="#status" data-toggle="tab">Status Change</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="status">
                            <form class="form-horizontal" method="POST" action="{{ route('volunteer.status',$volunteer->id) }}">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2" name="status">
                                            <option value="1" @if($volunteer->status == 1) ? selected @endif>Active</option>
                                            <option value="0" @if($volunteer->status == 0) ? selected @endif>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Change</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->

                        <div class="active tab-pane" id="settings">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputName" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
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

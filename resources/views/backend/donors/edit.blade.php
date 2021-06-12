@extends('adminlte::page')

@section('title', 'Blood Bank | Donor')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Donor</h1>
@stop
@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/plugins/datepicker/datepicker.css') }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form role="form" class="form" method="post" action="{{ route('donor.update',$donor->id) }}" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('put') }}
                    <div class="card-body">
                        <h2 class="card-title">Personal Info</h2><br>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $donor->user->name }}" placeholder="Enter Full Name" autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $donor->user->email }}" placeholder="example@exmaple.com" autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="text" class="pickdate form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" id="dob"
                                           name="dob" value="{{ $donor->user->dob }}" placeholder="Enter Birth Date">
                                    @if ($errors->has('dob'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('dob') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="age">Age</label>
                                    <input id="age" type="number" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{ $donor->user->age }}" placeholder="" autofocus>
                                    @if ($errors->has('age'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('age') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="temporary_address">Temporary Address</label>
                                    <input id="temporary_address" type="text" class="form-control{{ $errors->has('temporary_address') ? ' is-invalid' : '' }}" name="temporary_address" value="{{ $donor->temporary_address }}" placeholder="Enter Temporary Address" autofocus>
                                    @if ($errors->has('temporary_address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('temporary_address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="permanent_address">Permanent Address</label>
                                    <input id="permanent_address" type="text" class="form-control{{ $errors->has('permanent_address') ? ' is-invalid' : '' }}" name="permanent_address" value="{{ $donor->permanent_address }}" placeholder="Enter Permanent Address" autofocus>
                                    @if ($errors->has('permanent_address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('permanent_address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $donor->user->phone }}" placeholder="+977-9XXXXXXXX" autofocus>
                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select class="form-control select2" name="gender">
                                        <option value="male" @if($donor->user->gender == 'male') ? selected @endif>Male</option>
                                        <option value="female" @if($donor->user->gender == 'female') ? selected @endif>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="blood_group">Blood Group</label>
                                    <select name="blood_group"  id="blood_group" class="form-control select2">
                                        <option value="o+" @if($donor->blood_group == "o+") ? selected @endif>O+</option>
                                        <option value="o-" @if($donor->blood_group == "o-") ? selected @endif>O-</option>
                                        <option value="b+" @if($donor->blood_group == "b+") ? selected @endif>B+</option>
                                        <option value="b-" @if($donor->blood_group == "b-") ? selected @endif>B-</option>
                                        <option value="a+" @if($donor->blood_group == "a+") ? selected @endif>A+</option>
                                        <option value="a-" @if($donor->blood_group == "a-") ? selected @endif>A-</option>
                                        <option value="ab+" @if($donor->blood_group == "ab+") ? selected @endif>AB+</option>
                                        <option value="ab-" @if($donor->blood_group == "ab-") ? selected @endif>AB-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <select class="form-control select2" name="location">
                                        @foreach($locations as $location)
                                            <option value="{{ $location->id }}" @if($donor->location_id == $location->id) ? selected @endif>{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control" value="{{ asset('assets/uploads/donors/'.$donor->image) }}">
                                    @if(isset($donor->image))
                                        <img class="profile-user-img img-fluid img-circle"
                                             src="{{ asset('assets/uploads/donors/'.$donor->image) }}"
                                             alt="User profile picture">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <h2 class="card-title">Parent Info</h2><br>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="father_name">Father Name</label>
                                    <input id="father_name" type="text" class="form-control{{ $errors->has('father_name') ? ' is-invalid' : '' }}" name="father_name" value="{{ $donor->father_name }}" placeholder="Enter Father Name" autofocus>
                                    @if ($errors->has('father_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('father_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="mother_name">Mother Name</label>
                                    <input id="mother_name" type="text" class="form-control{{ $errors->has('mother_name') ? ' is-invalid' : '' }}" name="mother_name" value="{{ $donor->mother_name }}" placeholder="Enter Mother Name" autofocus>
                                    @if ($errors->has('mother_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('mother_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
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
@section('adminlte_js')
    <script src="{{ asset('vendor/plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/plugins/datepicker/datepicker.js') }}"></script>

    <script>
        $('#dob').datepicker({
            'todayHighlight': true,
            'format': 'yyyy-mm-dd',
            'autoclose': true
        });

    </script>
@endsection

@extends('adminlte::page')

@section('title', 'Blood Bank | Volunteer')

@section('content_header')
    <h1 class="m-0 text-dark">Add Volunteer</h1>
@stop
@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/plugins/datepicker/datepicker.css') }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form role="form" class="form" method="post" action="{{ route('volunteer.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h2 class="card-title">Personal Info</h2><br>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Enter Full Name" autofocus>
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
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="example@exmaple.com" autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" placeholder="Enter Password" autofocus>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="text" class="pickdate form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" id="dob"
                                           name="dob" value="{{ old('dob') }}" placeholder="Enter Birth Date">
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
                                    <input id="age" type="number" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{ old('age') }}" placeholder="" autofocus>
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
                                    <input id="temporary_address" type="text" class="form-control{{ $errors->has('temporary_address') ? ' is-invalid' : '' }}" name="temporary_address" value="{{ old('temporary_address') }}" placeholder="Enter Temporary Address" autofocus>
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
                                    <input id="permanent_address" type="text" class="form-control{{ $errors->has('permanent_address') ? ' is-invalid' : '' }}" name="permanent_address" value="{{ old('permanent_address') }}" placeholder="Enter Permanent Address" autofocus>
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
                                    <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" placeholder="+977-9XXXXXXXX" autofocus>
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
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="blood_group">Blood Group</label>
                                    <select name="blood_group"  id="blood_group" class="form-control select2">
                                        <option value="o+">O+</option>
                                        <option value="o-">O-</option>
                                        <option value="b+">B+</option>
                                        <option value="b-">B-</option>
                                        <option value="a+">A+</option>
                                        <option value="a-">A-</option>
                                        <option value="ab+">AB+</option>
                                        <option value="ab-">AB-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <select class="form-control select2" name="location">
                                        @foreach($locations as $location)
                                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="designation">Designation</label>
                                    <input id="designation" type="text" class="form-control{{ $errors->has('designation') ? ' is-invalid' : '' }}" name="designation" value="{{ old('designation') }}" placeholder="Designation" autofocus>
                                    @if ($errors->has('designation'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('designation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="martial_status">Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                        </div>
                        <h2 class="card-title">Social Media Info</h2><br>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input id="facebook" type="text" class="form-control{{ $errors->has('facebook') ? ' is-invalid' : '' }}" name="facebook" value="{{ old('facebook') }}" placeholder=" Facebook" autofocus>
                                    @if ($errors->has('facebook'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('facebook') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="twitter">Twitter</label>
                                    <input id="twitter" type="text" class="form-control{{ $errors->has('twitter') ? ' is-invalid' : '' }}" name="twitter" value="{{ old('twitter') }}" placeholder=" Twitter" autofocus>
                                    @if ($errors->has('twitter'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('twitter') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="instagram">Instagram</label>
                                    <input id="instagram" type="text" class="form-control{{ $errors->has('instagram') ? ' is-invalid' : '' }}" name="instagram" value="{{ old('instagram') }}" placeholder=" Instagram" autofocus>
                                    @if ($errors->has('instagram'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('instagram') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="linkedin">Linkedin</label>
                                    <input id="linkedin" type="text" class="form-control{{ $errors->has('linkedin') ? ' is-invalid' : '' }}" name="linkedin" value="{{ old('linkedin') }}" placeholder=" Linkedin" autofocus>
                                    @if ($errors->has('linkedin'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('linkedin') }}</strong>
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

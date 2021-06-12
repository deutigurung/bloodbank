@include('frontend.partials.header')
<div class="container">
    <div class="register-box" style="padding-top: 50px; padding-bottom: 110px;">
        <div class="card card-outline card-primary">
            <div class="card-header " style="background-color: #495057; color: #ffffff">
                <h3 class="card-title float-none text-center">
                    Join Us
                </h3>
            </div>
            @include('layouts.notification')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form role="form" class="form" method="post" action="{{ route('joinRequest') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <h2 class="card-title">Personal Info</h2>
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
                                            <label for="designation">Designation</label>
                                            <input id="designation" type="text" class="form-control{{ $errors->has('designation') ? ' is-invalid' : '' }}" name="designation" value="{{ old('designation') }}" placeholder="Designation" autofocus>
                                            @if ($errors->has('designation'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('designation') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="location">Want To Join As?</label>
                                            <select class="form-control select2" name="role">
                                                <option value="donor">Donor</option>
                                                <option value="volunteer">Volunteer</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="martial_status">Image</label>
                                            <input type="file" name="image" class="form-control">
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
        </div>
    </div>

</div>
@include('frontend.partials.footer')

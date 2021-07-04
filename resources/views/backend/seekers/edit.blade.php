@extends('adminlte::page')

@section('title', 'Blood Bank | Blood Seeker')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Blood Seeker</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form role="form" class="form" method="post" action="{{ route('blood-seeker.update',$bloodSeeker->id) }}">
                    @csrf
                    {{ method_field('put') }}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $bloodSeeker->name }}" placeholder="Enter Full Name" autofocus>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input id="age" type="number" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{ $bloodSeeker->age }}" placeholder="" autofocus>
                            @if ($errors->has('age'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('age') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $bloodSeeker->phone }}" placeholder="+977-9XXXXXXXX" autofocus>
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender">
                                <option value="male" @if($bloodSeeker->gender === 'male') ? selected @endif>Male</option>
                                <option value="female" @if($bloodSeeker->gender === 'female') ? selected @endif>Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Receive</label>
                            <input id="receive_date" type="date" class="form-control{{ $errors->has('receive_date') ? ' is-invalid' : '' }}" name="receive_date" value="{{ $bloodSeeker->receive_date }}" placeholder="" autofocus>
                            @if ($errors->has('receive_date'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('receive_date') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="blood_id">Blood Group</label>
                            <select class="form-control" name="blood">
                                @foreach($bloods as $blood)
                                    <option value="{{$blood->id}}" @if($bloodSeeker->blood_id == $blood->id) ? selected @endif>{{ ucfirst($blood->name) }}</option>
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
        </div>
    </div>
@stop

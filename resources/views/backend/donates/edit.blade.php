@extends('adminlte::page')

@section('title', 'Blood Bank | Blood Donate')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Blood Donate</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form role="form" class="form" method="post" action="{{ route('blood-donate.update',$bloodDonate->id) }}">
                    @csrf
                    {{ method_field('put') }}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $bloodDonate->name }}" placeholder="Enter Full Name" autofocus>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Donation</label>
                            <input id="donate_date" type="date" class="form-control{{ $errors->has('donate_date') ? ' is-invalid' : '' }}" name="donate_date" value="{{ $bloodDonate->donate_date }}" placeholder="" autofocus>
                            @if ($errors->has('donate_date'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('donate_date') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="donate_before">Donate Before</label>
                            <select class="form-control" name="donate_before">
                                <option value="1" @if($bloodDonate->donate_before == 1) ? selected @endif>Yes</option>
                                <option value="0" @if($bloodDonate->donate_before == 0) ? selected @endif>No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="blood_id">Blood Group</label>
                            <select class="form-control" name="blood">
                                @foreach($bloods as $blood)
                                    <option value="{{$blood->id}}" @if($bloodDonate->blood_id == $blood->id) ? selected @endif>{{ ucfirst($blood->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="donor_id">Donor</label>
                            <select class="form-control" name="donor">
                                @foreach($donors as $donor)
                                    <option value="{{$donor->id}}" @if($bloodDonate->donor_id == $donor->id) ? selected @endif>{{ $donor->user->name }}</option>
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

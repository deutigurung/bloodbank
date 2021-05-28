
@extends('adminlte::page')

@section('title', 'Blood Bank | Location')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Location</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form role="form" class="form" method="post" action="{{ route('location.update',$location) }}">
                    @csrf
                    {{ method_field('put') }}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $location->name }}" id="name" placeholder="Enter Location Name">
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

@extends('adminlte::page')

@section('title', 'Blood Bank | Role')

@section('content_header')
    <h1 class="m-0 text-dark">Add Role</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form role="form" class="form" method="post" action="{{ route('role.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Role Name">
                        </div>
                        {{--                            <div class="form-group">--}}
                        {{--                                <label for="exampleInputPassword1">Password</label>--}}
                        {{--                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">--}}
                        {{--                            </div>--}}
                        {{--                            <div class="form-group">--}}
                        {{--                                <label for="exampleInputFile">File input</label>--}}
                        {{--                                <div class="input-group">--}}
                        {{--                                    <div class="custom-file">--}}
                        {{--                                        <input type="file" class="custom-file-input" id="exampleInputFile">--}}
                        {{--                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="input-group-append">--}}
                        {{--                                        <span class="input-group-text" id="">Upload</span>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
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

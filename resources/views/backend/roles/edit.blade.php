@extends('adminlte::page')

@section('title', 'Blood Bank | Role')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Role</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form role="form" class="form" method="post" action="{{ route('role.update',$role) }}">
                    @csrf
                    {{ method_field('put') }}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $role->name }}" id="name" placeholder="Enter Role Name">
                        </div>
                        <div class="form-group">
                            <label for="permission">Permission</label>
                            <select class="form-control multiple-select2" name="permission[]" multiple="multiple" id="permission">
                                @foreach($permissions as $p)
                                    <option value="{{$p->id}}"  @if($role->hasPermissionTo($p)) selected @endif>{{ $p->name }}</option>
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

@extends('adminlte::page')

@section('title', 'Blood Bank | Volunteer')

@section('content_header')
    <h1 class="m-0 text-dark">All Volunteer</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('layouts.notification')
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Age</th>
                            <th>Blood Group</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Designation</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($volunteers as $volunteer)
                            <tr>
                                <td>{{ $volunteer->id }}</td>
                                <td>{{ $volunteer->user->name }}</td>
                                <td>{{ $volunteer->user->email }}</td>
                                <td>
                                    Permanent: {{ $volunteer->permanent_address }} ,<br>
                                    Temporary: {{ $volunteer->temporary_address }}
                                </td>
                                <td>{{ $volunteer->user->age }}</td>
                                <td>{{ ucfirst($volunteer->blood->name ?? '') }}</td>
                                <td>{{ $volunteer->user->gender }}</td>
                                <td>{{ $volunteer->user->phone }}</td>
                                <td>{{ $volunteer->designation }}</td>
                                <td>
                                    <form method="POST" action="{{ route('volunteer.destroy',$volunteer->id) }}" class="confirmation">
                                        <input type="hidden" name="_method" value="DELETE" />
                                        @csrf
                                        <a href="{{ route('volunteer.edit',$volunteer->id) }}" class="btn btn-success  btn-sm"><i class="fas fa-fw fa-pen"></i></a>
                                        <a href="{{ route('volunteer.show',$volunteer->id) }}" class="btn btn-info btn-sm"><i class="fas fa-fw fa-eye"></i></a>
                                        <button type="submit" title="Delete" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-cut"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Age</th>
                            <th>Blood Group</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Designation</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@section('adminlte_js')
    <script>
        $(document).ready(function () {
            $('#example1').DataTable();
            $(".confirmation").on("submit", function(){
                return confirm("Are you sure want to delete?");
            });
        });
    </script>
@endsection

@extends('adminlte::page')

@section('title', 'Blood Bank | Blood Seeker')

@section('content_header')
    <h1 class="m-0 text-dark">All Blood Seeker</h1>
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
                            <th>Patient Name</th>
                            <th>Age</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Date of Receive</th>
                            <th>Blood Group</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($seekers as $seeker)
                            <tr>
                                <td>{{ $seeker->id }}</td>
                                <td>{{ $seeker->name }}</td>
                                <td>{{ $seeker->age }}</td>
                                <td>{{ $seeker->phone }}</td>
                                <td>{{ $seeker->gender }}</td>
                                <td>{{ $seeker->receive_date }}</td>
                                <td>{{ ucfirst($seeker->blood->name) }}</td>
                                <td>
                                    <form method="POST" action="{{ route('blood-seeker.destroy',$seeker->id) }}" class="confirmation">
                                        <input type="hidden" name="_method" value="DELETE" />
                                        @csrf
                                        <a href="{{ route('blood-seeker.edit',$seeker->id) }}" class="btn btn-success  btn-sm"><i class="fas fa-fw fa-pen"></i></a>                                        <button type="submit" title="Delete" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-cut"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Patient Name</th>
                            <th>Age</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Date of Receive</th>
                            <th>Blood Group</th>
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

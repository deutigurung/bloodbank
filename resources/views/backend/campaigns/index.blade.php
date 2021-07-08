@extends('adminlte::page')

@section('title', 'Blood Bank | Volunteer Campaign ')

@section('content_header')
    <h1 class="m-0 text-dark">All Volunteer Campaign </h1>
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
                            <th>Volunteer</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($campaigns as $camp)
                            <tr>
                                <td>{{ $camp->id }}</td>
                                <td>{{ $camp->volunteer->user->name }}</td>
                                <td>{{ $camp->name }}</td>
                                <td>{{ $camp->date }}</td>
                                <td>{{ $camp->address }}</td>
                                <td>{{ $camp->status }}</td>
                                <td>
                                    <form method="POST" action="{{ route('volunteer-campaign.destroy',$camp->id) }}" class="confirmation">
                                        <input type="hidden" name="_method" value="DELETE" />
                                        @csrf
                                        <a href="{{ route('volunteer-campaign.edit',$camp->id) }}" class="btn btn-success btn-action btn-sm"><i class="fas fa-fw fa-pen"></i></a>
                                        <button type="submit" title="Delete" class="btn btn-danger btn-action btn-sm"><i class="fas fa-fw fa-cut"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Volunteer</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Address</th>
                            <th>Status</th>
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

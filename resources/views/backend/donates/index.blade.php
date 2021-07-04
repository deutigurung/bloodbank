@extends('adminlte::page')

@section('title', 'Blood Bank | Blood Donation')

@section('content_header')
    <h1 class="m-0 text-dark">All Blood Donation</h1>
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
                            <th>Donor</th>
                            <th>Patient Name</th>
                            <th>Date of Donation</th>
                            <th>Blood Group</th>
                            <th>Before Donate</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($donates as $donate)
                            <tr>
                                <td>{{ $donate->id }}</td>
                                <td>{{ $donate->donor->user->name }}</td>
                                <td>{{ $donate->name }}</td>
                                <td>{{ $donate->donate_date }}</td>
                                <td>{{ ucfirst($donate->blood->name) }}</td>
                                <td>@if($donate->donate_before == 1) <span class="badge badge-success">Yes</span>
                                    @else
                                        <span class="badge badge-danger">No</span> @endif
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('blood-donate.destroy',$donate->id) }}" class="confirmation">
                                        <input type="hidden" name="_method" value="DELETE" />
                                        @csrf
                                        <a href="{{ route('blood-donate.edit',$donate->id) }}" class="btn btn-success  btn-sm"><i class="fas fa-fw fa-pen"></i></a>                                        <button type="submit" title="Delete" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-cut"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Donor</th>
                            <th>Patient Name</th>
                            <th>Date of Donation</th>
                            <th>Blood Group</th>
                            <th>Before Donate</th>
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

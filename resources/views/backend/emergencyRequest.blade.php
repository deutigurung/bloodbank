@extends('adminlte::page')

@section('title', 'Blood Bank | Emergency Request')

@section('content_header')
    <h1 class="m-0 text-dark">All Emergency Request</h1>
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
                            <th>Mobile</th>
                            <th>Message</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->mobile }}</td>
                                <td>{{ $contact->message }}</td>
                                <td>
                                    @if($contact->status == 0)
                                        <a href="{{ route('emergency-requests.status',$contact->id) }}" class="btn btn-danger btn-sm">Not Done</a>
                                    @else
                                        <button class="btn btn-success btn-sm"> Done</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Full Name</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Status</th>
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
        });
    </script>
@endsection

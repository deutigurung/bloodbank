@extends('adminlte::page')

@section('title', 'Blood Bank | Contact')

@section('content_header')
    <h1 class="m-0 text-dark">All Contact</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->message }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
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

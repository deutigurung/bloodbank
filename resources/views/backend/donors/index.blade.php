@extends('adminlte::page')

@section('title', 'Blood Bank | Donor')

@section('content_header')
    <h1 class="m-0 text-dark">All Donor</h1>
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
                            <th>Parents</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($donors as $donor)
                            <tr>
                                <td>{{ $donor->id }}</td>
                                <td>{{ $donor->user->name }}</td>
                                <td>{{ $donor->user->email }}</td>
                                <td>
                                    Permanent: {{ $donor->permanent_address }} ,<br>
                                    Temporary: {{ $donor->temporary_address }}
                                </td>
                                <td>{{ $donor->user->age }}</td>
                                <td>{{ $donor->blood_group }}</td>
                                <td>{{ $donor->user->gender }}</td>
                                <td>{{ $donor->user->phone }}</td>
                                <td>{{ $donor->father_name ?: $donor->mother_name}}</td>
                                <td>
                                    <form method="POST" action="{{ route('donor.destroy',$donor->id) }}" class="confirmation">
                                        <input type="hidden" name="_method" value="DELETE" />
                                        @csrf
                                        <a href="{{ route('donor.edit',$donor->id) }}" class="btn btn-success  btn-sm"><i class="fas fa-fw fa-pen"></i></a>
                                        <a href="{{ route('donor.show',$donor->id) }}" class="btn btn-info btn-sm"><i class="fas fa-fw fa-eye"></i></a>
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
                            <th>Parents</th>
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

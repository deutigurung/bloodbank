@extends('adminlte::page')

@section('title', 'Blood Bank | Blog ')

@section('content_header')
    <h1 class="m-0 text-dark">All Blog </h1>
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
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blogs as $blog)
                            <tr>
                                <td>{{ $blog->id }}</td>
                                <td> <img class="profile-user-img img-fluid img-circle"
                                          src="{{ asset('assets/uploads/blogs/'.$blog->image) }}"
                                          alt="User profile picture">
                                </td>
                                <td>{{ $blog->name }}</td>
                                <td>{{ $blog->blogCategory->name }}</td>
                                <td>{{ $blog->description }}</td>
                                <td>
                                    <form method="POST" action="{{ route('blog.destroy',$blog->id) }}" class="confirmation">
                                        <input type="hidden" name="_method" value="DELETE" />
                                        @csrf
                                        <a href="{{ route('blog.edit',$blog->id) }}" class="btn btn-success btn-action btn-sm"><i class="fas fa-fw fa-pen"></i></a>
                                        <button type="submit" title="Delete" class="btn btn-danger btn-action btn-sm"><i class="fas fa-fw fa-cut"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Description</th>
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

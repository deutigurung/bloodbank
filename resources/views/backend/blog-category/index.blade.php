@extends('adminlte::page')

@section('title', 'Blood Bank | Blog Category')

@section('content_header')
    <h1 class="m-0 text-dark">All Blog Category</h1>
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
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blogCategories as $blogCategory)
                            <tr>
                                <td>{{ $blogCategory->id }}</td>
                                <td>{{ $blogCategory->name }}</td>
                                <td>
                                    <form method="POST" action="{{ route('blogCategory.destroy',$blogCategory->id) }}" class="confirmation">
                                        <input type="hidden" name="_method" value="DELETE" />
                                        @csrf
                                        <a href="{{ route('blogCategory.edit',$blogCategory->id) }}" class="btn btn-success btn-action btn-sm"><i class="fas fa-fw fa-pen"></i></a>
                                        <button type="submit" title="Delete" class="btn btn-danger btn-action btn-sm"><i class="fas fa-fw fa-cut"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
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

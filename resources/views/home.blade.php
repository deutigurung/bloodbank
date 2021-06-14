@extends('adminlte::page')

@section('title', 'Blood Bank | Dashboard')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if(auth()->user()->can('user_management'))
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $total_blogs }}</h3>

                                    <p>New Blog</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-fw fa-newspaper"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $request_blood }}</h3>

                                    <p>Emergency Request Blood</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-fw fa-hand-holding-water"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $total_users }}</h3>

                                    <p>Total User</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-fw fa-users"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>65</h3>

                                    <p>Unique Visitors</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-fw fa-chart-pie"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header border-0 dark-mode">
                                    <h3 class="card-title">Donor Status Inactive</h3>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-striped table-valign-middle">
                                        <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>More</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($donor_inactive as $data)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets/uploads/donors/'.$data->image) }}"
                                                     alt="No Image" class="img-circle img-size-32 mr-2">
                                            </td>
                                            <td>{{ $data->user->name }}</td>
                                            <td>{{ $data->user->email }}</td>
                                            <td>
                                                <a href="{{ route('donor.show',$data->id) }}" class="text-muted">
                                                    <i class="fas fa-search"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header border-0 dark-mode">
                                    <h3 class="card-title">Volunteer Status Inactive</h3>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-striped table-valign-middle">
                                        <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>More</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($volunteer_inactive as $data)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset('assets/uploads/volunteers/'.$data->image) }}"
                                                         alt="No Image" class="img-circle img-size-32 mr-2">
                                                </td>
                                                <td>{{ $data->user->name }}</td>
                                                <td>{{ $data->user->email }}</td>
                                                <td>
                                                    <a href="{{ route('volunteer.show',$data->id) }}" class="text-muted">
                                                        <i class="fas fa-search"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header border-0 dark-mode">
                                        <h3 class="card-title">My Donation</h3>
                                    </div>
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-striped table-valign-middle">
                                            <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>More</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($donor_inactive as $data)
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset('assets/uploads/donors/'.$data->image) }}"
                                                             alt="No Image" class="img-circle img-size-32 mr-2">
                                                    </td>
                                                    <td>{{ $data->user->name }}</td>
                                                    <td>{{ $data->user->email }}</td>
                                                    <td>
                                                        <a href="{{ route('donor.show',$data->id) }}" class="text-muted">
                                                            <i class="fas fa-search"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop

@include('frontend.partials.header')
<div class="container">
    <div class="register-box" style="padding-top: 50px; padding-bottom: 110px;">
        <h3> Search Blood Group </h3>
        <form class="form" action="{{ route('searchBloodStore') }}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <select name="blood_group"  id="blood_group" class="form-control select2">
                        <option value="o+">O+</option>
                        <option value="o-">O-</option>
                        <option value="b+">B+</option>
                        <option value="b-">B-</option>
                        <option value="a+">A+</option>
                        <option value="a-">A-</option>
                        <option value="ab+">AB+</option>
                        <option value="ab-">AB-</option>
                    </select>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary btn-sm">Search</button>
                </div>
            </div>
        </form>
        @if(count($donors)>0)
        <div class="card card-outline card-primary">
            <div class="card-header " style="background-color: #495057; color: #ffffff">
            <h3 class="card-title">
                    Donor Lists
                </h3>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Age</th>
                                <th>Blood Group</th>
                                <th>Gender</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($donors as $data)
                                <tr>
                                    <td>{{ $data->user->name }}</td>
                                    <td>{{ $data->user->email }}</td>
                                    <td>
                                        Permanent: {{ $data->permanent_address }} ,<br>
                                        Temporary: {{ $data->temporary_address }}
                                    </td>
                                    <td>{{ $data->user->age }}</td>
                                    <td>{{ $data->blood_group }}</td>
                                    <td>{{ $data->user->gender }}</td>
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
@include('frontend.partials.footer')

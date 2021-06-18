@extends('adminlte::page')

@section('title', 'Blood Bank | Blood Stock')

@section('content_header')
    <h1 class="m-0 text-dark">All Blood Stock</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SNo.</th>
                            <th>Blood Group</th>
                            <th>Total Quantity</th>
                            <th>Donate</th>
                            <th>Remaining Quantity</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>O+</td>
                            <td>{{ $o_positive }}</td>
                            <td>{{ $o_positive_donate }}</td>
                            <td>{{ $o_positive - $o_positive_donate }}</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>O-</td>
                            <td>{{ $o_negative }}</td>
                            <td>{{ $o_negative_donate }}</td>
                            <td>{{ $o_negative - $o_negative_donate }}</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>B+</td>
                            <td>{{ $b_positive }}</td>
                            <td>{{ $b_positive_donate }}</td>
                            <td>{{ $b_positive - $b_positive_donate }}</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>B-</td>
                            <td>{{ $b_negative }}</td>
                            <td>{{ $b_negative_donate }}</td>
                            <td>{{ $b_negative - $b_negative_donate }}</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>A+</td>
                            <td>{{ $a_positive }}</td>
                            <td>{{ $a_positive_donate }}</td>
                            <td>{{ $a_positive - $a_positive_donate }}</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>A-</td>
                            <td>{{ $a_negative }}</td>
                            <td>{{ $a_negative_donate }}</td>
                            <td>{{ $a_negative - $a_negative_donate }}</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>AB+</td>
                            <td>{{ $ab_positive }}</td>
                            <td>{{ $ab_positive_donate }}</td>
                            <td>{{ $ab_positive - $ab_positive_donate }}</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>AB-</td>
                            <td>{{ $ab_negative }}</td>
                            <td>{{ $ab_negative_donate }}</td>
                            <td>{{ $ab_negative - $ab_negative_donate }}</td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SNo.</th>
                            <th>Blood Group</th>
                            <th>Total Quantity</th>
                            <th>Donate</th>
                            <th>Remaining Quantity</th>
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

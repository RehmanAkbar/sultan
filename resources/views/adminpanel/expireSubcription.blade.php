@extends('adminpanel.master')
@section('title', 'Perfume Clube')
<?php
use App\Product;
use App\Queue;
use App\User;
use App\Order;
use App\Brand;


?>
@section('content')
    <div class="content-wrapper" style="margin-bottom: -20px;">
        <div class="panel panel-success">
            <div class="panel-heading"><h3>Expire Subcriptions Avialble in Admin Panel</h3></div>
            <div class='table-responsive'>
                <div class='table-responsive'>
                    <table class="table">
                        <thead>

                        <tr class ="table_heading">

                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Address</th>
                            <th>Zip Code</th>
                            <th>Create Date</th>
                            <th>Expire Date</th>



                        </tr>
                        </thead>
                        <tbody>
                        @foreach($expireddata as $expiridata)

                            <tr>

                                <td>{{$expiridata->first_name}}</td>
                                <td>{{$expiridata->last_name}}</td>
                                <td>{{$expiridata->country}}</td>
                                <td>{{$expiridata->state}}</td>
                                <td>{{$expiridata->city}}</td>
                                <td>{{$expiridata->address}}</td>
                                <td>{{$expiridata->zip_code}}</td>
                                <td>{{$expiridata->created_at}}</td>
                                <td>{{$expiridata->valid_till}}</td>



                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>


@endsection

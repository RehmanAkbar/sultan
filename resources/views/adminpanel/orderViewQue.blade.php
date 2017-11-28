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

        <div class="container-fluid">
            <div class="row" style="margin-top: 20px">
                <div class="col-md-12">
                    <div class="panel panel-primary">
            <div class="panel-heading"><h3>All Orders Views Avialble in Admin Panel</h3></div>
            <div class="panel-body">

        <div class='table-responsive'>
            <table class="table">
                <thead>

                <tr class ="table_heading">

                    <th>Brand Name</th>
                    <th>Product Name</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Status</th>
                    <th>Action</th>


                </tr>
                </thead>
                <tbody>
                @foreach($queue as $que)
                    <?php
                    $brand = Brand::where('id',$que->brand_id)
                        ->first();
                    $pro=Product::where('id',$que->product_id)
                        ->first();

                    ?>
                    <tr>

                        <td>{{$brand->brand_name}}</td>
                        <td>{{$pro->product_name}}</td>
                        <td>{{$que->month}}</td>
                        <td>{{$que->year}}</td>
                        <td>{{$que->status}}</td>
                        <td>
                            <a href="/editOrderQue/{{$que->id}}">
                                <button class="table_btton">Edit</button>
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
            </div>
        </div>
    </div>



@endsection

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
            <div class="panel-heading"><h3>Queue Order For {{ $queueUser->name }}</h3></div>
            <div class="panel-body">

        <div class='table-responsive'>
            <table class="table">
                <thead>
                <tr class ="table_heading">
                    <th>id</th>
                    <th>User Name</th>
                    <th>Brand Name</th>
                    <th>Product Name</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Status</th>
                    <th>Action</th>


                </tr>
                </thead>
                <tbody>
                @foreach($queords as $queorder)
                    <?php
                    $brand = Brand::where('id',$queorder->brand_id)
                        ->first();
                    $pro=Product::where('id',$queorder->product_id)
                        ->first();
                    $user=User::where('id',$queorder->user_id)
                        ->first();

                    ?>
                    <tr>
                        <td>{{$queorder->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$brand->brand_name}}</td>
                        <td>{{$pro->product_name}}</td>
                        <td>{{$queorder->month}}</td>
                        <td>{{$queorder->year}}</td>
                        <td>{{$queorder->status}}</td>
                        @if($loop->index % 2 == 0)
                        <td rowspan="2">
                            <a href="/pdf/{{$queorder->id}}">
                                <button class="btn btn-sm btn-success" style="margin-top: 13%;">Print Order</button>
                            </a>
                        </td>
                            @endif
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
            </div>
        </div>




@endsection
    </div>

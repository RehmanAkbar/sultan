@extends('adminpanel.master')
@section('title', 'Perfume Clube')
<?php
use App\Product;
use App\Queue;
use App\User;
use App\Order;
use App\Brand;
$user =User::where('id',$id)->first();

?>
@section('content')
    <div class="content-wrapper" style="margin-bottom: -20px;">
        <div class="container-fluid">
            <div class="row" style="margin-top: 20px">
                <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading"><h3>{{$user->name}} :: Orders</h3></div>
            <div class='table-responsive'>
                <div class='table-responsive'>
            <table class="table table-bordered ">
                <thead>

                <tr class ="table_heading">

                    <th>Sr#</th>
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
                    <tr @if($loop->index % 2 == 0)  @endif >
                        <td>{{$loop->index+1}}</td>
                        <td>{{$brand->brand_name}}</td>
                        <td>{{$pro->product_name}}</td>
                        <td>{{$que->month}}</td>
                        <td>{{$que->year}}</td>

                            <td>
                                <span class="label  {{( strtolower($que->status) == 'processing' ? 'label-warning' : 'label-success')}}">{{$que->status}}</span>
                            </td>

                        @if($que->status =="Processing")
                            @if($loop->index % 2 == 0)
                        <td rowspan="2">
                            <div class="btn-group" style="margin-top: 5%">
                            <a class="btn btn-warning btn-sm" href="/chang_status/{{$que->id}}">
                                Complete order
                            </a>
                            <a class="btn btn-danger btn-sm delete" data-delete="{{$que->id}}">
                                    Delete
                            </a>
                             </div>
                        </td>
                                @endif
                        @else
                            @if($loop->index % 2 == 0)
                            <td rowspan="2">
                                <div class="btn-group" style="margin-top: 5%">
                                <a class="btn btn-sm btn-success" href="/pdf/{{$que->id}}">
                                    Print Invoice
                                </a>
                                <a class="btn btn-danger btn-sm delete" data-delete="{{$que->id}}">
                                    Delete
                                </a>
                                    </div>
                            </td>
                                @endif
                        @endif
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
    <script>
        $(document).on('click' , '.delete' , function(){
            var id = $(this).data('delete');
            var params = id;
            bootbox.confirm({
                size: "small",
                message: "Are you sure?",
                callback: function(result){
                    if(result){
                        var url = "/que_delete/"+ id;

                        var successCallback = function (data) {
                            data = jQuery.parseJSON(data);
                            if (data.status == 'success')
                            {
                                window.location.reload();
                            } else
                            {
                            }
                        };
                        ajx(url, 'get', params, successCallback, 'html');

                    }
                }
            });
        })
    </script>

@endsection

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
                        <div class="panel-heading"><h3>Queue Order For {{ $queueUser->name }}</h3></div>
                        <div class="panel-body">

                            <div class='table-responsive'>
                                <table class="table table-striped table-bordered">
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
                                        <tr @if($loop->index % 2 == 0)  @endif >

                                            <td>{{$queorder->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$brand->brand_name}}</td>
                                            <td>{{$pro->product_name}}</td>
                                            <td>{{$queorder->month}}</td>
                                            <td>{{$queorder->year}}</td>
                                            <td>
                                                <span class="label  {{( strtolower($queorder->status) == 'processing' ? 'label-warning' : 'label-success')}}">
                                                {{$queorder->status}}
                                                </span>
                                            </td>
                                            @if($loop->index % 2 == 0)
                                                <td rowspan="2" style="background-color: whitesmoke;padding-top: 15px;">
                                                    <a class="btn btn-sm btn-warning" href="/chang_status/{{$queorder->id}}">
                                                        Complete Order
                                                    </a>
                                                    <a class="btn btn-danger btn-sm delete" data-delete="{{$queorder->id}}">
                                                        Delete
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


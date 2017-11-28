@extends('adminpanel.master')
@section('title', 'Dashbord')
<?php
        use App\Brand;
        use App\Product;
        use App\User;

?>
@section('content')
    <div class="content-wrapper">
        <section class="content">

            <div class="row" style="">

                <div class="col-md-12">
                    <div class="container-fluid">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>{{$brand_count}}</h3>

                                    <p>Total Brands</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="{{route('viewpanel')}}" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>


                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>{{ $pro_count }}</h3>

                                    <p>Products</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="{{route('productView')}}" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix visible-sm-block"></div>

                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>{{ $order_count }}</h3>

                                    <p>Orders</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <a href="{{route('dashbord')}}" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>


                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>{{ $users_count }}</h3>

                                    <p>User Registrations</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="{{route('userView')}}" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <!-- TABLE: LATEST ORDERS -->
            <div class="col-lg-12">

                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Latest Orders</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class='table-responsive'>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr class ="table_heading">
                                    <th>Sr#</th>
                                    <th>Product Name</th>
                                    <th>Brand Name</th>
                                    <th>User Name</th>
                                    <th>Month</th>
                                    <th>Year</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dashques as $dashque)
                                    <?php
                                    $brand = Brand::where('id',$dashque->brand_id)
                                            ->first();
                                    $pro=Product::where('id',$dashque->product_id)
                                            ->first();
                                    $user=User::where('id',$dashque->user_id)
                                            ->first();

                                    ?>

                                    <tr @if($loop->index % 2 == 0)  @endif >
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$pro->product_name}}</td>
                                        <td>{{$brand->brand_name}}</td>
                                        <td><a href="/queueOrder/{{$dashque->user_id}}">{{$user->name}}</a></td>
                                        <td>{{$dashque->month}}</td>
                                        <td>{{$dashque->year}}</td>
                                        <td><span class="label  {{( strtolower($dashque->status) == 'processing' ? 'label-warning' : 'label-success')}}">{{$dashque->status}}</span></td>
                                        @if($loop->index % 2 == 0)
                                            <td rowspan="2" style="background-color: whitesmoke;">
                                                <a href="/queueOrder-specific/{{$dashque->id}}">
                                                    <button class="btn btn-success btn-sm" style="margin-top: 10%; margin-left: 11%">View Order</button>
                                                </a>
                                            </td>
                                        @endif

                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {{--<a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>--}}
                        <a href="orderViewQue" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                    </div>
                    <!-- /.box-footer -->
                </div>

            </div>
        </section>
    </div>



@endsection



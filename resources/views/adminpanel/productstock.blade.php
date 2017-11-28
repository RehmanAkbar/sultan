@extends('adminpanel.master')
@section('title', 'Perfume Clube')
@section('custom_css')
    <style>

    </style>
@endsection
<?php
use App\Brand;

        $bra = Brand::orderby('brand_name', 'asc')->get();
?>

@section('content')
    <div class="content-wrapper" >
        <div class="row" style="">
            <div class="container-fluid" style="margin-top: 10px">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h3>All Product Stock</h3></div>

                        <div class="panel-body">
                            <div class='table-responsive'>
                                <div style="margin-top: 2%;margin-bottom: 2%; margin-left: 2%;">
                                    <label style="margin-right: 1%;">Select brand</label>
                                    <select class="br_id" name="brand_id" style="width: 20%;height: 30px;">
                                        <option value="">Select brand</option>
                                        @foreach($bra as $br)
                                            <option value="{{$br->id}}">{{$br->brand_name}}</option>
                                        @endforeach
                                    </select>
                                    <label style="margin-right: 1%;">Select product</label>

                                    <select class="pr_id"  name="product_id" style="width: 20%;height: 30px">
                                        <option value="">Select product</option>
                                    </select>

                                </div>
                                <table class="table table-bordered table-striped table-hover" id ="stock_table">
                                    <thead>
                                        <tr class ="table_heading">
                                            <th style=" text-align: center;">Brand Name</th>
                                            <th style=" text-align: center;">Product Name</th>
                                            <th style=" text-align: center;">Quantity</th>
                                            <th style=" text-align: center;">admin created date</th>
                                            <th style=" text-align: center;">admin updated date</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        @if(isset($stocks) && !empty($stocks))
                                            @foreach($stocks as $stock)
                                                <tr>

                                                    @if(isset($stock['product']))
                                                        <td class="center">{{ucfirst($stock['brand']->brand_name)}}</td>
                                                        <td>{{ucfirst($stock['product']->product_name)}}</td>
                                                        <td style=" text-align: center;">{{$stock['product']->quantity}}</td>
                                                        <td style=" text-align: center;">{{date('Y-m-d H:i:s',strtotime($stock->created_at))}}</td>
                                                        <td style=" text-align: center;">{{date('Y-m-d H:i:s',strtotime($stock->updated_at))}}</td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @endif
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
@section('custom_js')

<script>




        $(".br_id").change(function (){

        var params = {};
        var p_id = $(this).val();
        params.id = p_id;
        var url = ajax_url + 'get_product';

        var successCallback = function (res) {
            var options = '';
            res = jQuery.parseJSON(res);
            options += '<option value="">'+"Select product"+'</option>';
            $.each(res, function( index, value ) {
                console.log( value.product_name );
                options += '<option value="'+value.id+'">'+value.product_name+'</option>';
            });

            $(".pr_id").html(options);

        };

        ajx(url, 'get', params, successCallback, 'html');

    });
        $(".pr_id").change(function (){

            var params = {};
            var p_id = $(this).val();
            params.id = p_id;
            var url = ajax_url + 'getstock';

            var successCallback = function (res) {
                var  trHTML = '';
                res = jQuery.parseJSON(res);
               console.log(res);
                $.each(res, function( index, stock ) {

                    console.log(stock);
                    brand = stock.brand;
                    product = stock.product;
                    trHTML+= "<tr><td >" + brand.brand_name +"</td><td>"+
                          product.product_name + "</td><td>"+
                          product.quantity + "</td><td>"+
//                          res.user_name + "</td><td>"+
//                          res.stock_creat + "</td><td>"+
                          stock.created_at + "</td><td>"+
                          stock.updated_at + "</td></tr>";
                });

                $("#tbody").empty().append(trHTML);
//               $('#stock_table').append(trHTML);


            };

            ajx(url, 'get', params, successCallback, 'html');



        });
</script>


    @endsection
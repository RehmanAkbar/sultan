@extends('layouts.layout')
@section('custom_css')
<link href="{{URL::asset('css/detail-perfum.css') }}" rel="stylesheet">
<link href="{{URL::asset('css/perfum-model.css') }}" rel="stylesheet">

<link href="{{URL::asset('css/chekout.css') }}" rel="stylesheet">
<style>
    /*        table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                padding: 5px;
                text-align: left;
            }*/
    .panel-table .panel-body{
        padding:0;
    }

    .panel-table .panel-body .table-bordered{
        border-style: none;
        margin:0;
    }

    .panel-table .panel-body .table-bordered > thead > tr > th:first-of-type {
        text-align:center;
        width: 100px;
    }

    .panel-table .panel-body .table-bordered > thead > tr > th:last-of-type,
    .panel-table .panel-body .table-bordered > tbody > tr > td:last-of-type {
        border-right: 0px;
    }

    .panel-table .panel-body .table-bordered > thead > tr > th:first-of-type,
    .panel-table .panel-body .table-bordered > tbody > tr > td:first-of-type {
        border-left: 0px;
    }

    .panel-table .panel-body .table-bordered > tbody > tr:first-of-type > td{
        border-bottom: 0px;
    }

    .panel-table .panel-body .table-bordered > thead > tr:first-of-type > th{
        border-top: 0px;
    }

    .panel-table .panel-footer .pagination{
        margin:0; 
    }

    /*
    used to vertically center elements, may need modification if you're not using default sizes.
    */
    .panel-table .panel-footer .col{
        line-height: 34px;
        height: 34px;
    }

    .panel-table .panel-heading .col h3{
        line-height: 30px;
        height: 30px;
    }

    .panel-table .panel-body .table-bordered > tbody > tr > td{
        line-height: 34px;
    }

    @import url(http://fonts.googleapis.com/css?family=Roboto);

    /****** LOGIN MODAL ******/
    .loginmodal-container {
        padding: 30px;
        /* max-width: 350px; */
        width: 162%;
        background-color: #F7F7F7;
        margin: -19px auto;
        border-radius: 2px;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        overflow: hidden;
        font-family: roboto;
        margin-left: -176px;
    }

    .loginmodal-container h1 {
        text-align: center;
        font-size: 1.8em;
        font-family: roboto;
    }

    .loginmodal-container input[type=submit] {
        width: 100%;
        display: block;
        margin-bottom: 10px;
        position: relative;
    }

    .loginmodal-container input[type=text], input[type=password] {
        height: 44px;
        font-size: 16px;
        width: 100%;
        margin-bottom: 10px;
        -webkit-appearance: none;
        background: #fff;
        border: 1px solid #d9d9d9;
        border-top: 1px solid #c0c0c0;
        /* border-radius: 2px; */
        padding: 0 8px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .loginmodal-container input[type=text]:hover, input[type=password]:hover {
        border: 1px solid #b9b9b9;
        border-top: 1px solid #a0a0a0;
        -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
        -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
        box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
    }

    .loginmodal {
        text-align: center;
        font-size: 14px;
        font-family: 'Arial', sans-serif;
        font-weight: 700;
        height: 36px;
        padding: 0 8px;
        /* border-radius: 3px; */
        /* -webkit-user-select: none;
          user-select: none; */
    }

    .loginmodal-submit {
        /* border: 1px solid #3079ed; */
        border: 0px;
        color: #fff;
        text-shadow: 0 1px rgba(0,0,0,0.1); 
        background-color: #4d90fe;
        padding: 17px 0px;
        font-family: roboto;
        font-size: 14px;
        /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#4787ed)); */
    }

    .loginmodal-submit:hover {
        /* border: 1px solid #2f5bb7; */
        border: 0px;
        text-shadow: 0 1px rgba(0,0,0,0.3);
        background-color: #357ae8;
        /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#357ae8)); */
    }

    .loginmodal-container a {
        text-decoration: none;
        color: #666;
        font-weight: 400;
        text-align: center;
        display: inline-block;
        opacity: 0.6;
        transition: opacity ease 0.5s;
    } 

    .login-help{
        font-size: 12px;
    }

</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

@endsection
@section('contant')
<?php

Use App\Product;
use App\Brand;

$all_brands = App\Brand::all();

$user = Auth::User();
?>
@include('include.sub_header')

<div class="modal fade" id="subscribe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>Please confirm your details to proceed your Order For Month (<b class="month_b"></b>) </h1><br>
            <div class="col-lg-12">

                <div class="col-lg-4" id="registr_left">
                    <div class="col-lg-12"  align="center">
                        <img src="{{URL::asset('images/login/images/perfume_bottles_04.png')}}" width="204" height="375" alt="product"/>
                        <hr style="border-top-color:#bcbcbc;">
                    </div>
                    <div class="col-lg-12">
                        <div class="col-lg-12" style="padding:0px;">
                            <table style="width:100%;">
                                <tr>
                                    <td>Monthly Subscription</td>
                                    <td class="pull-right"> 395 Rs</td>
                                </tr>
                                <tr>
                                    <td>Shipping</td>
                                    <td class="pull-right"> Free</td>
                                </tr>
                                <tr>
                                    <td>Tax</td>
                                    <td class="pull-right"> 0.00 Rs</td>
                                </tr>
                            </table>

                        </div>

                        <div class="col-xs-12" style="padding:0px;"><hr style="border-top-color:#bcbcbc;"></div>

                        <div class="col-lg-12" style="padding:0px;">
                            <table style="width:100%;">
                                <tr>
                                    <td style="color:#ff0000;">Total</td>
                                    <td class="pull-right">399 Rs</td>
                                </tr>
        <!--                        <tr>
                                    <td>Hava a <span style="color:#441640;">Coupen Code</span>?</td>
                                </tr>-->
                            </table>

                        </div>


                    </div>
                </div>


                <div class="col-lg-7">
                    <div class="col-lg-12">
                        <h2 align="center" id="perfumetxt_clr">Month-To-Month Subscription</h2>
                        <p align="center" id="perfumetxt_clr">Monthly supply, Cash on delivery, Cancel any time</p>
                        <h4 id="chekbox_margn">Shipping Address</h4>
                        <form class="shiping_form" id="shiping_form">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <input type="hidden" name="user_id" value="{{$user->id}}"/>
                            <div class="col-sm-6" id="field_set">
                                <input class="form-control" placeholder="First Name" name="first_name" value="{{ $shipping_address->first_name }}" type="text">
                            </div>
                            <div class="col-sm-6" id="field_set">
                                <input class="form-control" placeholder="Last Name" name="last_name" value="{{ $shipping_address->last_name }}" type="text">
                            </div>
                            <div class="col-sm-7" id="field_set">
                                <input class="form-control" placeholder="Street Address" name="address" type="text" value="{{ $shipping_address->address }}">
                            </div>
                            <div class="col-sm-4" id="field_set">
                                <input class="form-control" placeholder="City" name="city" type="text" value="{{ $shipping_address->city }}">
                            </div>
                            <div class="col-sm-4" id="field_set">
                                <select class="cities form-control" name="state">
                                    <option value="Punjab">Punjab</option>
                                    <option value="Sindh">Sindh</option>
                                    <option value="Balochistan">Balochistan</option>
                                    <option value="NWFP">NWFP</option>
                                    <option value="Federal">Federal</option>
                                    <option value="Azad Kashmir">Azad Kashmir</option>
                                    <option value="Northern Areas">Northern Areas</option>
                                    <option value="KPK">KPK</option>
                                </select>
                            </div>
                            <div class="col-sm-12" id="field_set">
                                <select class="cities form-control" name="country" id="namefield">
                                    <option value="Pakistan"> Pakistan</option>
                                </select>
                            </div>
        <!--                    <input type="checkbox" name="vehicle" value="Bike" id="chekbox_margn">&nbsp; Use this address as my billing address-->
                            <div class="col-lg-12" align="right"><button type="submit" class="btn btn-primary active shiping_data" id="orderperfume">Place Order</button></div>
                        </form>
                    </div>
                </div>
            </div>

            <!--            <div class="login-help">
                            <a href="#">Register</a> - <a href="#">Forgot Password</a>
                        </div>-->
        </div>
    </div>
</div>


<div class="container" >
    <div class="row" style="margin-bottom: 14%;">
        @if(\Session::has('message'))
    <div class="alert alert-success" role="alert">
        <strong>Well done!</strong> {{ \Session::get('message') }}
    </div>
    @endif
        <!--<h1 style="padding-bottom: 1%;margin-left: 9%">Completed Queued Orders</h1>-->
        <br/><br/><br/>
        <div class="col-md-11" style="margin-left: 25px;">

            <div class="panel panel-success panel-table" style="margin-top: 4%;">
                <div class="panel-heading" style="background-color: lightgrey;">
                    <div class="row">
                        <div class="col col-xs-6">
                            <h3 class="panel-title">My Completed Queues</h3>
                        </div>
                        <div class="col col-xs-6 text-right">
                            <button type="button" onclick="window.location.href = '/per_detail';" class="btn btn-sm btn-primary btn-create">Add New Item in Queue</button>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-list">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Brand</th>
                                <th>Product</th>
                                <th>Month</th>
                                <th>Year</th>
                                <th>Status</th>
                                <th>Added Time</th>
                            </tr> 
                        </thead>
                        <tbody>
                        @if(isset($queue))
                            @foreach($queue as $que)
                            <?php
                            $product_b = App\Product::where('brand_id', $que->brand_id)->get();
                            ?>
                            <tr class="@if($loop->index % 2 == 0) @endif" style="background-color: cadetblue;">
                                <td>{{$loop->index+1}}</td>
                                <td>
<!--                                    <select class="brands form-control" disabled="disabled">
                                        <option>
                                            Choose new Product
                                        </option>-->
                                        @foreach($all_brands as $b)
                                        <!--<option value="{{ $b->id }}" @if($b->id == $que->brand_id) selected="selected" @endif>{{  $b->brand_name }}</option>-->
                                        @if($b->id == $que->brand_id){{  $b->brand_name }} @endif
                                        
                                        
                                        @endforeach
                                    </select>
                                </td>
                                <td>
<!--                                    <select class="products form-control" disabled="disabled">
                                        <option>
                                            Choose new Product
                                        </option>-->
                                        @foreach($product_b as $p)
                                        <!--<option value="{{ $p->id }}" @if($p->id == $que->product_id) selected="selected" @endif>{{  $p->product_name }}</option>-->
                                        @if($p->id == $que->product_id){{  $p->product_name }}@endif
                                        @endforeach
                                    </select>
                                </td>
                                <td>{{$que->month}}</td>
                                <td>{{$que->year}}</td>
                                <td>Completed</td>
                                <td><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($que->created_at))->diffForHumans() ?></td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>
                <div class="panel-footer">
                    <div class="row">
                        <span class="pull-right">{{ $queue->links() }}</span>
                    </div>
                </div>
            </div>

        </div></div></div>



@endsection
@section('custom_js')

<script>
    var queue_month = '';
    $(".subscribe_proceed").click(function(){
       
       $("#subscribe").modal();
       queue_month = $(this).attr("id");
       $(".month_b").text(queue_month);
       
    });

    $(".brands").change(function (e) {
        
        var thiss = $(this);
        var params = {};
        params.id = $(this).val();

        var url = "/get-brand-products";

        var successCallback = function (data) {
            data = jQuery.parseJSON(data);
            if (data.status == 'success')
            {
                var prod = '<option>Select any Product</option>';
                $.each(data.products, function (key, value) {
                    prod += '<option value='+value.id+'>'+value.product_name+'</option>';
                });
                
                thiss.parent().next().find(".products").html(prod);

            }
        };

        ajx(url, 'get', params, successCallback, 'html');

        e.preventDefault();
    });


    $(".shiping_form").validate({
        rules: {

            first_name: "required",
            last_name: "required",
            address: "required",
            city: "required",
            zip_code: "required",
            state: "required",
            country: "required"
        },

        highlight: function (element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function (error, element) {
            console.log(element);
            if (element.parent('.form-control').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function (form) {

        }

    });

    $(".shiping_data").click(function () {

        if ($("#shiping_form").valid())
        {
            $(".new_user").text("processing....");
            $(".new_user").attr("disabled", true);

            var params = $("#shiping_form").serialize();
            params += '&queue_month='+queue_month;
            
            var url = "/queue_update";

            var successCallback = function (data) {
                data = jQuery.parseJSON(data);
                if (data.status == 'success')
                {

                    window.location.href= '/my_queue_processing';
                } else
                {
                    alert(data.msg);
                    $(".new_user").text("Place Order");
                    $(".new_user").attr("disabled", false);
                }
            };

            ajx(url, 'post', params, successCallback, 'html');
        }

    });


</script>

@endsection

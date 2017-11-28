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
    #registr_left{
	border:1px solid #bcbcbc; 
	margin:20px
	}

#namefield{
	margin-bottom:20px;
	height:40px;
	border:1px solid #bcbcbc; 
	}
#chekbox_margn{
	margin-left:16px;
	}
#orderperfume{
    background-color:#ff0000;
    border-radius: 0px;
    padding-left: 20px;
    padding-right: 20px;
    border-color: transparent;
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


<div class="container"style="margin-bottom: 16%;">
    <div class="row" style="margin-top: 10%;">
        <h3 align="center">My Orders</h3>
        @if(\Session::has('message'))
    <div class="alert alert-success" role="alert">
        <strong>Thank You!</strong> {{ \Session::get('message') }}
    </div>
    @endif
        <!--<h1 style="padding-bottom: 1%;margin-left: 9%">Queued Orders</h1>-->
        <br/>

            @php
                $now = \Carbon\Carbon::now();
                $month =  $now->month;
            @endphp
            <ul class="nav nav-tabs">
                @for($i = $month; $i <= 12; $i++)
                    <li class="{{($month == $now->month) ?'active' : ''}}"><a data-toggle="tab" href="#{{ $now->format('F') }}">{{ $now->format('F') }}</a></li>
                    @php $now->addMonth(); @endphp
                @endfor
            </ul>

            @php
                $now = \Carbon\Carbon::now();
                $month =  $now->month;
                $product_count = 0;
                $qItem = 0;
            @endphp
            <div class="tab-content">
                @for($i = $month; $i <= 12; $i++)
                    <div id="{{ $now->format('F') }}" class="tab-pane fade {{($month == $now->month) ?'in active' : ''}}">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 ">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Gender</th>
                                            <th>Quantity</th>
                                            <th>Year</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Status</th>
                                            {{--<th> </th>--}}
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($queue as $q)
                                                @if(strtolower($q->month) == strtolower($now->format('F')))
                                                      <tr>
                                                            <td class="col-sm-7 col-md-5">
                                                                <div class="media">
                                                                    <a style="margin-right: 10px" class="thumbnail pull-left" href="#"> <img class="media-object" src="{{asset($q['products']->image)}}" style="width: 72px; height: 72px;"> </a>
                                                                    <div  class="media-body">
                                                                        <h4 class="media-heading"><a href="#">{{$q['products']->product_name}}</a></h4>
                                                                        <h5 class="media-heading"> by <a href="#">{{$q['brand']->brand_name}}</a></h5>
                                                                        <span>Status: </span><span class="text-success"><strong>{{($q['products']->quantity > 0 ? 'In Stock' : 'Out of Stock' )}}</strong></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                          @if($q['products']->men == 'yes' && $q['products']->women == 'yes' )
                                                            <td class="col-sm-1 col-md-1" style="text-align: center">
                                                                Men,Women
                                                            </td>
                                                              @elseif($q['products']->men == 'yes')
                                                              <td class="col-sm-1 col-md-1" style="text-align: center">
                                                                  Men
                                                              </td>
                                                              @elseif($q['products']->women == 'yes')
                                                              <td class="col-sm-1 col-md-1" style="text-align: center">
                                                                  Women
                                                              </td>
                                                          @endif
                                                              <td class="col-sm-1 col-md-1" style="text-align: center">
                                                                  1
                                                              </td>
                                                              <td class="col-sm-1 col-md-1" style="">{{$q->year}}</td>
                                                            <td class="col-sm-1 col-md-1 text-center"><strong>200</strong></td>
                                                            <td class="col-sm-1 col-md-1 text-center"><span class="label label-warning">{{$q->status}}</span></td>
                                                            {{--<td class="col-sm-1 col-md-1">
                                                                <button type="button" class="btn btn-danger">
                                                                    <span class="glyphicon glyphicon-remove"></span> Remove
                                                                </button>
                                                            </td>--}}
                                                      </tr>
                                                      @php

                                                          $qItem = $q;

                                                      @endphp
                                                @endif
                                            @endforeach
                                            <tr>
                                                <td>   </td>
                                                <td>   </td>
                                                <td>   </td>
                                                <td>   </td>
                                                <td><h3>Total</h3></td>
                                                <td class="text-right"><h3><strong>{{(isset($qItem->id)) ? 'Rs. 400' : '0'}}</strong></h3></td>
                                            </tr>
                                            <tr>
                                                <td>   </td>
                                                <td>   </td>
                                                <td>   </td>
                                                <td>   </td>
                                                <td>
                                                    <button type="button" onclick="window.location.href = '{{route("perDetail")}}';" class="btn btn-default">
                                                        <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" {{(isset($qItem->status))  ? ($qItem->status == 'Processing') ?'disabled' :'' : 'disabled'}} class="btn btn-success subscribe_proceed"  data-qid="{{(isset($qItem->id)) ? $qItem->id : ''}}"  id="{{(isset($qItem->month)) ? $qItem->month : '' }}">
                                                        Checkout <span class="glyphicon glyphicon-play"></span>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
                    @php $now->addMonth(); $qItem = null; @endphp

                @endfor
            </div>
        </div>
    </div>

<div class="modal fade" id="place_order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <div class="form_area">
                <h1>Please confirm your details to proceed your Order For Month (<b class="month_b"></b>) </h1><br>
                <div class="col-lg-12">

                    <div class="col-lg-4" id="registr_left">
                        <div id="image_div" class="col-lg-12"  align="center">

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
                                </table>

                            </div>

                            <div class="col-xs-12" style="padding:0px;"><hr style="border-top-color:#bcbcbc;"></div>

                            <div class="col-lg-12" style="padding:0px;">
                                <table style="width:100%;">
                                    <tr>
                                        <td style="color:#ff0000;">Total</td>
                                        <td class="pull-right">395 Rs</td>
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
                            <h4 id="chekbox_margn" style="margin-left: 15px;">Shipping Address</h4>
                            <form class="shiping_form" id="shiping_form">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <input type="hidden" name="user_id" value="{{$user->id}}"/>
                                <div class="col-sm-6" id="field_set">
                                    <input class="form-control" placeholder="First Name" name="first_name" value="{{ $shipping_address->first_name }}" type="text">
                                </div>
                                <div class="col-sm-6" id="field_set">
                                    <input class="form-control" placeholder="Last Name" name="last_name" value="{{ $shipping_address->last_name }}" type="text">
                                </div>
                                <div class="col-sm-12" id="field_set">
                                    <input class="form-control" placeholder="Street Address" name="address" type="text" value="{{ $shipping_address->address }}">
                                </div>
                                <div class="col-sm-4" id="field_set">
                                    <input class="form-control" placeholder="City" name="city" type="text" value="{{ $shipping_address->city }}" style="height:45px; border-radius: 0px;">
                                </div>
                                <div class="col-sm-4" id="field_set">
                                    <select class="cities form-control" name="state" style="height:45px; border-radius: 0px;">
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
                                    <select class="cities form-control" name="country" id="namefield" style="height:45px; border-radius: 0px;">
                                        <option value="Pakistan"> Pakistan</option>
                                    </select>
                                </div>
                                <div class="col-sm-12" id="field_set">
                                    <input class="form-control" placeholder="Use Referral code" name="ref_id" type="text" value="" style="height:45px; border-radius: 0px;">
                                </div>
                                <!--                    <input type="checkbox" name="vehicle" value="Bike" id="chekbox_margn">&nbsp; Use this address as my billing address-->
                                <div class="col-lg-12" align="right"><button type="submit" class="btn btn-primary active shiping_data" id="orderperfume" style="margin-top: 20px;">Place Order</button></div>
                            </form>
                        </div>
                    </div>
                </div>

                <!--            <div class="login-help">
                                <a href="#">Register</a> - <a href="#">Forgot Password</a>
                            </div>-->
            </div>
            <div class="submitted_message col-md-12" style="display:none">

                <h1>
                    Confirmed
                </h1>
                <p>
                    Your order has been successfully placed. Please check your email for the order status.
                    You will be mailed when the order is mailed for delivery. Cash will be collected from the shipping address at delivery.

                </p>
                <br/>
                <a class="confirm" href="#"><button class="btn  center" style="background-color:green; color: white;">Check Orders</button></a>

            </div>


        </div>
    </div>
</div>


@endsection
@section('custom_js')

<script>
    var queue_month = '';

    $(".subscribe_proceed").click(function(e){

        $this = $(this);

            $("#image_div").empty();
            var params = {};
            var id = $this.data('qid');
//            params.id = id;

            var url = "/get-queue/img/"+id;

            var successCallback = function (data) {

                data = jQuery.parseJSON(data);

                if (data.status == 'success') {

                    if(data.count == 2){
                        $.each(data, function(index, product){
                            if(product.image != undefined) {
                                $("#image_div").append(
                                        '<img src="' + product.image + '" width="130" height="150" alt="product"/>' +
                                        '<hr style="border-top-color:#bcbcbc;">'
                                );
                            }

                        });
                        $('#place_order').modal();
                        queue_month = $this.attr("id");
                        $(".month_b").text(queue_month);
                    }else{

                        alert("Add one more item in queue");

                    }

                }
            };

            ajx(url, 'get', params, successCallback, 'html');

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
                    $(".form_area").slideUp();
                    $(".submitted_message").slideDown();
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
$('.confirm').click(function(){
    window.location.reload();
});

</script>



@endsection

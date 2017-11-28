@extends('layouts.layout')
@section('custom_css')

<link href="{{URL::asset('css/perfum_order.css') }}" rel="stylesheet">
<link href="{{URL::asset('css/detail-perfum.css') }}" rel="stylesheet">
<link href="{{URL::asset('css/perfum-model.css') }}" rel="stylesheet">
<link href="{{URL::asset('css/chekout.css') }}" rel="stylesheet">
<script src="{{asset('js/sweetalert2.min.js')}}"></script>
<link href="{{asset('css/sweetalert2.min.css') }}" rel="stylesheet">

<style>

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
    #tags_area{
            margin-top: 0px;
            background-color: black;
            color: white;
            width: 94%;
            padding-bottom: 3px;
            text-decoration:none;
        }
    #tags_area2{
            margin-top: 0px;
            background-color: black;
            color: white;
            width: 94%;
            padding-bottom: 3px;
            text-decoration:none;
        }
        h6:hover{
            color: red !important;
        }  
        .closebtn{
            padding-right: 2px;
            padding-left: 2px;
            padding-bottom: 0px;
            padding-top: 0px;
            background-color: lightgrey;
            border: 1px solid black;
            border-radius: 50%;
            font-size: 11px;
        }
        .resposivecls_btn{
            margin-top: -15px;
            margin-right: -20px;
            color: red;
        }
    .success_btn{
        margin-top: -15px;
        color: green;
    }
        @media(max-width:768px){
            #div_padding{
                padding: 0px;
            }
            .resposivecls_btn{
            margin-top: -15px;
            margin-right: -41px;
            color: red;
        }
        #month_parent{
            padding-right: 0px;
            margin-top: 20px;
        }
        }
        @media(max-width:992px){
            #div_padding{
                padding: 0px;
            }
            .resposivecls_btn{
            margin-top: -15px;
            margin-right: -41px;
            color: red;
        }
        #month_parent{
            padding-right: 0px;
             margin-top: 20px;
        }
        }
    .breadcrumb{
        background-color: white;
    }
    ul.breadcrumb {
        padding: 10px 16px;
        list-style: none;

    }
    ul.breadcrumb li {
        display: inline;
        font-size: 14px;
        color: #ca3838;
    }
    ul.breadcrumb li+li:before {
        padding: 8px;
        color: black;
        content: "";
    }


    .container-overlay {
        transition: .5s ease;
        opacity: 1;
        position: absolute;
        top: 40%;
        left: 50%;
        width: 35%;
        height: 35%;
        border: 2px solid hsla(0,0%,100%,.3);
        background-color: rgba(0,0,0,.7);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%)

    }


    .check {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 60%;
        height: 30%;
        background: transparent;
        border: 2px solid #fff;
        border-top: none;
        border-right: none;
        right: 0;
        bottom: 0;
        margin: auto;
        transform: rotate(-45deg) translateX(5%) translateY(-10%);

    }

    .remove_tag{
        margin-left: 4px;
        cursor: pointer;
        color: #c3bfbf ;
        font-size: 12px;
    }

</style>
@endsection
@section('contant')
<?php

Use App\Product;
use App\Brand;
use App\Queue;
use App\Order;

$user = Auth::User();
$co = Queue::where('user_id',$user->id)
        ->where('status','=','pending')->get();
        $count=count($co);
$subscribe = Order::where("user_id", "=", $user->id)
        ->where("status", "=", "processing")
        ->first();
?>
@include('include.sub_header')

<div class="modal fade" id="affiliate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="loginmodal-container" style="margin-top: 100px;">
            <h1>List down your friends email's address and Share this Opportunity </h1><br>
            <div class="col-lg-12 col-sm-12 col-xs-12">

                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <h2 align="center" id="perfumetxt_clr">{{ $user->name }} Sharing Opportunity with you:</h2>
                        <p align="center" id="perfumetxt_clr">Ask your friends to use this code: {{ $user->promo }}</p>
                        <h4 id="chekbox_margn">Email List</h4>
                        <form class="affiliate_form" id="affiliate_form">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <input type="hidden" name="user_id" value="{{$user->id}}"/>
                            <div class="col-sm-12 col-lg-12 col-xs-12" id="field_set">
                                <input class="form-control" placeholder="Email .." name="email[]" value="" type="text">
                            </div>
                            <div class="col-sm-12 col-lg-12 col-xs-12" id="field_set">
                                <input class="form-control" placeholder="Email .." name="email[]" value="" type="text">
                            </div>
                            <div class="col-sm-12 col-lg-12 col-xs-12" id="field_set">
                                <input class="form-control" placeholder="Email .." name="email[]" value="" type="text">
                            </div>
                            <div class="col-sm-12 col-lg-12 col-xs-12" id="field_set">
                                <input class="form-control" placeholder="Email .." name="email[]" value="" type="text">
                            </div>
                            <div class="col-sm-12 col-lg-12 col-xs-12" id="field_set">
                                <input class="form-control" placeholder="Email .." name="email[]" value="" type="text">
                            </div>
                            <div class="col-lg-12 col-lg-12 col-xs-12" align="right"><button type="submit" class="btn btn-primary active affiliate_data" id="orderperfume">Start Sharing</button></div>
                            <div class="alert alert-success alert_shared" role="alert" style="display:none">
                                <strong>Well done!</strong> You have successfully shared this Opportunity!
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if($user->is_verified == 'N')
<div  class="col-lg-12 alert-danger" style="display: none" ><h4 id="verify" align="center" ></h4>
</div>
@endif
<div class="col-lg-12" style="background-color: black" >
<div class="container" >

    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" >
        <!--        <form>
                    <input type="text" name="search" placeholder="Search..">
        
                </form>-->
        <button type="button" class="get-free-cologene" style="margin-top:7px;">
            <span class="glyphicon glyphicon-gift pull-left" ></span>
            <h5 style="margin:0px;" onclick="$('#affiliate').modal();" align="center">Get Affiliate</h5>

        </button>
    </div>
    <div class="col-lg-5 col-md-5 col-sm-4 col-xs-4">
        <img  src="{{URL::asset('images/logo.png')}}" width="200" height="50" alt="logo" style="margin-left: 28%;">
        {{--<h3 style="color:#441640; margin-top:10px;" align="center" >Perfume Club</h3>--}}
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 col-xs-offset-1" align="center">
        <a class="checkout" href="">
        <button type="button" class="get-free-cologene btn-small" style="margin-top:7px;">
            Checkout
             <span class="glyphicon glyphicon-shopping-cart" ></span>
            <span id="count" class="badge " style="margin-top: -5%;margin-left: -3%; background-color: transparent">{{$count}}</span>
        </button>
        </a>
    </div>
</div></div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide" align="center">
    <nav >
        <div class="container  hide">

            <ul class="nav navbar-nav">
                <li class="active" ><a href="#" style="color:#000000;"><b>Perfumes</b></a></li>

                <li><a href="#" ><p style="color:#000000;"><b>Recommendations</b></p></a></li>

                <li><a href="#" ><p style="color:#000000;"><b>Gift Set</b></p></a></li>

                <li><a href="#" ><p style="color:#000000;"><b>Brands</b></p></a></li>
            </ul>
        </div>
    </nav>
</div>




<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
    @if(\Session::has('message'))
    <div class="alert alert-success" role="alert">
        <strong>Well done!</strong> {{ \Session::get('message') }}
    </div>
    @endif
    <hr style="color:#000000; margin:0px;">
</div>
<div class="container" style="margin-top:10px;">
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" id="full_width"  align="center">
        @include('include.sidebar')
    </div>

    <div class="col-lg-6 col-md-6 col-sm-7 col-xs-7" id="div_padding" style="margin-top: 0%;">
        <form name="style_form">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 0px;">

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" align="center" style="  padding-right: 0px; right: 15px;">
                    <h4 align="center"  style="color:#000000;">Style</h4>

                        @foreach($style as $sty)
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 " style="padding-right: 0px;padding-left: 0px;">
                                <a  href="javascript:void(0)" class=" style_filter " data-slug="{{$sty->slug}}" style="text-decoration:none;">

                                    <img src="{{URL::asset($sty->image)}}"  height="100" width="120" />
                                    <h6 align="center" id="tags_area" >
                                        <label><input id="tag_{{$sty->id}}" class="" style="opacity: 0" type="checkbox" name="style_id[]" value="{{$sty->id}}">{{ucfirst($sty->tag_name)}}</label>
                                    </h6>
                                    <div style="display: none;" class="container-overlay">
                                        <div class="check"></div>
                                    </div>
                                </a>

                            </div>
                        @endforeach

                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" align="center" >
                    <h4  style="color:#000000;">Occasion</h4>
                        @foreach($occasion as $occa)
                           {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding-right: 0px;padding-left: 0px;">
                                <a href="javascript:void(0)" class="style_filter" style="text-decoration:none;">
                                    <img src="{{URL::asset($occa->image)}}" height="100" width="113" />
                                    <h6 align="center" id="tags_area2">
                                        <label><input  style="opacity: 0" type="checkbox" name="style_id[]" value="{{$occa->id}}">{{$occa->tag_name}}</label>
                                    </h6>
                                </a>
                            </div>--}}
                            <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding-right: 0px;padding-left: 0px;">
                                <a href="javascript:void(0)" class=" style_filter" style="">
                                    <img src="{{URL::asset($occa->image)}}" class="image" height="100" width="113" />
                                    <h6 align="center" id="tags_area2">
                                        <label><input id="tag_{{$occa->id}}"   style="opacity: 0" type="checkbox" name="style_id[]" value="{{$occa->id}}">{{ucfirst($occa->tag_name)}}</label>
                                    </h6>
                                    <div style="display: none;" class="container-overlay">
                                        <div class="check"></div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                </div>
            </div>
        </form>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  align="center">
            {{--<h2>Products</h2>--}}
            <div class="col-lg-12">
                <ul id="selected_tag" align="left" class="breadcrumb">

                </ul>
            </div>
            <div id="products">
                @if(isset($products) &&  !empty($products))
                    @foreach($products as $pro)
                        @if($pro->quantity > 0)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 hover-button showhim" style="height: 225px; margin-bottom: 30px;" >
                                <img src="{{URL::asset($pro->image)}}" data-brand="{{$pro['brand']->id}}" data-pro="{{$pro->id}}" class="draggable"  width="100%" height="70%"/>
                                <div class="showme">
                                    <button type="button" class="Quick-view-button quick_model" id="{{$pro->id}}"  >
                                        <p>Quick View</p>
                                    </button>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
                                    <h5 style="margin-bottom:0px; margin-top:5px; color:black;" > {{$pro->product_name}} </h5>
                                    <h4 style="margin-bottom:0px; margin-top:0px; color:#441640;" >&emsp;<b>{{$pro['brand']->brand_name}}</b> </h4>
                                </div>
                                <div class="add-que11">
                                    <button type="submit" class="add-queu add_to_queu " >
                                        <input type="hidden" name="_token" class="hidden_token" value="{{csrf_token()}}"/>
                                        <input type="hidden" class="pro_id_qu" value="{{$pro->id}}">
                                        <input type="hidden" class="bra_id_qu" value="{{$pro['brand']->id}}">
                                        <p style="margin-top:4px;">Add to queue</p>
                                    </button>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>

        </div>
    </div>
    <?php
    $date = date('Y-m-d H:i:s');
    $year = date("Y");
    $months = array();
    $num = date("n", strtotime($date));
    array_push($months, date("F", strtotime($date)));

    for ($i = ($num + 1); $i <= 12; $i++) {
        $dateObj = DateTime::createFromFormat('!m', $i);
        array_push($months, $dateObj->format('F'));
    }
    ?>
    <div id="month_parent" class="col-lg-3 col-md-3 col-sm-5 col-xs-5" style="margin-bottom:20px;" >
        <h4 align="center" style="color:#553251;">My Perfume Queue</h4>
        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 border-myperfum-queu" style="background-color:#f0f0f0;">

            @foreach($months as $month)
            <?php $image = 'images/detail/jar2_03.png'; ?>
            <?php
            $que = \App\Queue::where('user_id', $user->id)
                    ->where('month', $month)
                    ->where('year', $year)
                    ->first();
            ?>
            <?php
            if (!is_null($que)) {
                $pro = App\Product::where('id', $que->product_id)->first();

                if (!is_null($pro)) {
                    $image = $pro->image;
                    $class = 'added';
                    if( strtolower($que->status)  == "pending"){
                        $class .= ' droppable';
                    }
                    $pr_id = $que->id;
                } else {
                    $image = 'images/detail/jar2_03.png';
                    $class = 'no_added droppable';
                    $pr_id =0;
                }
            } else {
                $image = 'images/detail/jar2_03.png';
                $class = 'no_added droppable';
                $pr_id =0;
            }
            ?>
            <!--            <a href="#" class="month-hover hover-botal">-->
            <div class="row">
                <div class="col-lg-offset-1 col-lg-4 col-md-4 col-sm-4 col-xs-4 border-myperfum-botls del"  style="background-color:white; margin-top:10px; margin-left:20px; padding-top:5px; padding-bottom:5px;">
                  <div class="pull-right resposivecls_btn">
                      @if(isset($que))
                        @if( strtolower($que->status)  == "pending")
                            <button type="button" class="btn-small closebtn" >
                                <span id="{{$pr_id}}" class="glyphicon glyphicon-remove"></span>
                            </button>
                          @else
                              <button type="button" class="btn-small success_btn closebtn" >
                                  <span class="glyphicon glyphicon-ok"></span>
                              </button>
                        @endif
                          @endif
                    </div>
                    <img class="{{ $class }} " data-queu="{{$pr_id}}" data-month="{{$month}}" src="{{URL::asset(@$image)}}" width="40" height="60" />
                </div>


                <?php $image = 'images/detail/jar2_03.png'; ?>
                <?php
                $que = \App\Queue::where('user_id', $user->id)
                        ->where('month', $month)
                        ->where('year', $year)
                        ->skip(1)
                        ->first();
                ?>
                <?php
                if (!is_null($que)) {
                    $pro = App\Product::where('id', $que->product_id)->first();

                    if (!is_null($pro)) {
                        $image = $pro->image;
                        $class = 'added';
                        if( strtolower($que->status)  == "pending"){
                            $class .= ' droppable';
                        }
                        $pr_id = $que->id;
                    } else {
                        $image = 'images/detail/jar2_03.png';
                        $class = 'no_added droppable';
                        $pr_id =0;
                    }
                } else {
                    $image = 'images/detail/jar2_03.png';
                    $class = 'no_added droppable';
                    $pr_id =0;
                }
                ?>
                <div class="col-xs-offset-1 col-lg-4 col-md-4 col-sm-4 col-xs-4 border-myperfum-botls del"  style="background-color:white; margin:10px 10px 0px 20px;padding-top:5px; padding-bottom:5px;">
                    <div class="pull-right resposivecls_btn" >
                        @if(isset($que))
                            @if(strtolower($que->status)  == "pending")
                                <button type="button" class="btn-small closebtn" >
                                    <span id="{{$pr_id}}" class="glyphicon glyphicon-remove"></span>
                                </button>
                                @else
                                <button type="button" class="btn-small success_btn closebtn" >
                                    <span class="glyphicon glyphicon-ok"></span>
                                </button>
                            @endif
                        @endif
                    </div>
                    <img class="{{ $class }} {{(isset($que))?(strtolower($que->status))  == "pending" ? "droppable" : '' : ''}}" data-queu="{{$pr_id}}" data-month="{{$month}}" src="{{URL::asset(@$image)}}" width="40" height="60" />
                </div>

                <!--</a>-->
                <div class="months col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <h4  align="center" style="color:red;">{{$month}}</h4>
                    <input  type="hidden" class="que_month" value="{{$month}}">
                </div>
            </div>

            @endforeach
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" id="mobile_width"  align="center">
        @include('include.sidebar')
    </div>
</div>



<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content"  style="width:85%;">
                <div class="modal-header" style="border-bottom:0px;">

                </div>
                <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1   col-lg-10 col-md-10 col-sm-10 col-xs-10" id="model-bordr">
                    <button type="button" class="close" id="clos-cross" data-dismiss="modal">&times;</button>
                    <div class="col-lg-12" align="center" style="margin-bottom: 10px;">
                    <img src="images/botals_10.png" class="modal_image" id="first"  style="width: 141px; height: 200px;"/> 
                    </div>
                    <h4 align="center" style="margin-bottom:0px;"><b class="modal_brand"></b></h4>
                    <h4 class="modal_product" align="center" style="color:#8a8a8a; margin-top:0px;"></h4>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <img src="images/botals_10.png"/> </div>
                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" style="padding:0px;">
                            <h3 style="color:#5b5c60; margin-bottom:0px; margin-top:10px;">Subscription price: <span style="color:black;">Rs 395</span></h3>
                            <h4 style="margin-top:0px; color:#5b5c60;">30-day supply of this scent</h4>
                            <p  class="description"></p>
                        </div>
                        <div id="modal_btn" class="row">

                        </div>

                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide" style="margin-top:10px; margin-bottom:10px;">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="bordr-subscripton" >
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-left:0px;">
                                    <img src="images/smal-bootls_15.png" height="38"/> </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                    <h5 style="margin-bottom:0px; margin-top:5px;">0.27 OZ</h5>
                                    <h5 style="margin-top:0px;">subscription</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 subscription-margin-model cart-dive" id="bordr-subscripton" >
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-left:0px;">
                                    <img src="images/smal-bootls_15.png" height="38"/> </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                    <h5 style="margin-bottom:0px; margin-top:5px;">0.27 OZ</h5>
                                    <h5 style="margin-top:0px;">a la carte</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <hr id="hr-model" style="border-top-color:#d4d4d4;">
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide">
                        <h4 style="color:#441640;">MAIN NOTES</h4>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide" style="margin-bottom:10px;">
                        <ul class="list-inline" >
                            <li  style="padding-right:0px;">
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Hooray!">
                                    <img src="images/pic_19.png"  class="image-width-model"/></a></li>
                            <li style="padding-right:0px;" >
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Hooray!">
                                    <img src="images/pic_19.png" class="image-width-model"/></a></li>
                            <li style="padding-right:0px;">
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Hooray!">
                                    <img src="images/pic_19.png" class="image-width-model"/></a></li>
                            <li style="padding-right:0px;">
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Hooray!">
                                    <img src="images/pic_19.png" class="image-width-model"/></a></li>
                        </ul>

                    </div>

                </div>
                <div class="modal-footer" style="border-top:0px; padding-bottom: 41px; ">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom_js')
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>

     counter = $('.added').length;
     empty_img = $('.no_added');
     index = 0;
    $.notifyDefaults({
        type: 'danger',
        element: 'body',
        position: null,
        allow_dismiss: true,
        offset: {
            x: 0,
            y: 100
        },
        spacing: 10,
        delay: 0,
        z_index: 1031,
        template:'<div data-notify="container" class="col-xs-12 col-sm-12 alert alert-{0}" role="alert">' +
                    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                    '<span data-notify="icon"></span> ' +
                    '<span data-notify="title">{1}</span> ' +
                    '<span class="col-sm-offset-6" data-notify="message">{2}</span>' +
                    '<div class="progress" data-notify="progressbar">' +
                    '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
    });

    if("{{$user->is_verified}}" == 'N'){
     var no ='Please verify your email for proceding orders!';
      $('#verify').text(no);
//        $.notify('Please verify your email for proceding orders!');

    }


    
    $('.draggable').draggable({
        revert: "invalid",
        stack: ".draggable",
        helper: 'clone',
        cursor: "move",
        containment: "document",
});

    $('.droppable').droppable({

    accept: ".draggable",
    drop: function (event, ui) {

        var droppable = $(this);
        var draggable = ui.draggable;

        var img = draggable.attr("src");
        droppable.attr("src", img);


        var id = droppable.prev().find('.glyphicon-remove').attr('id');
        if(id != null){
            var url = ajax_url + 'que_pro_de/'+id;
            var successCallback = function (res) {
                res = jQuery.parseJSON(res);

                if (res.status == true)
                {
                    $(this).parents('.del').find('.glyphicon-remove').remove();

                    $(this).parents('.del').find('img').attr("src","{{asset('images/detail/jar2_03.png')}}");
//                    $(this).parent().parent().parent().find("img").attr("src","images/detail/jar2_03.png");
                }else {
                    alert('You are not able to replace this item because your order is completed');
                }
            };

            ajx(url, 'get', id, successCallback, 'html');
        }

        var month = $('#month_parent').find('img').eq(counter);

        var params = {};
        params.Month = droppable.data('month');
        params.bra_id = ui.draggable.attr("data-brand");
        params.pro_id = ui.draggable.attr("data-pro");
        params._token = $('.hidden_token').val();
        counter++;
        var url = ajax_url + 'add_queue';
        var successCallback = function (res) {
            res = jQuery.parseJSON(res);

            if(res.status){

                droppable.prev().empty().append(
                        '<button type="button" class="btn-small closebtn" >'+
                        '<span id="'+ res.id +'" class="glyphicon glyphicon-remove"></span>'+
                        '</button>'
                );
                $("#count").text(res.count);
            }

            if (res.status == "false") {
                window.location.href = ajax_url +'ship_form/'+res.id ;
            }
        };

        ajx(url, 'post', params, successCallback, 'html');
//
//        $(droppable.prev().find('.glyphicon-remove')).trigger('click');
//

    }
});

     $(document).on('click', '.remove_item' , function(){

         var params = {};
         params.rowId = $(this).data('rowid');
         params._token = "{{csrf_token()}}";

         var url = ajax_url + 'remove_from_cart';

         var successCallback = function (res) {

             var response = JSON.parse(res);

             $("#perfumecart_width").empty().append(response.itemsList);
             $("#cart_count").text(response.count);


         };

         ajx(url, 'post', params, successCallback, 'html');

     });


     $(document).on('click', '.add_to_cart' , function(e){

         $this = $(this);
         var params = {};
         params.product_id = $this.data('productid');
         params.product_name = $this.data('name');
         params._token = "{{csrf_token()}}";

         console.log(params);
         var url = ajax_url + 'add_to_cart';

         var successCallback = function (res) {

             var response = JSON.parse(res);

             $("#perfumecart_width").empty().append(response.itemsList);
             $("#cart_count").text(response.count);
             $("#myModal").modal('hide');

         };

         ajx(url, 'post', params, successCallback, 'html');

         e.preventDefault();
         e.stopPropagation();
     });

    $(document).on('click','.glyphicon-remove',function (){

        var id = $(this).attr("id");
        var $this = $(this);
        var url = ajax_url + 'que_pro_de/'+id;
        var successCallback = function (res) {
            res = jQuery.parseJSON(res);

            if (res.status) {

                console.log("remove " + index);
                $this.parents('.del').find('img').attr("src","{{asset('images/detail/jar2_03.png')}}");
                $this.parents('.del').find('img').addClass("no_added");
                $this.parents('.del').find('.glyphicon-remove').remove();
                $("#count").text(res.count);
                empty_img = $('.no_added');
                index = 0;
                if(index != 0){
                    index--;
                }

//                window.location.reload();
            }else {
                alert('You are not able to delete this item because your order is completed');
            }
        };

        ajx(url, 'get', id, successCallback, 'html');
    });

    $(document).on('click',".quick_model",function () {
        var id = $(this).attr("id");

        var url = ajax_url + 'model_view/' + id;
        var successCallback = function (res) {
            res = jQuery.parseJSON(res);

            if (res.status == true)
            {
                $(".modal_brand").text(res.brand);
                $(".modal_product").text(res.product);
                $(".description").text(res.des);
                $(".modal_image").attr('src', res.imag);

                $("#modal_btn").empty().append(

                        '<div class="col-d-12">'+
                            '<div class="col-md-6">'+
                                '<button type="button" class="add-queu-button add_to_queu_modal" data-brandid='+ res.brand_id +' data-productid='+ res.product_id +' style="margin-top:7px; margin-bottom: 20px;">'+
                                    '<h4 style="margin:0px;">Add to queue</h4>'+
                                '</button>'+

                            '</div>'+
                            '<div class="col-md-6">'+
                                '<button type="button" class="add-queu-button add_to_cart" data-productid='+ res.product_id +' data-name='+res.product+' style="margin-top:7px; margin-bottom: 20px;">'+
                                    '<h4 style="margin:0px;">Add to Cart</h4>'+
                                '</button>'+
                            '</div>'+
                        '</div>'


                );
    /*
                    $(".add_to_cart").attr('', res.product_id);
                    $(".add_to_cart").attr('data-name', res.product);*/
                $("#myModal").modal('show');


            }
        };

        ajx(url, 'get', id, successCallback, 'html');
    });


// add to query
    $(document).on('click', '.add_to_queu' ,function () {

        var img = $(this).parent().parent().find("img").attr("src");


        var month = $('#month_parent').find('img').eq(counter);

        empty_img[index].src = img;

        var params = {};
        params.Month = empty_img.eq(index).parent().parent().find(".que_month").val();
        params.bra_id = $(this).parent().find('.bra_id_qu').val();
        params.pro_id = $(this).parent().find('.pro_id_qu').val();
        params._token = $('.hidden_token').val();
        var url = ajax_url + 'add_queue';

        var successCallback = function (res) {

            res = jQuery.parseJSON(res);

            empty_img.eq(index).removeClass('no_added');

            empty_img.eq(index++).prev().empty().append(
                    '<button type="button" class="btn-small closebtn" >'+
                    '<span id="'+ res.id +'" class="glyphicon glyphicon-remove"></span>'+
                    '</button>'
            );
                    $("#count").text(res.count);

            if (res.status == "false")
            {
                window.location.href = ajax_url +'ship_form/'+res.id ;
            }
        };

        ajx(url, 'post', params, successCallback, 'html');
        counter++;


        console.log($('.no_added'));
    });

     $(document).on('click', '.add_to_queu_modal' ,function () {

        var $this = $(this);
        var img = $(".modal_image").attr('src');


        var month = $('#month_parent').find('img').eq(counter);

        empty_img[index].src = img;

        var params = {};
        params.Month = empty_img.eq(index).parent().parent().find(".que_month").val();
        params.bra_id = $this.data('brandid');
        params.pro_id = $this.data('productid');
        params._token = $('.hidden_token').val();
        var url = ajax_url + 'add_queue';

        var successCallback = function (res) {

            res = jQuery.parseJSON(res);

            empty_img.eq(index).removeClass('no_added');

            empty_img.eq(index++).prev().empty().append(
                    '<button type="button" class="btn-small closebtn" >'+
                    '<span id="'+ res.id +'" class="glyphicon glyphicon-remove"></span>'+
                    '</button>'
            );
            $("#count").text(res.count);
            $("#myModal").modal('hide');

            if (res.status == "false")
            {
                window.location.href = ajax_url +'ship_form/'+res.id ;
            }
        };

        ajx(url, 'post', params, successCallback, 'html');
        counter++;


        console.log($('.no_added'));
    });

    $(".affiliate_data").click(function (e) {

        var thiss = $(this);

        $(this).text("processing....");
        $(this).attr("disabled", true);

        var params = $("#affiliate_form").serialize();

        var url = "/affiliate_proceed";

        var successCallback = function (data) {
            data = jQuery.parseJSON(data);
            if (data.status == 'success')
            {
                $(".alert_shared").fadeIn();
                thiss.attr("disabled", false);
                thiss.text("Start Sharing");
                var xSeconds = 4000; // 1 second

                setTimeout(function () {
                    $('.alert').fadeOut('slow');
                }, xSeconds);

            } else
            {

            }
        };

        ajx(url, 'post', params, successCallback, 'html');

        e.preventDefault();
    });


    $(document).on('click', '.checkout' ,function(e){

        e.preventDefault();

        var params = {};

        var url = "/check_queue";
         params._token = "{{csrf_token()}}";

        var successCallback = function (data) {


            if(data == 1){

                window.location.href = "/my_queue";

            }else{

                swal({
                    title: 'Oops!',
                    text: 'Your cart is empty',
                    type: 'info',
                    confirmButtonText: 'Close'
                })
            }

        };

        ajx(url, 'post', params, successCallback, 'html');
    });


     $(document).on('click' , '.gender', function(e){

         $(this).parent().find('.text-danger').removeClass("text-danger");
         $(this).addClass("text-danger");

         var gender = $(this).data('gender');
        e.stopPropagation();
        var params = null;

        var url = "/gender_filter/"+gender;

        var successCallback = function (data) {

            data = jQuery.parseJSON(data);

            displayPerfumes(data);

        };

        ajx(url, 'get', params, successCallback, 'html');

    });

     $(document).on('click' , '.check_brand', function(e){
         e.stopPropagation();
         var params = $('form[name="brand_form"]').serialize();

         var url = "/brand_search";

         var successCallback = function (data) {

             data = jQuery.parseJSON(data);

             displayPerfumes(data);

         };

         ajx(url, 'get', params, successCallback, 'html');

     });


     $(document).on('click' , '.style_filter', function(e){


         var parent = $(this).parent();


         var tag = $(this).find('input:checkbox:first').parent().text();
         var tag_id = $(this).find('input:checkbox:first').val();
         var box = $(this).find('input:checkbox:first');

         var str = tag;
         str = str.toLowerCase().replace(/\b[a-z]/g, function(letter) {
             return letter.toUpperCase();
         });

         if (box.prop('checked')) {

             $("."+tag.replace(/\s/g, '')).remove();
             parent.find('.container-overlay').hide(1000);

             box.prop('checked', false);
         } else {

             $("#selected_tag").append(

                 '<li data-tagid='+ tag_id +' class="'+ tag.replace(/\s/g, '') +'" >'+ str +'  <span class="remove_tag" >'+ 'x' +'</span></li>'

             );
             box.prop('checked', true);
             parent.find('.container-overlay').show('slow');

         }

//         console.log($(this).find('input:checkbox:first').parent().text() );

         e.stopPropagation();
         e.preventDefault();

         var params = $('form[name="style_form"]').serialize();

         var url = "/style";

        var successCallback = function (data) {

            data = jQuery.parseJSON(data);

            displayPerfumes(data);

        };

        ajx(url, 'get', params, successCallback, 'html');

    });

     $(document).on('click' , '.remove_tag' , function(){

         var $this = $(this);

         var tag_id = "#tag_"+$(this).parent().data('tagid');
         $(tag_id).prop('checked',false);
         $(this).parent().remove();
         console.log($(tag_id));

         $(tag_id).parents('.style_filter ').find('.container-overlay').hide('slow');
         

         var params = $('form[name="style_form"]').serialize();

         var url = "/style";

         var successCallback = function (data) {

             data = jQuery.parseJSON(data);

             displayPerfumes(data);

         };

         ajx(url, 'get', params, successCallback, 'html');

     });

    function displayPerfumes(data){

        var asset = "{{asset('')}}" + "/";
        var products = '';
//        if(data.status != 'error')
            $.each(data.products , function(index ,  product){
                brand = product.brand;

                products +=
                        '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 hover-button showhim" style="height: 225px; margin-bottom: 30px;" >'+
                            '<img src="'+ asset + product.image  +'" data-brand="'+ brand.id +'" data-pro="'+ product.id +'" class="draggable"  width="100%" height="70%"/>'+
                            '<div class="showme">'+
                                '<button type="button" class="Quick-view-button quick_model" id="'+ product.id +'"  >'+
                                     '<p>Quick View</p>'+
                                '</button>'+
                            '</div>'+
                            '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px;">'+
                                '<h5 style="margin-bottom:0px; margin-top:5px; color:black;" > '+ product.product_name +' </h5>'+
                                '<h4 style="margin-bottom:0px; margin-top:0px; color:#441640;" >&emsp;<b>'+ brand.brand_name +'</b> </h4>'+
                            '</div>'+
                            '<div class="add-que11">'+
                                '<button type="submit" class="add-queu add_to_queu " >'+
                                    '<input type="hidden" name="_token" class="hidden_token" value="{{csrf_token()}}"/>'+
                                    '<input type="hidden" class="pro_id_qu" value="'+ product.id +'">'+
                                    '<input type="hidden" class="bra_id_qu" value="'+ brand.id +'">'+
                                    '<p style="margin-top:4px;">Add to queue</p>'+
                                '</button>'+
                            '</div>'+
                        '</div>';
            });

        $("#products").empty().append(products);
        $('.draggable').draggable({
            revert: "invalid",
            stack: ".draggable",
            helper: 'clone',
            cursor: "move",
            containment: "document",
        });
    }
</script>
@endsection

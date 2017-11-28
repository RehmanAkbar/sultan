@extends('layouts.layout')
@section('custom_css')
    <link href="{{URL::asset('css/how_work.css') }}" rel="stylesheet">
@endsection
@section('contant')
@if(\Auth::check())
<?php $user = \Auth::user(); ?>
@include('include.sub_header')
@endif
    <div class="col-lg-12" style="padding:0px;">
        <img src="images/how_work/work_banner_02.png" width="100%" class="img-responsive" alt="banner"/>
    </div>
<div class=" container cont_width">
        <div class="col-lg-12 col-sm-12 col-xs-12">
            <h2 align="center" id="perfumetxt_clr_work">How It Works</h2>
            <p align="center" id="litetxt">A simple and fun way to try new fragrances every month</p>
            <div class="col-lg-6 col-sm-6 col-xs-6" style="margin-top:30px;">
                <span style="font-size: 40px; color: black; display:inline;"> &#9312;</span>&emsp;<h2 id="perfumetxt_clr_work" style="display:inline;">Start Your Subscription</h2>
                <p style="margin-left:50px;" id="litetxt">Get a monthly supply of fragrance of<br> your choice for just 395 Rs/month (free <br> shipping!). Cancel anytime.</p>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-6" align="center">
                <img src="images/how_work/product1_05.png" width="191" height="302" />
            </div>
        </div>

        <div class="col-lg-12 col-sm-12 col-xs-12">
            <div class="col-lg-6 col-sm-6 col-xs-6">
                <img src="images/how_work/product2_08.png" class="img-responsive" />

            </div>
            <div class="col-lg-6 col-sm-6 col-xs-6" style="margin-top:30px;">
                <span style="font-size: 40px; color: black; display:inline;"> &#9313;</span>&emsp;<h2 id="perfumetxt_clr_work" style="display:inline;">Pick Your Scent</h2>
                <p style="margin-left:50px;" id="litetxt">Select from our collection of 150+<br>  designer fragrance</p
                ></div>
        </div>

        <div class="col-lg-12 col-sm-12" style="padding-bottom:20px;">
            <div class="col-lg-6 col-sm-6 col-xs-6" style="margin-top:30px;">
                <span style="font-size: 40px; color: black; display:inline;"> &#9314;</span>&emsp;<h2 id="perfumetxt_clr_work" style="display:inline;">Monthly Spray</h2>
                <p style="margin-left:50px;" id="litetxt">Get a generous supply of fragrance
                    <br> (10ml x 2) in a travel-friendly spray.</p>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-6" align="center">
                <img src="images/how_work/product3_12.png" width="242" height="234" class="img-responsive" alt="product"/>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-sm-12" id="lower_banner">
        <div class="col-xs-offset-6 col-lg-3" id="doorstep">
            <span style="font-size: 40px; color: black; display:inline;"> &#9315;</span>&emsp;
            <h2 id="perfumetxt_clr_work" style="display:inline;">At Your Doorstep</h2>
            <p style="margin-left:50px;" id="litetxt">Every month,PerfumeClub will deliver <br> your fragrance right to your door.</p>

        </div>
    </div>

    <div class="col-lg-12" align="center">
        <a href="/reg_view">
        <button type="button" class="btn btn-primary" id="subscribe_btnperfume">Subscribe Now</button>
        </a>
            <p id="litetxt" align="center" style="margin-top:10px;font-size:16px">Just &nbsp;<span style="color:#ff0000;">Rs 395/-</span>month</p>
    </div>
@endsection
@section('custom_js')
    @endsection
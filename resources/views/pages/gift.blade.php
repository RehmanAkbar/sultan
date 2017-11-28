@extends('layouts.layout')
@section('custom_css')
    <link href="{{URL::asset('css/gift.css') }}" rel="stylesheet">
@endsection
@section('contant')
@if(\Auth::check())
<?php $user = \Auth::user(); ?>
@include('include.sub_header')
@endif
    <div class="col-lg-12" style="padding:0px;">
        <div class="col-lg-12" style="padding:0px;">
            <div class="col-lg-4" id="sideline">
                <hr style="border-top:3px solid;">
            </div>
            <div class="col-lg-4" align="center" id="img_gift">
                <img src="{{URL::asset('images/gifts/gift_02.png')}}" width="337" height="227" class="img-responsive" alt="img"/>
            </div>
            <div class="col-lg-4" id="sideline">
                <hr style="border-top:3px solid;">
            </div>

        </div>
        <div class="container" style="width:82%;">
            <div class="col-lg-12">
                <div class="col-lg-4" id="gift_width">
                    <div class="col-lg-12" align="center">
                        <h3 align="center">Gift Subscription</h3>
                        <img src="images/gifts/product1_05.png" width="104" height="180" class="img-responsive" alt="img"/>
                        <p align="justify">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        </p>
                        <button type="button" class="btn btn-primary" id="gift_choosebtn">Choose</button>
                        <p>Starting at $44</p>
                    </div>
                </div>
                <div class="col-lg-4" id="gift_width">
                    <div class="col-lg-12" align="center">
                        <h3 align="center">Gift Boxes</h3>
                        <img src="images/gifts/product1_05.png" width="104" height="180" class="img-responsive" alt="img"/>
                        <p align="justify">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        </p>
                        <button type="button" class="btn btn-primary" id="gift_choosebtn">Choose</button>
                        <p>Starting at $44</p>
                    </div>
                </div>
                <div class="col-lg-4" id="gift_width3">
                    <div class="col-lg-12" align="center">
                        <h3 align="center">Gift Cards</h3>
                        <img src="images/gifts/product1_05.png" width="104" height="180" class="img-responsive" alt="img"/>
                        <p align="justify">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        </p>
                        <button type="button" class="btn btn-primary" id="gift_choosebtn">Choose</button>
                        <p>Choose Your Value</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_js')
@endsection

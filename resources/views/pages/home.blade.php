@extends('layouts.layout')
@section('contant')
<style>

    .media {
        display: inline-block;
        position: relative;
        vertical-align: top;
    }

    .media__image { 
        display: block; 
        border: 1px solid gainsboro ;
    }

    .media__body {
        background: rgba(0, 0, 0, 0.8);
        bottom: 0;
        color: white;
        font-size: 1em;
        left: 0;
        opacity: 0;
        overflow: hidden;
        padding: 10px 10px;
        position: absolute;

        top: 0;
        right: 0;
        -webkit-transition: 0.6s;
        transition: 0.6s;
    }

    .media__body:hover {
        opacity: 1; 
    }
    .media__body:hover:after,
    .media__body:hover:before {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
        opacity: 1;
    }

    .media__body h2 { margin-top: 0; }

    .media__body p { margin-bottom: 1.5em; 
    }
    #space_top {
       margin-top: 60px; 
    }
    @media (max-width:992px){
        .bx-viewport{
        height: 700px !important;
    }
    }
    @media (max-width:768px){
       #space_top{
       margin-top: 0px; 
       padding-top: 10px;
    } 
    #headin_margin{
        margin-top: 0px;
    }
    .bx-viewport{
        height: 700px !important;
    }
    }
    @media (max-width:992px){
        .res{
            padding-left: 28% !important;
        }
    }
</style>
<!--Content-->
@if(\Auth::check())
<?php $user = \Auth::user(); ?>
@include('include.sub_header')
@endif
<div class="col-lg-12" style="padding:0px;">



    <div class="col-lg-12 col-md-12 col-sm-12" id="bgperfume">
        <div class="col-md-offset-7 col-sm-offset-6" id="space_top">
            <h3 style="color:#fdc18b; " id="headin_margin">Pakistan's First Perfume Subscription Service</h3>
            <h3 style="color:#fdc18b; margin-bottom: 0px; " >How do I get my perfumes?</h3>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-md-offset-6 col-sm-offset-5" id="signup_perfume" >
            <span style="font-size: 40px; color: #fdc18b;">&#9312;</span>

        </div>
        <div class="col-lg-5 col-md-5 col-sm-6" id="signup_perfume">
            <h3 style="color:#fdc18b;">Sign Up</h3>
            <h4 id="litetxt_signup">It takes less than a minute</h4>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12" style="padding:0px;">
            <div class="col-lg-1 col-md-1 col-sm-1 col-md-offset-6 col-sm-offset-5" >
                <span style="font-size: 40px; color: #fdc18b;">&#9313;</span>

            </div>
            <div class="col-lg-5 col-md-5 col-sm-6">

                <h3 style="color:#fdc18b;">Choose Your Perfumes</h3>
                <h4 id="litetxt_signup">Pick from 150+ designer fragrances</h4>
            </div>

        </div>
        <div class="col-lg-12 col-md-12 col-sm-12" style="padding:0px;">
            <div class="col-lg-1 col-md-1 col-sm-1 col-md-offset-6 col-sm-offset-5" >
                <span style="font-size: 40px; color: #fdc18b;">&#9314;</span>

            </div>
            <div class="col-lg-5 col-md-5 col-sm-6">

                <h3 style="color:#fdc18b;">Get Your Monthly Supply</h3>
                <h4 id="litetxt_signup">Get your cologne delivered right to your door every month</h4>
                <a href="/reg_view">
                    <button type="button" class="btn btn-primary" id="sign_btnperfume">Get Started</button>
                </a>
            </div>


        </div>

    </div>


</div>
<!-------->
<div class="col-lg-12">
    <div class="container">
        <div class="col-lg-12">
            <h2 align="center" style="color:#ff0000; ">All The Brands You Want</h2>
            <p align="center">Upgrade your game with the colognes from these top designer brands.</p>
        </div>
    </div>
</div>

<div class="container">
    <div class="slider">
<!--        <div class="slide">
            <div class="row " >
                <div class="img col-lg-3 col-sm-6 col-xs-6" id="div_product">
                    <div class="media"><img class="media__image" src="images/brand_logos/logo1.png" id="mobileview">
                        <div class="media__body" align="center">
                            <p id="productscolor">Fendi Colonge</p>        
                        </div>
                    </div>
                </div>
                <div class="img col-lg-3 col-sm-6 col-xs-6" id="div_product">
                    <div class="media"><img class="media__image" src="images/brand_logos/logo9.png" id="mobileview">
                        <div class="media__body" align="center">
                            <p id="productscolor">Blue Jeans</p>  
                            <p id="productscolor">Versace Man</p> 
                            <p id="productscolor">Versace Pour Homme</p>  
                        </div>
                    </div>
                </div>
                <div class="img col-lg-3 col-sm-6 col-xs-6" id="div_product">
                    <div class="media"><img class="media__image" src="images/brand_logos/logo10.png" id="mobileview">
                        <div class="media__body" align="center">
                            <p id="productscolor">The One</p>  
                            <p id="productscolor">Light Blue</p>
                        </div>
                    </div>
                </div>
                <div class="img col-lg-3 col-sm-6 col-xs-6" id="div_product">
                    <div class="media"><img class="media__image" src="images/brand_logos/logo10.png" id="mobileview">
                        <div class="media__body">
                            <h4 id="productscolor">Product no 1</h4>  
                            <h4 id="productscolor">Product no 2</h4>
                            <h4 id="productscolor">Product no 3</h4>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 40px;">

                <div class="img col-lg-3 col-sm-6 col-xs-6" id="div_product">

                    <div class="media"><img class="media__image" src="images/brand_logos/logo5.png" id="mobileview">
                        <div class="media__body" align="center">
                            <p id="productscolor">Bvlgari Aqva</p>  
                            <p id="productscolor">Bvlgari BLV</p>
                        </div>
                    </div>
                </div>
                <div class="img col-lg-3 col-sm-6 col-xs-6" id="div_product">

                    <div class="media"><img class="media__image" src="images/brand_logos/logo12.png" id="mobileview">
                        <div class="media__body" align="center">
                            <p id="productscolor">Scuderia Red Colonge</p>  
                            <p id="productscolor">Scuderia Black Colonge</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-6" id="div_product">
                    <div class="media" id="mobileview"><img class="media__image" src="images/brand_logos/logo7.png" id="mobileview">
                        <div class="media__body" align="center">
                            <p id="productscolor">Pleasures Colonge </p>  
                            <p id="productscolor">Pleasures Perfume </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-6" id="div_product">
                    <div class="media" id="mobileview"><img class="media__image" src="images/brand_logos/logo8.png" id="mobileview">
                        <div class="media__body" align="center">
                             <p id="productscolor">212 Colonge  </p>  
                            <p id="productscolor">212 VIP Colonge</p>
                             <p id="productscolor">212 Sexy Perfume-For Women </p>  
                            <p id="productscolor">Pleasures Perfume </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        Page end
        <div class="slide">
            <div class="row">


                <div class="col-lg-3" id="div_product">
                    <div class="media" id="mobileview"><img class="media__image" src="images/brand_logos/logo2.png" id="mobileview">
                        <div class="media__body" align="center">
                             <p id="productscolor">Boss No.6  </p>  
                            <p id="productscolor">Boss Elements </p>
                             <p id="productscolor">Boss Elements </p>  
                            <p id="productscolor">Hugo Colonge </p>
                            <p id="productscolor">Dark Blue </p>  
                            <p id="productscolor">Hugo Energise </p>


                        </div>
                    </div>
                </div>
                <div class="col-lg-3" id="div_product">
                    <div class="media" id="mobileview"><img class="media__image" src="images/brand_logos/logo3.png" id="mobileview">
                        <div class="media__body" align="center">
                            <p id="productscolor">Epic –Classic/Wedding/Office</p> 
                        </div>
                    </div>
                </div>
                <div class="col-lg-3" id="div_product">
                    <div class="media" id="mobileview"><img class="media__image" src="images/brand_logos/logo11.png" id="mobileview">
                        <div class="media__body" align="center">
                             <p id="productscolor">Joop Colonge -Office</p>  
                            <p id="productscolor">Joop Jump Colonge </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3" id="div_product">
                    <div class="media" id="mobileview"><img class="media__image" src="images/brand_logos/logo6.png" id="mobileview">
                        <div class="media__body" align="center">
                            <p id="productscolor">Cartier Pasha</p>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 40px;">
                <div class="col-lg-3" id="div_product">
                    <div class="media"><img class="media__image" src="images/brand_logos/logo13.png" id="mobileview">
                        <div class="media__body" align="center">
                             <p id="productscolor">Armani Code </p>  
                        </div>
                    </div>
                </div>
                <div class="col-lg-3" id="div_product">
                    <div class="media" id="mobileview"><img class="media__image" src="images/brand_logos/logo14.png" id="mobileview">
                         <div class="media__body" align="center">
                            <p id="productscolor">Montblanc Legend </p>  
                            <p id="productscolor">Starwalker Colonge</p>  
                        </div>
                    </div>
                </div>
                <div class="col-lg-3" id="div_product">
                    <div class="media" id="mobileview"><img class="media__image" src="images/brand_logos/logo15.png" id="mobileview">
                         <div class="media__body" align="center">
                             <p id="productscolor">XS Colonge</p>  
                            <p id="productscolor">Black Xs Colonge </p> 
                            <p id="productscolor">One Million Colonge </p>  
                            <p id="productscolor">Lady Million Perfume</p> 
                             <p id="productscolor">Invictus Colonge </p> 
                        </div>
                    </div>
                </div>
                <div class="col-lg-3" id="div_product">
                    <div class="media" id="mobileview"><img class="media__image" src="images/brand_logos/logo16.png" id="mobileview">
                         <div class="media__body" align="center">
                             <p id="productscolor">Terre D’hermes</p>  
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <!--Page end-->

        
        <div class="slide">
            
            <div class="row res " style="margin-top: 40px;">
                <?php
                $brands = \App\Brand::skip(0)
                        ->take(4)
                        ->get();
                
                ?>
                @foreach($brands as $brand)
                <?php
                $products = \App\Product::where("brand_id",$brand->id)
                        ->skip(0)
                        ->take(6)
                        ->get();
                
                ?>
                <div class="col-lg-3" id="div_product">
                    <div class="media" id="mobileview"><img class="media__image" src="{{ $brand->image }}" id="mobileview">
                        <div class="media__body">
                            @foreach($products as $product)
                                <h4 id="productscolor">{{ $product->product_name }}</h4>  
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="row res" style="margin-top: 40px;">
                <?php
                $brands = \App\Brand::skip(4)
                        ->take(4)
                        ->get();
                
                ?>
                @foreach($brands as $brand)
                <?php
                $products = \App\Product::where("brand_id",$brand->id)
                        ->skip(0)
                        ->take(6)
                        ->get();
                
                ?>
                <div class="col-lg-3" id="div_product">
                    <div class="media" id="mobileview"><img class="media__image" src="{{ $brand->image }}" id="mobileview">
                        <div class="media__body">
                            @foreach($products as $product)
                                <h4 id="productscolor">{{ $product->product_name }}</h4>  
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>



        </div>
         <div class="slide">
            
            <div class="row res" style="margin-top: 40px;">
                <?php
                $brands = \App\Brand::skip(8)
                        ->take(4)
                        ->get();
                
                ?>
                @foreach($brands as $brand)
                <?php
                $products = \App\Product::where("brand_id",$brand->id)
                        ->skip(0)
                        ->take(6)
                        ->get();
                
                ?>
                <div class="col-lg-3" id="div_product">
                    <div class="media" id="mobileview"><img class="media__image" src="{{ $brand->image }}" id="mobileview">
                        <div class="media__body">
                            @foreach($products as $product)
                                <h4 id="productscolor">{{ $product->product_name }}</h4>  
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="row res" style="margin-top: 40px;">
                <?php
                $brands = \App\Brand::skip(12)
                        ->take(4)
                        ->get();
                
                ?>
                @foreach($brands as $brand)
                <?php
                $products = \App\Product::where("brand_id",$brand->id)
                        ->skip(0)
                        ->take(6)
                        ->get();
                
                ?>
                <div class="col-lg-3" id="div_product">
                    <div class="media" id="mobileview"><img class="media__image" src="{{ $brand->image }}" id="mobileview">
                        <div class="media__body">
                            @foreach($products as $product)
                                <h4 id="productscolor">{{ $product->product_name }}</h4>  
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>



        </div>
        
          <div class="slide">
            
            <div class="row res" style="margin-top: 40px;">
                <?php
                $brands = \App\Brand::skip(16)
                        ->take(4)
                        ->get();
                
                ?>
                @foreach($brands as $brand)
                <?php
                $products = \App\Product::where("brand_id",$brand->id)
                        ->skip(0)
                        ->take(6)
                        ->get();
                
                ?>
                <div class="col-lg-3" id="div_product">
                    <div class="media" id="mobileview"><img class="media__image" src="{{ $brand->image }}" id="mobileview">
                        <div class="media__body">
                            @foreach($products as $product)
                                <h4 id="productscolor">{{ $product->product_name }}</h4>  
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="row res" style="margin-top: 40px;">
                <?php
                $brands = \App\Brand::skip(20)
                        ->take(4)
                        ->get();
                
                ?>
                @foreach($brands as $brand)
                <?php
                $products = \App\Product::where("brand_id",$brand->id)
                        ->skip(0)
                        ->take(6)
                        ->get();
                
                ?>
                <div class="col-lg-3" id="div_product">
                    <div class="media" id="mobileview"><img class="media__image" src="{{ $brand->image }}" id="mobileview">
                        <div class="media__body">
                            @foreach($products as $product)
                                <h4 id="productscolor">{{ $product->product_name }}</h4>  
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>



        </div>
          <div class="slide">
            
            <div class="row res" style="margin-top: 40px;">
                <?php
                $brands = \App\Brand::skip(24)
                        ->take(4)
                        ->get();
                
                ?>
                @foreach($brands as $brand)
                <?php
                $products = \App\Product::where("brand_id",$brand->id)
                        ->skip(0)
                        ->take(6)
                        ->get();
                
                ?>
                <div class="col-lg-3" id="div_product">
                    <div class="media" id="mobileview"><img class="media__image" src="{{ $brand->image }}" id="mobileview">
                        <div class="media__body">
                            @foreach($products as $product)
                                <h4 id="productscolor">{{ $product->product_name }}</h4>  
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="row res" style="margin-top: 40px;">
                <?php
                $brands = \App\Brand::skip(28)
                        ->take(4)
                        ->get();
                
                ?>
                @foreach($brands as $brand)
                <?php
                $products = \App\Product::where("brand_id",$brand->id)
                        ->skip(0)
                        ->take(6)
                        ->get();
                
                ?>
                <div class="col-lg-3" id="div_product">
                    <div class="media" id="mobileview"><img class="media__image" src="{{ $brand->image }}" id="mobileview">
                        <div class="media__body">
                            @foreach($products as $product)
                                <h4 id="productscolor">{{ $product->product_name }}</h4>  
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>



        </div>
        <!--Page end-->

<!--        <div class="slide">
            <div class="row " >

                <div class="img col-lg-3 " id="div_product">


                    <div class="media" id="mobileview"><img class="media__image" src="images/brand_logos/logo20.png" id="mobileview">
                        <div class="media__body">
                            <h4 id="productscolor">Product no 1</h4>  
                            <h4 id="productscolor">Product no 2</h4>
                            <h4 id="productscolor">Product no 3</h4>  
                            <h4 id="productscolor">Product no 4</h4>
                            <h4 id="productscolor">Product no 5</h4>  
                        </div>
                    </div>

                </div>
                <div class="img col-lg-3 " id="div_product">

                    <div class="media" id="mobileview"><img class="media__image" src="images/brand_logos/logo21.png" id="mobileview">
                        <div class="media__body">
                            <h4 id="productscolor">Product no 1</h4>  
                            <h4 id="productscolor">Product no 2</h4>
                            <h4 id="productscolor">Product no 3</h4>  
                            <h4 id="productscolor">Product no 4</h4>
                            <h4 id="productscolor">Product no 5</h4>  
                        </div>
                    </div>

                </div>
                <div class="img col-lg-3" id="div_product">

                    <div class="media" id="mobileview"><img class="media__image" src="images/brand_logos/logo22.png" id="mobileview">
                        <div class="media__body">
                            <h4 id="productscolor">Product no 1</h4>  
                            <h4 id="productscolor">Product no 2</h4>
                            <h4 id="productscolor">Product no 3</h4>  
                            <h4 id="productscolor">Product no 4</h4>
                            <h4 id="productscolor">Product no 5</h4>  
                        </div>
                    </div>
                </div>
                <div class="img col-lg-3" id="div_product">

                    <div class="media" id="mobileview"><img class="media__image" src="images/brand_logos/logo23.png" id="mobileview">
                        <div class="media__body">
                            <h4 id="productscolor">Product no 1</h4>  
                            <h4 id="productscolor">Product no 2</h4>
                            <h4 id="productscolor">Product no 3</h4>  
                            <h4 id="productscolor">Product no 4</h4>
                            <h4 id="productscolor">Product no 5</h4>  
                        </div>
                    </div>
                </div>


            </div>
            <div class="row" style="margin-top: 40px;">


                <div class="img col-lg-3" id="div_product">

                    <div class="media" id="mobileview"><img class="media__image" src="images/brand_logos/logo24.png" id="mobileview">
                        <div class="media__body">
                            <h4 id="productscolor">Product no 1</h4>  
                            <h4 id="productscolor">Product no 2</h4>
                            <h4 id="productscolor">Product no 3</h4>  
                            <h4 id="productscolor">Product no 4</h4>
                            <h4 id="productscolor">Product no 5</h4>  
                        </div>
                    </div>
                </div>

                <div class="img col-lg-3" id="div_product">


                    <div class="media" id="mobileview"><img class="media__image" src="images/brand_logos/logo25.png" id="mobileview">
                        <div class="media__body">
                            <h4 id="productscolor">Product no 1</h4>  
                            <h4 id="productscolor">Product no 2</h4>
                            <h4 id="productscolor">Product no 3</h4>  
                            <h4 id="productscolor">Product no 4</h4>
                            <h4 id="productscolor">Product no 5</h4>  
                        </div>
                    </div>

                </div>
                <div class="img col-lg-3" id="div_product">


                    <div class="media" id="mobileview"><img class="media__image" src="images/brand_logos/logo26.png" id="mobileview">
                        <div class="media__body">
                            <h4 id="productscolor">Product no 1</h4>  
                            <h4 id="productscolor">Product no 2</h4>
                            <h4 id="productscolor">Product no 3</h4>  
                            <h4 id="productscolor">Product no 4</h4>
                            <h4 id="productscolor">Product no 5</h4>  
                        </div>
                    </div>

                </div>
                <div class="img col-lg-3" id="div_product">

                    <div class="media" id="mobileview"><img class="media__image" src="images/brand_logos/logo27.png" id="mobileview">
                        <div class="media__body">
                            <h4 id="productscolor">Product no 1</h4>  
                            <h4 id="productscolor">Product no 2</h4>
                            <h4 id="productscolor">Product no 3</h4>  
                            <h4 id="productscolor">Product no 4</h4>
                            <h4 id="productscolor">Product no 5</h4>  
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="slide">
            <div class="row " >
                <
            </div>
            <div class="row" style="margin-top: 40px;">
                <div class="img col-lg-3" id="div_product">

                    <div class="media" id="mobileview"><img class="media__image" src="images/brand_logos/logo28.png" id="mobileview">
                        <div class="media__body">
                            <h4 id="productscolor">Product no 1</h4>  
                            <h4 id="productscolor">Product no 2</h4>
                            <h4 id="productscolor">Product no 3</h4>  
                            <h4 id="productscolor">Product no 4</h4>
                            <h4 id="productscolor">Product no 5</h4>  
                        </div>
                    </div>
                </div>
                <div class="img col-lg-3" id="div_product">

                    <div class="media"><img class="media__image" src="images/brand_logos/logo29.png" id="mobileview">
                        <div class="media__body">
                            <h4 id="productscolor">Product no 1</h4>  
                            <h4 id="productscolor">Product no 2</h4>
                            <h4 id="productscolor">Product no 3</h4>  
                            <h4 id="productscolor">Product no 4</h4>
                            <h4 id="productscolor">Product no 5</h4>  
                        </div>
                    </div>
                </div>
                <div class="img col-lg-3" id="div_product">

                    <div class="media"><img class="media__image" src="images/brand_logos/logo30.png" id="mobileview">
                        <div class="media__body">
                            <h4 id="productscolor">Product no 1</h4>  
                            <h4 id="productscolor">Product no 2</h4>
                            <h4 id="productscolor">Product no 3</h4>  
                            <h4 id="productscolor">Product no 4</h4>
                            <h4 id="productscolor">Product no 5</h4>  
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
    </div>
</div>




<!-- /#carousel-indicators -->

<a class="carousel-control right abab hide" href="#theCarousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
<a class="carousel-control right hide" href="#theCarousel" data-slide="next"><i class="fa fa-angle-right"></i></a>

</div><!--/carousel-inner-->
</div><!--/myCarousel-->

</div>
</div>
</div>
<!-------->
<div class="col-lg-12 col-sm-12" style="padding:0px; background-color: lightgrey;">
    <h2 align="center" id="perfumetxt_clr_n">What awaits you???</h2>


    <div class="container">

        <div class="col-lg-12 col-sm-12">
            <div class="col-lg-6 col-sm-6 " style="margin-top:20px;">
                <div class="col-lg-6 col-sm-6 col-xs-6" align="center">
                    <img src="images/dollor_10.png"  alt="brand"/>
                    <h4 align="center" style="margin-top:18px;">Affordable Luxury</h4>
                    <p align="center">Just Rs395/-month.<br>
                        Free shipping. </p>

                </div>
                <div class="col-lg-6 col-sm-6" align="center">
                    <img src="images/perfume_bottles_12.png"  alt="brand" />
                    <h4 align="center">Discover new scents Monthly</h4>
                    <p >Select from 150+ Designers<br>
                        and niche fragrances

                    </p>
                </div>

                <div class="col-lg-6 col-sm-6 col-xs-6" align="center" >
                    <img src="images/stamp_17.png" alt="brand"/>
                    <h4 align="center">100% Authentic</h4>
                    <p align="center">We partner directly with <br>
                        top brands/wholesalers <br>
                        from Europe & USA</p>

                </div>
                <div class="col-lg-6 col-sm-6"" align="center"  >
                    <img src="images/carry_20.png" alt="brand" />
                    <h4 align="center">Easy To Carry</h4>
                    <p >Pocketable with<br> 
                        pen cap shaped top</p>
                </div>



            </div>
            <div class="col-lg-6 col-sm-6">
                <img src="images/perfume_bottles_22.png" alt="perfume" class="img-responsive"/>

            </div>
        </div>
    </div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12" id="bg_lowerbanner">
    <div class="col-lg-12">
        <h3 id="lowertext">Ready for the scent adventure of a lifetime?</h3>
        <h3 id="lowertext2">Just Rs 395/- per month</h3>
        <a href="/reg_view">
            <button type="button" class="btn btn-primary" id="sign_btnperfume_down">Get Started</button>
        </a>
    </div>  

</div>


<script>
    $(function () {

        $('.slider').bxSlider();

    });
</script>
<script>
    $('#myCarousel').carousel({
        pause: 'none'
    })
</script>
@endsection

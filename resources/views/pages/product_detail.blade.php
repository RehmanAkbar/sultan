@extends('layouts.layout')
@section('custom_css')
    <link href="{{URL::asset('css/product_detail.css') }}" rel="stylesheet">
    <link href="{{URL::asset('css/chekout.css') }}" rel="stylesheet">
    <link href="{{URL::asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{URL::asset('css/jquery-picZoomer.css') }}" rel="stylesheet">
    <script src="{{ URL::asset('http://code.jquery.com/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.picZoomer.js') }}"></script>

    @endsection
@section('contant')
    <?php
    $user = Auth::User();
   $product=App\Product::where('id',$id)->first();
    $brand=App\Brand::where('id',$product->brand_id)->first();
    ?>
<style type="text/css">
    .piclist{
        margin-top: 30px;
    }
    .piclist li{
        display: inline-block;
        width: 50px;
        height: 50px;
    }
    .piclist li img{
        width: 70%;
        height: auto;
    }

    /* custom style */
    .picZoomer-pic-wp,
    .picZoomer-zoom-wp{
        border: 1px solid #fff;
    }


    </style>
    
      @include('include.sub_header')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:10px;">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-top:8px; display: none;">
            <form style="display: none;">
                <input type="text" name="search" placeholder="Search..">

            </form>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <h3 style="color:#ff0000; margin-top:10px;" align="center" >Brand name</h3>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" align="right">
            <button type="button" class="get-free-cologene" style="margin-top:7px;">
                <span class="glyphicon glyphicon-gift pull-left" ></span>
                <h5 style="margin:0px;" align="center">Get free cologne</h5>

            </button>
        </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
        <hr style="color:#b7b7b7; margin-bottom:0px;">
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
        <nav class="">
            <div class="container">

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
        <hr style="color:#b7b7b7; margin-bottom:10px; margin-top:0px;">
    </div>
    <div class=" container">
        <div class="  col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
            <p style="margin-bottom:0px;">Browse / Amouage / Fate Man by Amouage</p>
            <hr style="color:#b7b7b7; margin-top:0px; " id="line-shadow">
        </div>
        <div class="  col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12" style="padding:0px;" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="padding:0px;">
<!--                        <p  style="margin-bottom:0px;">{{$product->style}}</p>
                        <p style="margin-bottom:0px;">{{$product->occasion}}</p>-->


                    </div>
                    <!--------->
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="padding:0px; margin-left:-75px;" >
   
    
   
   
  

    <div class="picZoomer">
        <img src="{{URL::asset($product->image)}}" width="300px;"/>
    </div>
<!-- <h4 style="color:#441640; margin-left:33px; ">MAIN NOTES</h4>
    <ul class="piclist">
        <li><img src="{{URL::asset($product->image)}}"/></li>
        <li><img src="{{URL::asset('images/perfume_07.png')}}"/></li>
        <li><img src="{{URL::asset($product->image)}}"/></li>
        <li><img src="{{URL::asset('images/botals_10.png')}}"/></li>
        
    </ul>-->
    
    
      
     </div>
                    <!-------->
                    
                </div>

                
<!--                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h5 align="center">RATE THIS PERFUME (mouse over to see the rating)</h5>
                </div>-->
            </div>

            <div class="  col-lg-7 col-md-7 col-sm-12 col-xs-12" style="padding-right:0px;" id="vertical-border">
                <h4 style=" margin-left:18px; margin-bottom:0px;">{{$brand->brand_name}}</h4>
                <p style=" margin-left:18px;">{{$product->product_name}}</p>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
                    <hr  id="fat-man-below-line">
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px; margin-left:14px;">
                    <span class="star-colr glyphicon glyphicon-heart"></span>
                    <span class="star-colr glyphicon glyphicon-heart"></span>
                    <span class="star-colr glyphicon glyphicon-heart"></span>
                    <span class="star-colr glyphicon glyphicon-heart"></span>
                    <span class="star-colr glyphicon glyphicon-heart-empty"></span>
                    <span class="7-rivews">&ensp;7 reviews</span>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left:0px; padding-right:0px; padding-top:20px;">
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" style="">
                        <img src="{{URL::asset('images/botals_10.png')}}"/>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" style="padding:0px; ">
                        <h5 style="color:#5b5c60; margin-bottom:0px; margin-top:10px;">30-day supply of this scent</h5>
                        <h5 style="margin-top:0px; margin-bottom:0px; color:#5b5c60;">Size: 0.27 oz</h5>
                        <h5 style="margin-top:0px; color:#5b5c60;">Subscription price:<span style="color:black;"> Rs 395</span></h5>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 button-add-t-queu"  align="center">

                        <button type="button" class="add-queu-detail-button" style="margin-top:7px;">
                            Add to queue
                        </button>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:10px; margin-bottom:10px;">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="bordr-subscripton-queu" >
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-left:0px;">
                                <img src="{{URL::asset('images/smal-bootls_15.png')}}" height="38"/> </div>
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                <h5 style="margin-bottom:0px; ">0.27 OZ subscription</h5>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 dive-margin-left" id="bordr-subscripton-queu" >
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-left:0px;">
                                <img src="{{URL::asset('images/smal-bootls_15.png')}}" height="38"/> </div>
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                <h5 style="margin-bottom:0px; ">0.27 OZ a la carte</h5>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button type="button" class="share-button" style="margin-top:7px; margin-bottom:7px;">
                        <h4 style="margin:0px;">Share and earn free perfume</h4>
<!--                            <span>&emsp;
                                <img src="{{URL::asset('images/invite_03.png')}}"></span>-->
                    </button>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p>Rebottled Fate Man, rebottled by Scentbird, Inc., an independent bottler from a genuine
                        product wholly independent of Amouage
                        Scentbird, Inc., New York, NY 10001</p>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 how-to-work" style="padding-left:0px;" >
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 how-to-work1" style="padding-right:0px;">
                        <button type="button" class="description-button" style="margin-top:7px; margin-bottom:7px;">
                            <span style="color:#441640;">DESCRIPTION</span>
                        </button>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 how-to-work" >
                        <button type="button" class="description-button" style="margin-top:7px; margin-bottom:7px;">
                            <span style="color:#441640;">HOW IT WORKS</span>
                        </button>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 how-to-work " style="padding-left:0px;">
                        <button type="button" class="description-button" style="margin-top:7px; margin-bottom:7px;">
                            <span style="color:#441640;">ABOUT</span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p>AMOUAGE Fate for Men is also very intense and spicy. The tart woody composition is brisk from the first notes. Top notes start with saffron, wormwood, ginger, cumin and mandarin, which announce a strong heart full of roses, olibanum, lavender, immortelle, labdanum and copahu balm. The base closes wi... Read more ></p>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    <hr style="margin-bottom:10px;">
                    <h5>People who wear this also like:</h5>
                    <hr style="margin-top:10px;">
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom:20px;">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <img src="{{URL::asset('images/perfume_07.png')}}"/>
                    <p style="margin:0px;">AMOUAGE</p>
                    <p style="margin:0px;">FATE MAN</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <img src="{{URL::asset('images/perfume_07.png')}}"/>
                    <p style="margin:0px;">AMOUAGE</p>
                    <p style="margin:0px;">FATE MAN</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <img src="{{URL::asset('images/perfume_07.png')}}"/>
                    <p style="margin:0px;">AMOUAGE</p>
                    <p style="margin:0px;">FATE MAN</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <img src="{{URL::asset('images/perfume_07.png')}}"/>
                    <p style="margin:0px;">AMOUAGE</p>
                    <p style="margin:0px;">FATE MAN</p>
                </div>
            </div>
        </div>
    </div>
    </div>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
 <script type="text/javascript">
        $(function() {
            $('.picZoomer').picZoomer();


            //切换图片
            $('.piclist li').on('click',function(event){
                var $pic = $(this).find('img');
                $('.picZoomer-pic').attr('src',$pic.attr('src'));
            });
        });
    </script>


@endsection

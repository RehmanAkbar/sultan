<style>
    .panel-primary>.panel-heading{
        background-color: white;
        color: black;
        border-color: white;
        border: hidden;
        border-radius: 0px;
    }
    .panel-primary{
        border: hidden;
        border-radius: 0px;

    }

</style>
<?php
$bra=App\Brand::orderby('brand_name','asc')->get();
?>
{{--@if(is_null($subscribe))
<div class=" col-lg-offset-2 col-lg-8" id="Subscribe-today">
    <h5 style="color:#000000;">Subscribe today for
        <br>just <span style="color:#000000;">Rs 395</span></h5>
</div>
<button type="button" class="subscribe-button-belowbordr" >
    <h5 style="margin:0px;" align="center" class="subscribe_now">Subscribe Now</h5>
</button>
@else
<div class=" col-lg-offset-2 col-lg-8" id="Subscribe-today">
    <h5 style="color:#000000;">You Subscription Ends in {{ \Carbon\Carbon::createFromTimeStamp(strtotime($subscribe->valid_till))->diffForHumans() }}
</div>
<button type="button" class="subscribe-button-belowbordr" >
    <a href="/subscriptions"><h5 style="margin:0px;" align="center">View Details</h5></a>
</button>
@endif--}}

<div class="col-lg-12 col-md-12 col-sm-3 col-xs-3 panel  panel-primary" style="padding: 0px; margin-top: 6%;margin-bottom: 0px;" >
    <div class="panel-heading" style="padding-bottom: 0px;">  <p align="left" ><b>Filter By Gender</b></p></div>
    <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 panel-body" align="left" style="padding-top: 0px;padding-bottom: 0px;">

        <a href="#" class="gender" data-gender="men"> <h5>Men</h5></a>
        <a href="#" class="gender" data-gender="women"> <h5>Women</h5></a>
    </div>
</div>


<div class="col-lg-12 col-md-12 col-sm-3 col-xs-3 panel  panel-primary" style="padding: 0px;margin-bottom: 0px;">
    <div class="panel-heading" > <p align="left"><b>Quick Links</b></p></div>
    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 panel-body " align="left" style="padding-top: 0px;" >

        <a href="/per_detail" style="color:#000000; text-decoration:none;">All Perfumes</a><br>
        <a href="{{route('best_sellers')}}" style="color:#000000; text-decoration:none;">Best Sellers</a><br>
        <a href="{{route('new_arrivals')}}" style="color:#000000; text-decoration:none;">New Arrivals</a><br>
        <a href="{{route('featured')}}" style="color:#000000; text-decoration:none;">Featured</a><br>
    </div>
</div>
<div class="col-lg-12 col-md-12 col-sm-3 col-xs-3 panel  panel-primary" style="padding: 0px; " >
    <div class="panel-heading" style="padding-bottom: 0px;"><p align="left"><b>Filter By Brands</b></p></div>

    <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 panel-body" align="left" style="padding-top: 0px;">
        <form method="post" name="brand_form">
            @foreach($bra as $brand)
                <div class="checkbox">
                    {{--<a href="{{route('brand_filter',[$brand->slug])}}"> <h5>{{$brand->brand_name}}</h5></a>--}}
                    <label><input type="checkbox" class="check_brand" name="brand_ids[]"  value="{{$brand->id}}">{{$brand->brand_name}}</label>
                </div>
            @endforeach
        </form>
    </div>

</div>


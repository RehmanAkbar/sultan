@extends('layouts.layout')
@section('custom_css')

@endsection
@section('contant')
@if(\Auth::check())
<?php $user = \Auth::user(); ?>
@include('include.sub_header')
@endif
<div class="container" style="margin-bottom: 160px;">
    <div class="col-lg-12" style="margin-top: 20px;">
        <h1 class="abc" style="color:red; margin-top: 20px; " align='center'>What is Perfume Club?</h1> 
       <p align='justify'>
           Our mission is that every one smells great be in your office, gym, meetings, and events or at your home. To help in this, we provide designer fragrances sourced from suppliers all over the world. Our olfactory editors based in Chicago and Dubai have selected the range of 150+ perfumes that increase with new additions every month. You get to choose 2 different perfumes each month and get a month's supply at your doorstep in just Rs 395. </p>
       <p align='justify'>It saves you from spending thousands of rupees on one bottle.
Perfumeclub.pk offers easy choice of perfumes using the intelligent filters that help and guide users to select desired brands and perfumes. The queue is part of subscription which refreshes every month. The cash on delivery system provides new preselected perfumes each month at your doorstep. Perfume Club is about the fun and magic of fragrance. We designed Perfumeclub.pk for the pickiest girl- or boy- to let you date luxury perfumes before marrying them.
Get access to a 30-day supply of hundreds of top designer fragrances delivered to your door for just Rs 395/month.
       </p>
    </div>
    
</div>
@endsection


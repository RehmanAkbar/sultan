@extends('layouts.layout')
@section('custom_css')
<link href="{{URL::asset('css/gift.css') }}" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

@endsection
@section('contant')
@if(\Auth::check())
<?php $user = \Auth::user(); ?>
@include('include.sub_header')
@endif


</head>
<body>
    <div class="col-lg-12"  style="margin-bottom:83px;">
        <div class="container">
            <div class="col-lg-12" style="margin-bottom: 20px;">
                <h2 align='center'>Perfume Club FAQS</h2>
                <!--Q1-->
                <a href="#" style="text-decoration:none;"><h4 class="abc" style="color:red; margin-top: 20px; ">What is Perfume Club?</h4></a>
                <p style="display:none;">Perfume Club is a fragrance discovery platform. Every month, we deliver a 30-day supply of designer fragrances of your choice straight to your doorstep. 
                    Our 10 vials equate to about 280 sprays – enough to apply more than 8 sprays daily for 30 days.</p>
                <!--Q1-->
                <a href="#" style="text-decoration:none;"><h4 class="abc" style="color:red; ">What are my subscription options?</h4></a>
                <p style="display:none;">All Perfume Club subscribers begin on a monthly package for Rs 395/month. 
                    This offer is to subscribe on an every-other-month basis. 
                    All regular subscriptions are recurring, unless cancelled within the term deadline. 
                    There are no hidden fees or additional charges for shipping & handling.</p>

                <!--Q1-->
                <a href="#" style="text-decoration:none;"><h4 class="abc" style="color:red; ">When can I expect to be billed for my subscription?</h4></a>
                <p style="display:none;">You’ll be billed for your first Perfume Club with your initial purchase. 
                    Starting with your second month, you’ll fall on our regular billing and shipping cycle, meaning that you’ll be billed on the 5th of each month and can expect your package to ship around the 1st week of the month. </p>

                <!--Q1-->
                <a href="#" style="text-decoration:none;"><h4 class="abc" style="color:red; ">How does my fragrance queue work?</h4></a>
                <p style="display:none;">When you register for Perfume Club, you can pre-select perfumes to receive each month going forward. You can also log in to edit your queue, add new scents, or rearrange the order in which you’d like to receive them. 
                    Because your queue is locked on the 5th of each month, any changes made after that date will take effect only in the following month.
                    If you haven’t chosen a scent by the cut-off date, we’ll make sure to automatically send you the option to select our featured or best selling perfumes.</p>
                <!--Q1-->
                <a href="#" style="text-decoration:none;"><h4 class="abc" style="color:red; ">I just placed an order! When will it ship?</h4></a>
                <p style="display:none;">The shipment takes 48 hours to reach your doorstep after confirmation SMS and/or call. </p>
                <!--Q1-->
                <a href="#" style="text-decoration:none;"><h4 class="abc" style="color:red; ">I want to send Perfume Club perfumes as a gift. What’s the best way to do that?</h4></a>
                <p style="display:none;">We offer Gift subscription or gift box. It is prepaid option and cannot be done via cash on delivery option. </p>

                <!--Q1-->
                <a href="#" style="text-decoration:none;"><h4 class="abc" style="color:red; ">Where does Perfume Club ship?</h4></a>
                <p style="display:none;">We currently ship to all major cities of Pakistan. </p>
                <!--Q1-->
                <a href="#" style="text-decoration:none;"><h4 class="abc" style="color:red; ">I’ve heard good things about your partner program. Tell me more!</h4></a>
                <p style="display:none;">Glad you asked! If you’re currently an active subscriber, head to our partner page for your unique partner link and to send e-mail invites or share your code on social media for friends and family you think might also love Perfume Club. 
                    Every time a friend subscribes using your unique referral code, you get points against their subscription. 
                    With 10 friends using your code to order, you get free one month subscription. </p>


            </div>
        </div>
    </div>








    <script>
    $(document).ready(function () {
        $(".abc").click(function () {
            $(this).parent().next().toggle('slide');
        });
    });
    </script>
    @endsection
</body>

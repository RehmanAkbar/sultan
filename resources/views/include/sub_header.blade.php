<div class="col-lg-12" style="background-color:#bb0000;">
<div class="container">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8 hide" style="margin-top: 10px;">
        
        <a href="/per_detail" style="color: white;text-decoration: none;font-weight: bold;margin-right: 10px;"> 
            <button class="btn btn-md btn-danger">Dashboard</button></a>
        <a href="/my_queue" style="color: white;text-decoration: none;font-weight: bold;margin-right: 10px;">
           <button class="btn btn-md btn-warning dropdown-toggle" data-toggle="dropdown">My Subscriptions</button>
            </a>
            <ul class="dropdown-menu pull-right" style="right:70px; left: 56px; width: 200px; margin-top: 5px; padding-bottom: 20px;">                 
                   <li><a href="/my_queue"><b>Subscriptions</b></a></li>
                    <li><a href="/my_queue_processing"><b>Processed Subscriptions</b></a></li>
                    <li><a href="/my_queue_completed"><b>Completed Subscriptions</b></a></li>
                </ul>
        <a href="/referral-points" style="color: white;text-decoration: none;font-weight: bold;margin-right: 10px;"> 
            <button class="btn btn-md btn-success">My Points</button></a>
    </div>
    

        <div class="col-lg-offset-6 col-lg-6 col-md-6 col-sm-4 col-xs-4">
            <h4 style="color:white;" align="right">
               <a href="#" style="color:white; text-decoration: none;"  class=" dropdown-toggle" data-toggle="dropdown">{{$user->name}}&nbsp; <img src="{{asset('images/detail/user.png')}}" height="30" width="30" class="img-circle"/></a>
                <ul class="dropdown-menu pull-right" style="right:70px;">
                    <li><a href="/per_detail"><b>Dashboard</b></a></li>
                    <li><a href="/my_queue"><b>My Orders</b></a></li>
                    {{--<li><a href="/my_queue_processing"><b>Processed Queue Orders</b></a></li>--}}
                    {{--<li><a href="/my_queue_completed"><b>Completed Queue Orders</b></a></li>--}}
                    <li><a href="/referral-points"><b>Points</b></a></li>
                    <li><a href="/logout"><b>Logout</b></a></li>
                </ul>
                <span style="display:inline-block">&emsp;
                    <a href="#" class=" dropdown-toggle " data-toggle="dropdown">
                        <span class="glyphicon glyphicon-triangle-bottom" style="color: white;"></span>
                        <span class="glyphicon glyphicon-shopping-cart" style="color:#eff1f0;"><span id="cart_count" class="badge " style="margin-top: -60%;margin-left: -10%;background-color: transparent">{{Cart::count()}}</span></span>
                    </a>

                    <ul  class="dropdown-menu pull-right" id="perfumecart_width" style="right:0px;">

                        @include('pages.cart_items')

                    </ul>

                </span>


            </h4>
        </div>
    </div>
    </div>
</div>

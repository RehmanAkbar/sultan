
    @if(Cart::count())
        <div class="col-lg-12" style="padding:0px;">

            <div class="col-lg-12" id="checkout_area">
                <div class="col-lg-12" style="padding:0px;">
                    <a href="#">
                        <span aria-hidden="true" class="glyphicon glyphicon-remove pull-left" id="" style="margin-left:10px;"></span>
                    </a>
                    <h3 align="center" id="whitetxt"><span>{{Cart::count()}}</span> {{(Cart::count() > 1 ) ? 'Items in Cart' : 'Item in Cart'}} </h3>
                    <hr>

                    <div class="col-lg-12" style="padding:0px;" >
                        <h3 id="whitetxt" align="center">Your Subscription Order</h3>

                        @foreach(Cart::content() as $row)

                            <div class="col-lg-4">

                                <img  width="101" height="93" class="img-responsive" src="{{URL::asset($row->options['image'])}}">
                            </div>
                            <div class="col-lg-5"><p id="whitetxt">Monthly Subscription 0.27 oz (rollerball size)</p></div>
                            <div class="col-lg-3">
                                <a class="remove_item" data-rowid="{{$row->rowId}}" href="#">
                                    <span aria-hidden="true" class="glyphicon glyphicon-remove pull-right" id=""></span>
                                </a>
                                <p id="whitetxt" style="margin-top:50px;" align="right">Rs. {{$row->price}}</p>

                            </div>
                            <div class="col-lg-12" style="padding:0px;"><hr></div>
                        @endforeach
                    </div>

                    <div class="col-lg-12">
                        <div class="col-lg-6">
                            <h4 id="whitetxt">Total</h4>
                        </div>
                        <div class="col-lg-2 col-md-offset-3"><h4 id="whitetxt">{{Cart::total()}}</h4></div>

                        <div class="col-lg-12" align="center">
                            <button type="button" onclick="window.location.href= '{{route("cart.checkout")}}'" class="btn btn-primary active" id="chekoutbtn">Check Out</button>
                        </div>
                    </div>
                    <div class="col-lg-12" style="padding:0px;"><hr></div>
                    <h3 align="center" id="whitetxt">Free Standard Shipping</h3>
                    <p align="center" id="whitetxt">Add $50.00 to your order to qualify</p>
                </div>
            </div>

        </div>
    @else
        <span>empty cart</span>
        <div class="col-lg-12" style="padding:0px;">

            <div class="col-lg-12" id="checkout_area">
                <div class="col-lg-12" style="padding:0px;">
                    <a href="#">
                        <span aria-hidden="true" class="glyphicon glyphicon-remove pull-left" id="closebtn" style="margin-left:10px;"></span>
                    </a>
                    <h3 align="center" id="whitetxt">Your Cart</h3>
                    <hr>
                    <div class="col-lg-12" style="padding:0px;" >
                        <h3 id="whitetxt" align="center">Your Cart is Empty</h3>
                        <div class="col-lg-12" align="center">
                            <button type="button" class="btn btn-primary active" id="chekoutbtn" style="margin-bottom:20px;">Shop Now</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    @endif


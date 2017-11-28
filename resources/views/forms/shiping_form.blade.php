@extends('layouts.layout')
@section('custom_css')
    <link href="{{URL::asset('css/perfum_order.css') }}" rel="stylesheet">
@endsection
@section('contant')
    <div class="col-lg-12">
<?php
            $user =\App\User::where('id',$id)->first();
        ?>
        <div class="col-lg-4" id="registr_left">
            <div class="col-lg-12"  align="center">
                <img src="{{URL::asset('images/login/images/perfume_bottles_04.png')}}" width="204" height="375" alt="product"/>
            </div>

        </div>
        <div class="col-lg-7" style="padding-bottom: 2%;">
            <div class="col-lg-12">
                <h2 align="center" id="perfumetxt_clr">Month-To-Month Subscription</h2>
                <p align="center" id="perfumetxt_clr">Monthly supply, Cash on delivery, Cancel any time</p>
                <h4 id="chekbox_margn">Shipping Address</h4>
                <form class="shiping_form" id="shiping_form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <input type="hidden" name="user_id" value="{{$id}}"/>
                    <div class="col-sm-6" id="field_set">
                        <input class="form-control" placeholder="First Name" name="first_name" id="namefield" type="text">
                    </div>
                    <div class="col-sm-6" id="field_set">
                        <input class="form-control" placeholder="Last Name" name="last_name" id="namefield" type="text">
                    </div>
                    <div class="col-sm-12" id="field_set">
                        <input value="{{$user->email}}" class="form-control" placeholder="Enter your Email" name="email" id="namefield" type="text">
                    </div>
                    <div class="col-sm-7" id="field_set">
                        <input class="form-control" placeholder="Street Address" name="address" id="namefield" type="text">
                    </div>
                    <div class="col-sm-5" id="field_set">
                        <input class="form-control" placeholder="mobile number"  name="mobile_number" id="namefield" type="text">
                    </div>
                    <div class="col-sm-4 hide" id="field_set">
                        <input class="form-control" placeholder="Zip code" name="zip_code" value="unknown" id="namefield" type="text">
                    </div>
                    <div class="col-sm-8" id="field_set">
                        <input class="form-control" placeholder="City" name="city" id="namefield" type="text">
                    </div>
                    <div class="col-sm-4" id="field_set">
                        <select class="cities form-control" name="state" id="namefield">
                            <option value="Punjab">Punjab</option>
                            <option value="Sindh">Sindh</option>
                            <option value="Balochistan">Balochistan</option>
                            <option value="NWFP">NWFP</option>
                            <option value="Federal">Federal</option>
                            <option value="Azad Kashmir">Azad Kashmir</option>
                            <option value="Northern Areas">Northern Areas</option>
                            <option value="KPK">KPK</option>
                        </select>
                    </div>
                    <div class="col-sm-12" id="field_set">
                        <select class="cities form-control" name="country" id="namefield">
                            <option value="Pakistan"> Pakistan</option>
                        </select>
                    </div>
<!--                    <input type="checkbox" name="vehicle" value="Bike" id="chekbox_margn">&nbsp; Use this address as my billing address-->
                    <div class="col-lg-12" align="right"><button type="submit" class="btn btn-primary active shiping_data" id="orderperfume">Continue</button></div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('custom_js')
    <script>

        $(".shiping_form").validate({
            rules: {

                first_name: "required",
                last_name: "required",
                email: "required",
                address: "required",
                city: "required",
                zip_code: "required",
                state: "required",
                country: "required",
                mobile_number: "required"
            },

            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function (error, element) {
                console.log(element);
                if (element.parent('.form-control').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {

            }

        });

        $(".shiping_data").click(function () {

            if ($("#shiping_form").valid())
            {
                $(".new_user").text("processing....");
                $(".new_user").attr("disabled",true);

                var params = $("#shiping_form").serialize();

                var url = "/shiping_save";

                var successCallback = function (data) {
                    data = jQuery.parseJSON(data);
                    if (data.status == 'success')
                    {

                        window.location.href = ajax_url +'per_detail' ;
                    } else
                    {
                        alert(data.msg);
                        $(".new_user").text("Place Order");
                        $(".new_user").attr("disabled",false);
                    }
                };

                ajx(url, 'post', params, successCallback, 'html');
            }

        });


    </script>

@endsection

@extends('layouts.layout')
@section('custom_css')
    <link href="{{URL::asset('css/login.css') }}" rel="stylesheet">
@endsection
@section('contant')
    <div class="col-lg-12 col-sm-12" id="login_bgimg">
        <div class="alert alert-danger loginAlert" id="loginAlert" style="padding-left: 25%; display: none;">
            <strong>Login Failed!</strong> Email or password incorrect, Please try again.
        </div>
        <div class="col-lg-12 col-sm-12 heading_above" >
            <div class="col-lg-6 col-sm-6" >
                <img src="images/login/images/perfume_bottles_04.png" width="204" height="375" alt="add" class="pull-right" style="margin-top:30%;"/>

            </div>
            <div class="col-lg-6 col-sm-6" >
                <div class="col-lg-12 col-sm-12" style="padding-bottom:20px;">
                    <h1 id="logintxtclr">Login To Your Account</h1>
                    <form class="login_form" id="login_form">
                     <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="col-sm-11 col-lg-8" id="field_set">
                        <input class="form-control" name="email" placeholder=" Email" id="namefield" type="email">
                    </div>
                    <div class="col-sm-11  col-lg-8" id="field_set">

                        <input class="form-control" name="password" placeholder=" Password" id="namefield" type="password">
                    </div>
                    <div class="col-lg-8 col-sm-12" style="padding-left:3px; padding-right:3px;">
                        <a href="/forget_view">
                            <span id="logintxtclr">Forgot your password?</span>
                        </a>
                        <a href="/reg_view">
                            <span id="forgetclr" class="pull-right">Don’t have an account?</span>
                        </a>

                    </div>
                    <div class="col-lg-8 col-sm-12" align="center" style="margin-top:50px;">
                        <button type="button" class="btn btn-primary btn-lg active login_user" id="login_btn">Login</button>
                        <h3 align="center" id="logintxtclr" style="margin-bottom:40px; margin-top:40px;"> Or </h3>
                    </div>
                    <div class="col-lg-12 col-sm-8" style="padding:0px;">
                        <div class="col-lg-3 col-sm-12 col-xs-4" style="padding-left:0px;">
                            <a href="/login_facebook"><button type="button" class="btn btn-primary btn-lg active" id="social_btnf">sign in with Facebook</button></a>
                        </div>
                        <div class="col-lg-3 col-sm-12" id="googlebtn">
                            <a href="/login_google"><button type="button" class="btn btn-primary btn-lg active" id="social_btng">sign in with Google</button></a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('custom_js')

    <script>

        

    $(".login_form").validate({
    rules: {

    email: "required",
    password: "required"
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
    $(".login_user").click(function () {

        if ($("#login_form").valid())
        {
            $(".login_user").text("processing....");
            $(".login_user").attr("disabled",true);
            var params = $("#login_form").serialize();

            var url = ajax_url + 'login_user';

            var successCallback = function (res) {
                res = jQuery.parseJSON(res);
                if (res.status == true)
                {

                    window.location.href = ajax_url +'per_detail' ;
                }else if(res.ship){

                    window.location.href = res.url ;


                }
                else
                {
                    $(".loginAlert").show();
                    $(".login_user").text("Login");
                    $(".login_user").attr("disabled",false);
                }
            };

            ajx(url, 'post', params, successCallback, 'html');
        }

    })
    </script>
@endsection

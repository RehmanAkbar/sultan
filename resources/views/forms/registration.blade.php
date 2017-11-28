@extends('layouts.layout')
@section('custom_css')
    <link href="{{URL::asset('css/registration.css') }}" rel="stylesheet">
    @endsection
@section('contant')
    <div class=" container" >
        <div class="col-lg-12" style="margin-bottom: 63px;">
            <div class="col-lg-8 col-md-offset-4" >
                <h2>Create Your Account</h2>
            </div>

            <form class="registration_form" id="registration_form" >
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="col-md-offset-3 col-lg-5">
                    <div class="errorMessage alert alert-danger"  style="display:none;"><strong>Error!</strong>This email is all ready exits.</div>
                    <input class="form-control" name="email" placeholder="Enter email" id="registerfield" type="email">

                </div>
                <div class="col-md-offset-3 col-lg-5">
                    <input class="form-control" name="password" placeholder="Enter password" id="registerfield" type="password">
                </div>

                <div class="col-md-offset-3 col-lg-5"  >
                    <b><u>Gender</u></b> &emsp;
                    <b>Male</b> &nbsp;<input type="radio" name="gender" value="male" id="r1"><label for="r1"></label>&emsp;
                    <b>Female</b> &nbsp;<input type="radio" name="gender" value="female" id="r2"><label for="r2"></label>

                </div>
                <div class="col-md-offset-3 col-lg-5" style="margin-top: 10px;">
                    <input type="checkbox" name="update" id="c1">
                    <label for="c1">&emsp; Sign me up for update from Perfume Club</label>
                    <p >
                        By registering you agree to the<br>
                        <a href="#" style="color: #ff0000;">Terms and Conditions</a> and <a href="#" style="color: #ff0000;">Privacy Policy</a> Of PerfumeClub.pk </p>
                </div>
                <div class="col-lg-9 col-lg-offset-3" >
                    <button type="submit" class="btn btn-primary active new_user" id="register_signup">Register</button>
                    <h3  id="logintxtclr" style="margin-left: 24%;margin-bottom: 0px;margin-top: 0px;"> Or </h3>
                </div>
                <div class="col-lg-12 col-sm-8" style="padding:0px;padding-left: 26%;margin-top: 1%;">
                    <div class="col-lg-3 col-sm-12 col-xs-4" style="padding-left:0px;">
                        <a href="/login_facebook"><button type="button" class="btn btn-primary btn-lg active" id="social_btnf" style="border: none;border-radius: 0px;">sign up with Facebook</button></a>
                    </div>
                    <div class="col-lg-3 col-sm-12" id="googlebtn">
                        <a href="/login_google"><button type="button" class="btn btn-primary btn-lg active" id="social_btng" style="background-color: #b73739;border: none;border-radius: 0px;">sign up with Google</button></a>
                    </div>
                    <div class="col-lg-12" style="padding: 0px;margin-top: 1%;">
                        <p>Already have an account? <a href="/login_view" style="color: #ff0000;">Login</a></p>
                    </div>
                </div>

            </form>
        </div>
    </div>
    @endsection
@section('custom_js')
    <script>

        $(".registration_form").validate({
            rules: {

                email: "required",
                password: "required",
                gender: "required"
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

        $(".new_user").click(function () {

            if ($("#registration_form").valid())
            {
                $(".new_user").text("processing....");
                $(".new_user").attr("disabled",true);

                var params = $("#registration_form").serialize();

                var url = "reg_new";

                var successCallback = function (data) {
                    data = jQuery.parseJSON(data);
                    if (data.status == 'success')
                    {

                        window.location.href = ajax_url +'ship_form/'+data.id ;
                    } else
                    {
                        /*alert(data.msg);*/
                        $(".errorMessage").slideDown(300).delay(400).fadeIn(600);

                        $(".new_user").text("Register");
                        $(".new_user").attr("disabled",false);
                    }
                };

                ajx(url, 'post', params, successCallback, 'html');
            }

        });


    </script>

@endsection

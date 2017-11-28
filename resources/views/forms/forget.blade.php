@extends('layouts.layout')
@section('custom_css')
    <link href="{{URL::asset('css/registration.css') }}" rel="stylesheet">
@endsection
@section('contant')
    <div class=" container">
        <div class="col-lg-12" style="padding-top: 7%;padding-bottom: 12%;">
            <div class="col-lg-9 col-md-offset-3" style="padding-bottom: 1%">
                <h2>Forget Password</h2>
            </div>
            <form class="forget_form" id="forget_form">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="col-md-offset-3 col-lg-5">
                    <input class="form-control" name="email" placeholder="Enter email" id="registerfield" type="email">
                </div>



                <div class="col-lg-9 col-lg-offset-3" >
                    <button type="submit" class="btn btn-primary active new_password" id="register_signup">Create new password</button>

                </div>
            </form>
            <div class="alert alert-success form_success" style="display: none;">
                <strong>Hurray!</strong> You have successfully created your new password, Please check your Email to login.
            </div>
        </div>
    </div>
@endsection
@section('custom_js')
    <script>

        $(".forget_form").validate({
            rules: {

                email: "required",
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

        $(".new_password").click(function () {

            if ($("#forget_form").valid())
            {
                $(".new_password").text("processing....");
                $(".new_password").attr("disabled",true);

                var params = $("#forget_form").serialize();

                var url = "forget_password";

                var successCallback = function (data) {
                    data = jQuery.parseJSON(data);
                    if (data.status == 'success')
                    {
                        $(".forget_form").slideUp(500).delay(800).fadeOut(400);
                        $(".form_success").slideDown(600).delay(900).fadeIn(600);
                    } else
                    {
                        alert(data.msg);
                        $(".new_password").text("Create new password");
                        $(".new_password").attr("disabled",false);
                    }
                };

                ajx(url, 'post', params, successCallback, 'html');
            }

        });


    </script>

@endsection

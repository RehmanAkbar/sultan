<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ URL::asset('css/perfume_header.css') }}" />

    <link href="{{URL::asset('css/index.css') }}" rel="stylesheet">

    <link href="{{URL::asset('css/carousel.css') }}" rel="stylesheet">
    <link href="{{URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{URL::asset('Font-Awesome-master/Font-Awesome-master/css/font-awesome.min.css') }}" rel="stylesheet">
    <script src="{{URL::asset('js/jquery-3.1.1.js') }}"></script>
    <script src="{{URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery-validator.js') }}"></script>
    <script src="{{ URL::asset('js/slider.js') }}"></script>

    <script src="{{ asset('js/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('js/loadingoverlay.min.js')}}"></script>
    <script src="{{ asset('js/loadingoverlay_progress.min.js')}}"></script>
    <title>Perfume</title>
    @yield('custom_css')
</head>

<body style="font-family:ubuntu;">
@include('layouts.header')

@yield('contant')

@include('layouts.footer')

@yield('custom_js')

</body>
<script>
    var ajax_url = '/';

    function ajx(url, type, data, successCallback, dataType) {
        if (dataType == '' || dataType == undefined)
            dataType = 'json';
        $.ajax({
            url: url,
            type: type,
            data: data,
            dataType: dataType,
            headers: {
                //'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
                .done(successCallback)
                .fail(function (res) {
                    //(res);
                });
    }


    $(document).ready(function () {
        $('#myCarousel').carousel({
            interval: 10000
        })
        $('.fdi-Carousel .item').each(function () {
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            if (next.next().length < 5) {
                next.next().children(':first-child').clone().appendTo($(this));
            }
            else {
                $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
            }
        });
    });
    $(document).ajaxStart(function(){
          $.LoadingOverlay("show");
    });

    $( document ).ajaxComplete(function( event, xhr, settings ) {
        $.LoadingOverlay("hide");
    });
</script>
</html>

<!doctype html>
<html>
<head>
    @include('adminpanel.head')
    <script src="{{URL::asset('js/jquery-3.1.1.js') }}"></script>
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
    </script>
</head>
{{--<body >--}}
<!--Master Page Start-->
@include('adminpanel.nav')
        <!-- sidebar content -->
    <div class="adminsidebar" >
        @include('adminpanel.sidebar')
    </div>
   <!-- main content -->
    <div id="content">
        @yield('custom_css')
        @yield('content')
        @yield('custom_js')
    </div>
<!--Footer-->
<footer>
    @include('adminpanel.footer')
</footer>
<!--Master Page End-->
</body>
</html>
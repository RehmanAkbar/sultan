<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

       
    </head>
    <body>
        @include('header')
                <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif




              <h1 align="center">Your Information</h1>
            <div class='table-responsive'>
                <table class="table">
                            <thead>
                            <tr bgcolor="black" color="">
                            
                                <td>Images</td>
                                <td>Queries</td>
                            </tr>
                            </thead>



                         <tbody>
                        @foreach($product as $info)
                        <tr>
                            
<td><image src="images/<?php  echo $info->img; ?>" width="40px"></image></td>
<td><a href="{{URL::to('/delete',$info->id )}}">Delete</a>  <a href="{{URL::to('/update',$info->id)}}">Update</a> <a href="{{URL::to('/add',$info->id)}}">Insert</a></td>
                        </tr>
        @endforeach
                    </tbody>     
                   
    </table>
    </div>

            
        </div>
    </body>
</html>

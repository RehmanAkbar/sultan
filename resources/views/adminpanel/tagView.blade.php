@extends('adminpanel.master')
@section('title', 'Perfume Club')
<?php

use App\Tag;

?>

@section('content')
    <div class="content-wrapper" style="margin-bottom: -20px;">
        <div class="container-fluid">
            <div class="row" style="margin-top: 20px">
                <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading"><h3>All Tags Avialble in Admin Panel</h3></div>
            <div class="panel-body">
        <!--Product View-->
        <div class='table-responsive'>
            <table class="table table-bordered table-hover">
                <thead>
                <tr class ="table_heading">
                    <th>Row</th>
                    <th>Tag Name</th>
                    <th>Type</th>
                    <th>Images</th>
                    <th style="padding-left: 42px;">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)




                    <tr>
                        <td>{{$tag->id}}</td>
                        <td>{{$tag->tag_name}}</td>
                        <td>{{$tag->type}}</td>
                        <td><img src="{{URL::asset($tag->image)}}" width="30" class="jar1"/></td>
                        <td>
                            <a class="btn table_btton " href="/editTag/{{$tag->id}}">Edit</a>
                            <a class="btn btn-danger mini blue-stripe s" href="/deletetags/{{$tag->id}}">Delete</a>
                        </td>
                    </tr>
@endforeach
                </tbody>
            </table>
        </div>
    </div>
        </div>
    </div>
    </div>
    </div>
    </div>

@endsection

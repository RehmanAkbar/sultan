@extends('adminpanel.master')
@section('title', 'Edit Brand')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="margin-left: 40px;">
            <h3>All Brands Avialble in Admin Panel</h3>
                <div class="panel panel-danger">
                    <div class="panel-heading">All Brands Avialble in Admin Panel</div>
                    <div class="panel-body">
                        <form class="form-inline form_service" id=""  method="post" action="/brandupdate/{{$brnds->id}}" enctype="multipart/form-data">
                         <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                            <div class="form-group">
                                <label>Brand Name</label>
                                <input type="text" name="brand_name" class="form-control" placeholder="Enter your Brand name" value="{{$brnds->brand_name}}" style="width: 700px;" >
                            </div>

                            <div class="form-group">
                                <label style="margin-top: 7px;">File Upload</label>
                                <input type="file" class ="image"  id="image" name="image"  >
                            </div>
                        <br>

                            <button type="submit" name="submit" class="btn btn-default" style="margin-top: 10px;">Submit</button>

                        </form>
                    </div>
                    </div>
                </div>
            </div>



        @endsection
    </div>



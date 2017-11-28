@extends('adminpanel.master')
@section('title', 'Edit Brand')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style=" margin-left: 40px;">
              <h3>Add Brands</h3>
                <div class="panel panel-primary">
                    <div class="panel-heading">Add Brands </div>
                    <div class="panel-body">
                        <form class=""  id=""  method="post" action="/insertbrand" enctype="multipart/form-data">
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                            <div class="form-group">
                                <label>Brand Name</label>
                                <input type="text" name="brand_name" class="form-control" placeholder="Enter your Brand name"  style="width: 612px;" >
                            </div>

                            <div class="form-group">
                                <label>File Upload</label>
                                <input type="file" class ="images"  id="images" name="images" required >
                            </div>


                            <button type="submit" name="submit" class="btn btn-default">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


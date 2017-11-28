@extends('adminpanel.master')
@section('title', 'Add Brand')
@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style=" margin-top:52px;margin-left: 40px;">
                <h3 style="margin-top: -35px;">All Queue Orders</h3>
                <div class="panel panel-danger">

                <div class="panel panel-danger">
                    <div class="panel-heading">All Queue Orders</div>
                    <div class="panel-body">


        <form class=""  id=""  method="post" action="/updateStatus/{{$orderStatus->id}}" enctype="multipart/form-data">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
            <div class="form-group">
                <label>Chang Status</label>
{{--
                <input type="text" id="status" name="status"class="form-control" value="{{$orderStatus->status}}" class="form-control" placeholder="Enter Status" >
--}}
                <select class="form-control" name="status">
                    <option value="Complete" <?php if($orderStatus->status=='complete')echo "selected='selected'";?>  name="status">Complete</option>
                    <option value="Processing" <?php if($orderStatus->status=='processing')echo "selected='selected'";?> name="status">Processing</option>
                </select>

            </div>



            <button type="submit" name="submit" class="btn btn-default" style="margin-top: 10px;" onclick="myFunction()">Submit</button>



        </form>
                    </div>
                </div>
            </div>
        </div>




        @endsection
    </div>



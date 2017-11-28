@extends('adminpanel.master')
@section('title', 'Edit Queue Orders')
@section('content')

<div class="content-wrapper" >

    <div class="row">
        <div class="col-md-8 col-md-offset-2" style=" margin-left: 40px;">
            <h3>All Queue Orders</h3>
            <div class="panel panel-danger">
                <div class="panel-heading"><h4>All Queue Orders</h4></div>
  <div class="panel-body">
      <form method="post" action ="/updtequeodr/{{$editqueodrs->id}}" id="" enctype="multipart/form-data">
          <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">

          <div class="form-group">
                <label>User Name</label>
                <input type="text" name="user_name" id="user_name" value="{{$user->name}}" class="form-control" aria-describedby="passwordHelpInline">
            </div>

            <div class="form-group">
                <label>Brand Name</label>
                @foreach($brands as $brand)
                    <input type="text" name="brand_name" id="brand_name" value="{{$brand->brand_name}}" class="form-control" aria-describedby="passwordHelpInline" >
                @endforeach
            </div>
                <div class="form-group">
                    <label>Product</label>
                    @foreach($products as $product)
                        <input type="text" name="product_name" id="product_name" value="{{$product->product_name}}" class="form-control" aria-describedby="passwordHelpInline" >
                    @endforeach
                </div>

                <div class="form-group">
                    <label>Month</label>
                    <input type="text" name="month" id="month" value="{{$editqueodrs->month}}" class="form-control" aria-describedby="passwordHelpInline">
                </div>
                <div class="form-group">
                    <label>Year</label>
                    <input type="text" name="year" id="year" value="{{$editqueodrs->year}}" class="form-control" aria-describedby="passwordHelpInline">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="completed" <?php if($editqueodrs->status == 'completed')echo "selected='selected'";?>  name="status">Completed</option>
                        <option value="pending" <?php if($editqueodrs->status == 'pending')echo "selected='selected'";?> name="status">Pending</option>
                        <option value="processing" <?php if($editqueodrs->status == 'processing')echo "selected='selected'";?> name="status">Processing</option>
                        <!-- <option value="canceled">Canceled</option>-->
                    </select>
                </div>



            {{--<div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
            </div>--}}
            <button type="submit" name="submit" class="btn btn-default">Submit</button>
      </form>
  </div>
            </div>
        </div>
    </div>

</div>
        <!--Form End-->
@endsection

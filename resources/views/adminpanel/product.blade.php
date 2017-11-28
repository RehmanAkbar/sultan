@extends('adminpanel.master')
@section('title', 'Edit Products')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<style>
    .select2-selection__choice{
        color: black !important;
    }
</style>

<div class="content-wrapper">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="margin-left: 40px;">
                <h3>Add Products</h3>
                <div class="panel panel-primary">
                    <div class="panel-heading">Add Products</div>
                    <div class="panel-body">
                        <!--Form Start-->
                        <form method="post" action ="/insertProduct" id="editForm" enctype="multipart/form-data">
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">

                            <!--Edit Product Form-->

                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" name="product_name" id="product_name"  class="form-control" aria-describedby="passwordHelpInline" placeholder="Enter Product Name" required>
                            </div>
                            <!--Brand-->
                            <div class="form-group">
                                <label>Brand Name</label><br>
                                <select  name="brand_name" id="brand_name" style="height: 34px; width:100%;border-color: #d2d6de;">
                                    @foreach($brands as $brand)
                                        <option value="{{$brand ->id}}">{{$brand ->brand_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--Style-->
                            <div class="form-group">
                                <label>Style Name</label><br>
                                <select  name = "style_name[]" id="style_name" style="height: 34px; width:100%;border-color: #d2d6de;" class="style_name js-example-basic-multiple js-states" multiple placeholder='Style Tag' required>
                                    @foreach($styles as $style )
                                        <option value="{{$style->id}}">{{$style->tag_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Occasions Name</label><br>
                                <select  name="occasion[]" id="occasion" style="height: 34px; width:100%;border-color: #d2d6de;" class="occasion js-example-basic-multiple js-states" placeholder='Occasion Tag' multiple required>
                                    @foreach($occasions as $occasion )
                                        <option value="{{$occasion->id}}">{{$occasion->tag_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Description </label><br>
                                <textarea name="description" class="form-control" rows="5" ></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label>Choose Gender  Filter</label><br>
                                <input type="checkbox" name="men" value="yes" />
                                <label>Men</label>                                
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" name="women" value="yes" />
                                <label>Women</label>
                            </div>
                            
                            <div class="form-group">
                                <label>Choose Other Categories</label><br>
                                <input type="checkbox" name="bestSeller" value="yes" />
                                <label>Best Seller</label>                                
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" name="newArrivals" value="yes" />
                                <label>New Arrivals</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" name="Featured" value="yes" />
                                <label>Featured</label>
                            </div>
                            
                            <div class="form-group">
                                <label style="margin-top: 7px;">File Upload</label>
                                <input type="file" class ="images"  id="images" name="images" required>
                            </div>
                            <button type="submit"  class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
  $('.occasion').select2({
  placeholder: "Select a Occasion",
  allowClear: true
});
  $('.style_name').select2({
  placeholder: "Select a Style",
  allowClear: true
});
  
  $("#editForm").submit(function(e) {

    $(".occasions").val($(".occasion").val());
    $(".styles").val($(".style_name").val());
    

});
  
</script>
@endsection







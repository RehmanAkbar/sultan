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
            <h3>All Brands Avialble in Admin Panel</h3>
            <div class="panel panel-danger">
                <div class="panel-heading">All Brands Avialble in Admin Panel</div>
                <div class="panel-body">
                    <!--Form Start-->
                    <form method="post" action ="/productupdate/{{$products->id}}" id="" enctype="multipart/form-data">
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                           <?php
                           $sty= \App\Tag::where('id',$products->style)->first();
                           $occ= \App\Tag::where('id',$products->occasion)->first();
                            ?>
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" name="product_name" id="product_name" value="{{$products->product_name}}" class="form-control" aria-describedby="passwordHelpInline">
                        </div>
                        <!--Brand-->
                        <div class="form-group">
                            <label>Brand Name</label><br>
                            <select  name="brand_name" id="brand_name"  style="height: 34px; width:100%;border-color: #d2d6de;">
                                @foreach($brands as $brand)
                                    <option {{($brand->id == $products->brand_id) ? "selected" : ''}} value="{{$brand ->id}}">{{$brand ->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--Style-->
                        <div class="form-group">
                            <label>Style Name</label><br>
                            <select  name = "style_name[]" id="style_name" class="style_name" style="height: 34px; width:100%;border-color: #d2d6de;" multiple>
                                {{--<option selected="selected" value="{{$sty->id}}">{{$sty->tag_name}}</option>--}}
                                @foreach($styles as $style )
                                    <option {{(in_array($style->id ,$selected_styles)) ?"selected" : ''}} value="{{$style->id}}">{{$style->tag_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Occasions Name</label><br>
                            <select  name="occasion[]" id="occasion" class="occasion" style="height: 34px; width:100%;border-color: #d2d6de;" multiple>
                                {{--<option selected="selected" value="{{$occ->id}}">{{$occ->tag_name}}</option>--}}
                                @foreach($occasions as $occasion )

                                    <option {{(in_array($occasion->id ,$selected_occasion)) ?"selected" : ''}} value="{{$occasion->id}}">{{$occasion->tag_name}}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Description </label><br>
                            <textarea name="description"  class="form-control"  rows="5" >{{$products->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <img id="img" style="width: 80px" src="{{asset($products->image)}}">

                            <label style="margin-top: 7px;">File Upload</label>
                            <input type="file" class ="image"  id="image" name="image">
                        </div>

                        <div class="form-group">
                            <label>Occasions Name</label><br>
                            <input type="checkbox" name="men" value="yes" @if($products->men == 'yes') checked="checked" @endif />
                                   <label>Men</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="women" value="yes" @if($products->women == 'yes') checked="checked" @endif />
                                   <label>Women</label>

                        </div>
                        <div class="form-group">
                            <label>Other Categories</label><br>
                            <input type="checkbox" name="bestSeller"  value="yes" @if($products->bestSeller == 'yes') checked="checked" @endif />
                            <label>Best Seller</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="newArrivals" value="yes" @if($products->newArrivals == 'yes') checked="checked" @endif />
                            <label>newArrivals</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="Featured" value="yes" @if($products->Featured == 'yes') checked="checked" @endif />
                            <label>Featured</label>

                        </div>
                        

                        <button type="submit" name="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$('.occasion').select2({
placeholder: "Select a Occasion",
        allowClear: true,
});
$('.style_name').select2({
placeholder: "Select a Style",
        allowClear: true
        });
$("#editForm").submit(function(e) {

$(".occasions").val($(".occasion").val());
$(".styles").val($(".style_name").val());
});


$("div#myId").dropzone({ url: "/file/post" });
    $("#image").change(function(){

        $("#img").attr('src' , $(this).val());
    });
</script>
@endsection

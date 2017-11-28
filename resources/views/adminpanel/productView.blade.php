@extends('adminpanel.master')
@section('title', 'Perfume Clube')
<?php
use App\Brand;
use App\Tag;

?>

@section('content')

    <div class="content-wrapper" >
        <div class="container-fluid">
            <div class="row" style="margin-top: 20px">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h3>All Products</h3></div>

                        <div class="panel-body">
                            <div class='table-responsive'>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr class ="table_heading">
                                        <th>No#</th>
                                        <th>Brand</th>
                                        <th>Product</th>
                                        <th>Style</th>
                                        <th>Occasion</th>
                                        <th>Images</th>
                                        <th>Men</th>
                                        <th>WoMen</th>
                                        <th>Best Seller</th>
                                        <th>New Arrivals</th>
                                        <th>Featured</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                                <?php

                                                /* $brand = Brand::where('id',$product->brand_id)
                                                         ->first();*/
                                                $style = Tag::where('id',$product->style)->first();
                                                $occasion = Tag::where('id',$product->occasion)->first();
                                                ?>
                                                <tr>
                                                    <td>{{ ++$loop->index }}</td>
                                                    <td>{{$product->brand_name}}</td>
                                                    <td>{{$product->product_name}}</td>
                                                    <td>{{(isset($style->tag_name) ? $style->tag_name : '')}}</td>
                                                    <td>{{(isset($occasion->tag_name) ? $occasion->tag_name: '')}}</td>
                                                    <td><img src="{{URL::asset($product->image)}}" width="30" class="jar1"/></td>
                                                    <td>{{$product->men}}</td>
                                                    <td>{{$product->women}}</td>
                                                    <td>{{$product->bestSeller}}</td>
                                                    <td>{{$product->newArrivals}}</td>
                                                    <td>{{$product->Featured}}</td>
                                                    <td>{{$product->quantity}}</td>

                                                    <td style="width: 21%;">
                                                        <div style="width: 102%;">
                                                            <a class="btn btn-sm btn-info add_stock" data-brand="{{$product->brand_name}}" data-product="{{$product->product_name}}" data-id="{{$product->id}}"  href="#">Add Stock</a>
                                                            <a class="btn btn-sm btn-success" href="/editproduct/{{$product->id}}">Edit</a>
                                                            <a class="btn btn-danger btn-sm delete" data-delete="{{$product->id}}">
                                                                Delete
                                                            </a>
                                                        </div>
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

    <div class="modal fade" id="stockModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 id="brand_name" class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="" >
                        <div class="panel panel-danger">
                            <div  class="panel-heading">
                                <h4 id="product_name"></h4>
                            </div>
                            <div class="panel-body">
                                <?php
                                $brands=\App\Brand::orderby('brand_name', 'asc')->get();
                                ?>
                                <form class=""  id="form_stock" >
                                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">

                                    <div class="form-group">

                                    </div>
                                    <div class="form-group">
                                        <label>Product Quantity</label>
                                        <input type="text" name="quantity"  class="form-control" placeholder="Enter Product Quantity"   required>
                                    </div>

                                    <input type="hidden" id="quantity" name="product_id">
                                    <button type="submit" name="submit" class="btn btn-default product_stock">Submit</button>

                                </form>
                            </div>
                        </div>
                    </div>

                    {{--<div class="content-wrapper">
                        <div class="row">
                        </div>
                    </div>--}}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>



@endsection
@section('custom_js')

    <script type="text/javascript">

        $(document).on('click' , '.add_stock' , function (e) {

            var brand_name = $(this).data('brand');
            var product_name = $(this).data('product');
            var product_id = $(this).data('id');

            $("#brand_name").text("Brand: " + brand_name);
            $("#product_name").text("Product: " + product_name);
            $("#quantity").val(product_id);

            $('#stockModal').modal('show');

        });
        $(".brand_name").change(function (){

            var params = {};
            var p_id = $(this).val();
            params.id = p_id;
            var url = ajax_url + 'get_product';

            var successCallback = function (res) {
                var options = '';
                res = jQuery.parseJSON(res);
                $.each(res, function( index, value ) {
                    console.log( value.shade_name );
                    options += '<option value="'+value.id+'">'+value.product_name+'</option>';
                });

                $(".pro_name").html(options);
            };

            ajx(url, 'get', params, successCallback, 'html');

        });
        $(".product_stock").click(function () {

            var params = $("#form_stock").serialize();

            var url = "/add_stock";

            var successCallback = function (data) {
                data = jQuery.parseJSON(data);
                if (data.status == 'success')
                {

                    window.location.reload();
                } else
                {
                    alert(data.msg);
                }
            };
            ajx(url, 'post', params, successCallback, 'html');
        });


        $(document).on('click' , '.delete' , function(){
            var id = $(this).data('delete');
            var params = id;
            bootbox.confirm({
                size: "small",
                message: "Are you sure?",
                callback: function(result){
                    if(result){
                        var url = "/deleteProduct/"+ id;

                        var successCallback = function (data) {
                            data = jQuery.parseJSON(data);
                            if (data.status == 'success')
                            {
                                window.location.reload();
                            } else
                            {
                            }
                        };
                        ajx(url, 'get', params, successCallback, 'html');

                    }
                }
            });
        })

    </script>

@endsection

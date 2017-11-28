@extends('adminpanel.master')
@section('title', 'Add New Stock')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style=" margin-left: 40px;">
                <h3>Add New Stock</h3>
                <div class="panel panel-primary">
                    <div class="panel-heading">Add New Stock </div>
                    <div class="panel-body">
                        <?php
                        $brands=\App\Brand::orderby('id', 'asc')->get();
                            ?>
                        <form class=""  id="form_stock" >
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                            <div class="form-group">
                                <label>Brand Name</label><br>
                                <select class="brand_name" name="brand_name" id="brand_name"  style="height: 34px; width:100%;border-color: #d2d6de;">
                                    <option value="">Select brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand ->id}}">{{$brand ->brand_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Product Name</label><br>
                                <select class="pro_name" name="product_name" id="brand_name"  style="height: 34px; width:100%;border-color: #d2d6de;" required>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Product Quantity</label>
                                <input type="text" name="quantity" class="form-control" placeholder="Enter Product Quantity"  style="width: 610px;"  required>
                            </div>


                            <button type="submit" name="submit" class="btn btn-default product_stock">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_js')

    <script>

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
    </script>

@endsection

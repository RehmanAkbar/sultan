@extends('adminpanel.master')
@section('title', 'Edit Products')
@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="margin-left: 40px;">
                <h3>All Brands Avialble in Admin Panel</h3>
                <div class="panel panel-danger">
                    <div class="panel-heading">All Brands Avialble in Admin Panel</div>
                    <div class="panel-body">
                        <!--Form Start-->
                        <form method="post" action ="/updateTags/{{$tags->id}}" id="" enctype="multipart/form-data">
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                            <!--Edit Product Form-->

                            <div class="form-group">
                                <label>Tag Name</label>
                                <input type="text" name="tag_name" id="tag_name" class="form-control" aria-describedby="passwordHelpInline"value="{{$tags->tag_name}}">
                            </div>

                            <div class="form-group">
                                <label>File Upload</label>
                                <input type="file" class ="images"  id="images" name="images" class="form-control">
                            </div>
                            <div class="form-group">
                                <label >Types</label><br>
                                <?php

                                $type=explode(',', $tags['type']);
                                ?>

                                Style<input type="checkbox" <?php if(in_array('style', $type)){ ?>checked="checked"<?php }?> id="inlineCheckbox2" name="type[]" value="style"style="height:18px;width:18px;margin-top: 2px;  margin-left:12px;" >


                                Occasion<input type="checkbox"  <?php if(in_array('occasion', $type)){ ?>checked="checked"<?php }?> id="inlineCheckbox2" name="type[]" value="occasion"style="height:18px;width:18px;margin-top: 2px;  margin-left:20px;">
                            </div>

                            <button type="submit" name="submit" class="btn btn-default">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>



@endsection
    </div>






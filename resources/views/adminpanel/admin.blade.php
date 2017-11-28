@extends('adminpanel.master')
@section('title', 'Perfume Club')
@section('content')
    <div class="content-wrapper" style="margin-bottom: -20px;">
        <div class="container-fluid">
            <div class="row" style="margin-top: 20px">
                <div class="col-md-12">

        <div class="panel panel-primary">
       <div class="panel-heading"><h3>All Brands Avialble in Admin Panel</h3></div>
        <div class="panel-body">
        <div class='table-responsive'>

            <table class="table table-bordered table-hover">
                <thead>
                <tr class ="table_heading">
                    <th>No#</th>
                    <th>Brand Name</th>
                    <th>Images</th>
                    <th style="text-align: center;">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($brands as $brand)

                    <tr><td>{{$loop->index+1}}</td>
                        <td>{{$brand->brand_name}} </td>
                        <td> <img src="{{URL::asset($brand->image)}}" width="50" class="jar1"/></td>
                        <td style="text-align: center;">
                            <a class="btn  table_btton" href="/editBrand/{{$brand->id}}">Edit</a>
                            <a class="btn btn-danger mini blue-stripe s" href="/deleteBrand/{{$brand->id}}">Delete</a>
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

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">


    <link rel="stylesheet" href="{{ URL::asset('css/perfume_header.css') }}" />

    <link href="{{URL::asset('css/starter.css') }}" rel="stylesheet">
    <link href="{{URL::asset('css/admininfo.css') }}" rel="stylesheet">
    <link href="{{URL::asset('css/style.css') }}" rel="stylesheet">
    <link href="{{URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{URL::asset('css/skin-blue.min.css') }}" rel="stylesheet">
      <link href="{{URL::asset('css/AdminLTE.min.css') }}" rel="stylesheet">
    <link href="{{URL::asset('Font-Awesome-master/Font-Awesome-master/css/font-awesome.min.css') }}" rel="stylesheet">


    <script src="{{URL::asset('js/jquery-3.1.1.js') }}"></script>
    <script src="{{URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{URL::asset('js/dashboard.js') }}"></script>
    <script src="{{URL::asset('js/jquery-2.1.3.min.js') }}"></script>





  <title>AdminLTE 2 | Starter</title>
 
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  @include('adminpanel.nav')
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
       <li class="active"><a href="brand"><i class="fa fa-link"></i> <span>Brands</span></a></li>
        <li><a href="starter"><i class="fa fa-link"></i> <span>Insert info</span></a></li>
        <li><a href="product"><i class="fa fa-link"></i> <span>Product</span></a></li>
        <li><a href="price"><i class="fa fa-link"></i> <span>Price</span></a></li>
        <li><a href="orders"><i class="fa fa-link"></i> <span>Order</span></a></li>

        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
 <div class='table-responsive'>
                <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name </th>
                                 <th>Queries </th>
                            </tr>
                            </thead>
                     <tbody>
        @foreach($brand as $bra)
                        <tr>
                            <td>{{$bra->id}}</td>
                            <td>{{$bra->brand_name}}</td>
                            <td><a class="btn btn-danger mini blue-stripe s" href="{{URL::to('/delete',$bra->id)}}">Delete</a> 
                           <a class="btn btn-success mini blue-stripe s" href="{{URL::to('/brandedit',$bra->id)}}">Edit</a> 
                           <a class="btn btn-primary mini blue-stripe s" href="{{URL::to('/add',$bra->id)}}">Insert</a></td>
                        </tr>
        @endforeach
                    </tbody>
    </table>



    </div>
    <!-- table div end -->

 </div><!-- main div  end-->

        





    </form>
    <!-- Content Header (Page header) -->
   
    <!-- /.content -->
  
 
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>
</div>
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>

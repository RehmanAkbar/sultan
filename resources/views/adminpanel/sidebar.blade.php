<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        {{--<div class="user-panel">
            <div class="pull-left image">
                <img src="/images/logo.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Perfmume Club Admin</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>--}}

        <!-- search form (Optional) -->
        <!--        <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                        </button>
                      </span>
                    </div>
                </form>-->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <li><a href="/dashbord"><i class="fa fa-link"></i> <span>Dashbord</span></a></li>

            <li class="treeview active">
                <a href="#"><i class="fa fa-link"></i> <span>Brands</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/addBrand">Add New Brands</a></li>
                    <li><a href="/view_panel">All Brand</a></li>
                </ul>
            </li>
            </li>
            <li class="treeview active">
                <a href="#"><i class="fa fa-link"></i> <span>Products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/product">Add Products</a></li>
                    <li><a href="/productView">All Products</a></li>
                </ul>
            </li>
            <li class="treeview active">
                <a href="#"><i class="fa fa-link"></i> <span>Product Stocks</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/new_stock">Add new stock</a></li>
                    <li><a href="/produ_stock">All Stock</a></li>
                </ul>
            </li>

            <li class="treeview active">
                <a href="#"><i class="fa fa-link"></i> <span>Tags</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/tag">Add Tags</a></li>
                    <li><a href="/tagView">All Tags</a></li>
                </ul>
            </li>


           {{-- <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Queue Orders</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/orderViewQue">Pending Orders</a></li>
                    <li><a href="/order_view_completed">Completed Orders</a></li>
                </ul>
            </li>--}}
            
            <li><a href="/userView"><i class="fa fa-link"></i> <span>Users</span></a></li>
                


<!--            <li><a href="/expiredSubscription"><i class="fa fa-link"></i> <span>Expired Subscriptions</span></a></li>-->


        </ul>
        <!--                                                 /.sidebar-menu -->
                                                    </section>
    <!-- /.sidebar -->
</aside>

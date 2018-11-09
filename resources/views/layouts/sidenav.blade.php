<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div>asdf</div>
            <div class="pull-left image">
                <img src="{{asset('img/avatar5.png')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>

                        {{Auth::user()->name}}

                </p>
            </div>

        </div>

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="/jarn_im/public/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Products</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/jarn_im/public/inventoryList"><i class="fa fa-circle-o"></i>Inventory List</a></li>
                    <li><a href="/jarn_im/public/requestList"><i class="fa fa-circle-o"></i>Request Materials List</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Person</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/jarn_im/public/supplierList"><i class="fa fa-circle-o"></i>Suppliers</a></li>
                    <li><a href="/jarn_im/public/personList"><i class="fa fa-circle-o"></i>Employee</a></li>
                    <li><a href="/jarn_im/public/areaList"><i class="fa fa-circle-o"></i>Area</a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-asterisk"></i> <span>Category</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/jarn_im/public/unitList"><i class="fa fa-circle-o"></i> View Units</a></li>
                    <li><a href="/jarn_im/public/categoryList"><i class="fa fa-circle-o"></i> View Categories</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Purchases</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/jarn_im/public/createInvoice"><i class="fa fa-circle-o"></i>Create Invoice</a></li>
                    <li><a href="/jarn_im/public/invoiceList"><i class="fa fa-circle-o"></i>Invoice List</a></li>
                    <li><a href="/jarn_im/public/invoiceTypeList"><i class="fa fa-circle-o"></i>Invoice Category</a></li>


                </ul>
            </li>






            <li><a href="/jarn_im/public/viewReports"><i class="fa fa-pie-chart"></i> <span>Reports</span></a></li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
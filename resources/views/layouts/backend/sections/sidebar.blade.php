<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/backend/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="/home" class="nav-link {{request()->is('*/home') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if(Auth::user()->type == 'admin')
                    <li class="nav-item menu-open">
                        <a href="{{route('admin.create.customer')}}" class="nav-link {{request()->is('admin/create-customer') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Add New Customer
                            </p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="{{route('admin.orders')}}" class="nav-link {{request()->is('admin/orders') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Orders
                            </p>
                        </a>
                    </li>
                @elseif(Auth::user()->type == 'customer')
                    <li class="nav-item menu-open">
                        <a href="{{route('customer.place.order')}}" class="nav-link {{request()->is('customer/place-order') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                               Place Order
                            </p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

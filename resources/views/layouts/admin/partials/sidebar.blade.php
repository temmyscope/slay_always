<header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="{{asset('assets/images/dashboard/1.png')}}" alt="" />
        <div class="badge-bottom"><span class="badge badge-primary">New</span></div>
        <a href="user-profile"> <h6 class="mt-3 f-14 f-w-600">Emay Walter</h6></a>
        <p class="mb-0 font-roboto">Admin</p>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>General</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="edit"></i><span>General</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/blog') }};">
                        <li><a href="{{route('index')}}" class="{{routeActive('index')}}">Dashboard</a></li>
                        <li><a href="{{ route('users') }}" class="{{routeActive('users')}}">Users</a></li>
                        <li><a href="{{ route('orders') }}" class="{{routeActive('orders')}}">Orders</a></li>
                        <li><a href="{{ route('promos') }}" class="{{routeActive('promotions')}}">Promotions</a></li>
                        <li><a href="{{ route('editor') }}" class="{{routeActive('editor')}}">Newsletter editor</a></li>
                        <li><a href="{{ route('settings') }}" class="{{routeActive('settings')}}">Settings</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-main-title">
                        <div>
                            <h6>Products Section</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title {{ prefixActive('/product') }}" href="javascript:void(0)"><i data-feather="edit"></i><span>Products</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/blog') }};">
                            <li><a href="{{ route('list-products') }}" class="{{routeActive('list-products')}}">Product list</a></li>
                            <li><a href="{{ route('productcreate') }}" class="{{routeActive('productcreate')}}">Add new Product</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>

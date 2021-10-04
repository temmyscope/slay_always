<header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="{{asset('assets/images/dashboard/1.png')}}" alt="" />
        <div class="badge-bottom"><span class="badge badge-primary">New</span></div>
        <a href="user-profile"> <h6 class="mt-3 f-14 f-w-600">Emay Walter</h6></a>
        <p class="mb-0 font-roboto">{Admin}</p>
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
                        <li><a href="{{route('index')}}" class="{{routeActive('index')}}">Dashboard</a></li>
                        <a class="nav-link menu-title {{ prefixActive('/project') }}" href="javascript:void(0)"><i data-feather="box"></i><span>Project</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/project') }};">
                            <li><a href="{{ route('projectcreate') }}" class="{{routeActive('projectcreate')}}">Add new Product</a></li>
                        </ul>
                        <li><a href="{{ route('simple-MDE') }}" class="{{routeActive('simple-MDE')}}">MDE editor</a></li>
                        <a class="nav-link menu-title link-nav {{routeActive('file-manager')}}" href="{{ route('file-manager') }}"><i data-feather="git-pull-request"></i><span>File manager</span></a>
                        
                        <li><a href="{{ route('list-products') }}" class="{{routeActive('list-products')}}">Product list</a></li>
                        <li><a href="{{ route('order-history') }}" class="{{routeActive('order-history')}}">Orders</a></li>
                        <li><a href="{{ route('email_compose') }}" class="{{routeActive('email_compose')}}">Compose</a></li>
                        <li><a href="{{ route('chat') }}" class="{{routeActive('chat')}}">Chats</a></li>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title {{ prefixActive('/users') }}" href="javascript:void(0)"><i data-feather="users"></i><span>Users</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/users') }};">
                            <li><a href="{{ route('user-profile') }}" class="{{routeActive('user-profile')}}">Users Profile</a></li>
                            <li><a href="{{ route('edit-profile') }}" class="{{routeActive('edit-profile')}}">Users Edit</a></li>
                            <li><a href="{{ route('user-cards') }}" class="{{routeActive('user-cards')}}">Users Cards</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title {{ prefixActive('/blog') }}" href="javascript:void(0)"><i data-feather="edit"></i><span>Blog</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/blog') }};">
                            <li><a href="{{ route('blog') }}" class="{{routeActive('blog')}}">Blog Details</a></li>
                            <li><a href="{{ route('blog-single') }}" class="{{routeActive('blog-single')}}">Blog Single</a></li>
                            <li><a href="{{ route('add-post') }}" class="{{routeActive('add-post')}}">Add Post</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>

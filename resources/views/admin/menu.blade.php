        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <img src="/images/icon/logoArt.png"  width="200" height="50" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="/images/icon/youssef.png"  />
                    </div>
                    <h4 class="name">{{Auth::user()->name}}</h4>
                    <a href="{{route('admin.deconnexion')}}">Sign out</a>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a class="js-arrow" href="{{route('admin.index')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{route("admin.products")}}">
                                <i class="fas fa-chart-bar"></i>Products</a>
                        </li>
                        <li>
                            <a href="{{route("admin.orders")}}">
                                <i class="fas fa-shopping-basket"></i>Orders
                            </a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="{{route("admin.categories")}}">
                                <i class="fas fa-trophy"></i>Categories 
                            </a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="{{route("admin.users")}}">
                                <i class="fas fa-user"></i>Users
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="/images/icon/logoArt.png" width="200" height="50" />
                                </a>
                            </div>
                            <div class="header-button2">
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="#">
                        <img src="/images/icon/logoArt.png" />
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                        <div class="image img-cir img-120">
                            <img src="/images/icon/youssef.png" alt="John Doe" />
                        </div>
                        <h4 class="name">{{Auth::user()->name}}</h4>
                        <a href="{{route('admin.deconnexion')}}">Sign out</a>
                    </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                            <li class="has-sub">
                                <a class="js-arrow" href="{{route('admin.index')}}">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="{{route("admin.products")}}">
                                    <i class="fas fa-chart-bar"></i>Products</a>
                            </li>
                            <li>
                                <a href="{{route("admin.orders")}}">
                                    <i class="fas fa-shopping-basket"></i>Orders
                                </a>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-trophy"></i>Features
                                </a>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-user"></i>Users
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END HEADER DESKTOP-->
<style>
@media screen and (min-width: 995px){
  .header-button-item { display: none; }   /* hide it elsewhere */
}
</style>
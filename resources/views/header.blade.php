<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="#"> <img src="/img/logo1.png" alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route("home")}}">Home</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{route("category.details")}}">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route("home")}}">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route("contact")}}">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="hearer_icon d-flex">
                        @if (Auth::user()) 
                        <div class="nav-item dropdown">
                            <a  style="color:black;" class="dropdown-toggle" href="{{route("login")}}" id="navbarDropdown"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{Auth::user()->name}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route("logout")}}"> logout</a>
                            </div>
                        </div>
                        @endif                        
                        <a href="{{route("log")}}">
                        <i class="ti-user"></i>  
                       </a>
                        <div class="cart">
                            <a  href="{{route("cart")}}">
                                <i class="fas fa-cart-plus" count="{{\Cart::getTotalQuantity()}}"></i>
                            </a>
                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
  <!-- Header part end-->
  <style>
    i:after {
       content: attr(count)
     }
   </style>
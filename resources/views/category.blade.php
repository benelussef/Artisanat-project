<!doctype html>
<html lang="zxx">

<head>
    @include('toplinks')
</head>

<body>
    <!--::header part start::-->
    @include('header')
    <!-- Header part end-->

    <!--================Home Banner Area =================-->
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Shop Category</h2>
                            <p>Home <span>-</span> Shop Category</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Category Product Area =================-->
    <section class="cat_product_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Browse Categories</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    @foreach($categories as $category)
                                    <li>
                                        <a href="{{ route("category.products",$category->slug) }}">{{$category->title}}</a>
                                        <span>({{$category->products->count()}})</span>
                                    </li>
                                     @endforeach
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product_top_bar d-flex justify-content-between align-items-center">
                                <div class="single_product_menu d-flex">
                                    <h5>short by : </h5>
                                    <select>
                                        <option data-display="Select">name</option>
                                        <option value="1">price</option>
                                        <option value="2">product</option>
                                    </select>
                                </div>
                                <div class="single_product_menu d-flex">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="search"
                                            aria-describedby="inputGroupPrepend">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"><i
                                                    class="ti-search"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center latest_product_inner">
                        @foreach($products as $product)
                        <div class="col-lg-4 col-sm-6">
                            <div class="single_product_item">
                                <a href="{{route("products.show",$product->slug)}}">
                                <img src="{{asset($product->image)}}" alt="" width="260" height="330">
                                </a>
                                <div class="single_product_text">
                                    <h4>{{$product->title}}</h4>
                                    <h3>{{$product->price}} MAD</h3>
                                    @csrf
                                    @method('PUT')
                                    <a href="{{route("add.to.cart" , $product->slug)}}" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                               {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->
    <!--::footer_part start::-->
    @include("footer")
    @include("bottomlinks")
</body>

</html>
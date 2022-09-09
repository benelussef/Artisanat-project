<!doctype html>
<html lang="zxx">

<head>
  @include('toplinks')
</head>

<body>
   <!--::header part start::-->
   @include('header')
    <!-- Header part end-->

  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Shop Single</h2>
              <p>Home <span>-</span> Shop Single</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->
  <!--================End Home Banner Area =================-->

  <!--================Single Product Area =================-->
  <div class="product_image_area section_padding">
    <div class="container">
      <div class="row s_product_inner justify-content-between">
        <div class="col-lg-7 col-xl-7">
          <div class="product_slider_img">
            <div id="vertical">
              <div data-thumb="{{asset($product->image)}}">
                <img src="{{asset($product->image)}}" width="550" height="450" />
              </div>
              <div data-thumb="{{asset($product->image)}}">
                <img src="{{asset($product->image)}}" width="550" height="450"/>
              </div>
              <div data-thumb="{{asset($product->image)}}">
                <img src="{{asset($product->image)}}" width="550" height="450"/>
              </div>
              <div data-thumb="{{asset($product->image)}}">
                <img src="{{asset($product->image)}}" width="550" height="450"/>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 col-xl-4">
          <div class="s_product_text">
            <h5>previous <span>|</span> next</h5>
            <h3>{{$product->title}}</h3>
            <h2>{{$product->price}}</h2>
            <ul class="list">
              <li>
                <a class="active" href="#">
                  <span>Category</span> : Household</a>
              </li>
              <li>
                <a href="#"> <span>Availibility</span> : 
                 @if($product->inStock > 0)  
                    In Stock 
                  @else
                  Not Availible
                  @endif
                </a>
              </li>
            </ul>
            <p>
              {{$product->description}}
            </p>
            <form action="{{route("add.cart" , $product->slug)}}" method="post">
              @csrf
            <div class="card_area d-flex justify-content-between align-items-center">
              <div class="product_count">
                <input class="input-number" name="qty" id="qty" type="number" value="1" min="1" max="{{$product->inStock}}">
              </div>
              <button type="submit" class="btn_3">add to cart</button>
              <a href="#" class="like_us"> <i class="ti-heart"></i> </a>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--================End Single Product Area =================-->
  @include("footer")
  @include("bottomlinks")
</body>

</html>
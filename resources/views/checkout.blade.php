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
              <h2>Producta Checkout</h2>
              <p>Home <span>-</span> Shop Single</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!--================Checkout Area =================-->
  <section class="checkout_area padding_top">
    <div class="container">
      <div class="billing_details">
        <div class="row">
          <div class="col-lg-8">
            <h3>Billing Details</h3>
            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
              <div class="col-md-6 form-group p_star">
                <input  type="text" class="form-control" id="first" name="name" value="{{$user->name}}" />
              </div>
              <div class="col-md-6 form-group p_star">
                <input  type="text" class="form-control" id="last" name="name" value="{{$user->name}}" />
              </div>
              <div class="col-md-6 form-group p_star">
                <input placeholder="number"  type="text" class="form-control" id="number" name="number" value="{{$user->numberphone}}"/>
              </div>
              <div class="col-md-6 form-group p_star">
                <input  type="text" class="form-control" id="email" name="compemailany" value="{{$user->email}}"/>
              </div>
              <div class="col-md-12 form-group p_star">
                <input placeholder="Address" type="text" class="form-control" id="add2" name="add2" value="{{$user->address}}"/>
              </div>
            </form>
          </div>
          <div class="col-lg-4">
            <div class="order_box">
              <h2>Your Order</h2>
              <ul class="list">
                <li>
                  <a href="#">Product
                    <span>Total</span>
                  </a>
                </li>
                @foreach($items as $item)
                <li>
                  <a href="#">{{$item->name}}
                    <span class="middle">x {{$item->quantity}}</span>
                    <span class="last">{{$item->price * $item->quantity}}</span>
                  </a>
                </li>
                @endforeach
              </ul>
              <ul class="list list_2">
                <li>
                  <a href="#">Total
                    <span>{{\Cart::getSubtotal()}}</span>
                  </a>
                </li>
              </ul>
              <form action="{{route("make.payment")}}" method="post">
                @csrf
              <div class="payment_item">
                <div class="radion_btn">
                  <input checked type="radio" id="f-option5" name="paymenttype" value="cash" id="cash"/>
                  <label for="f-option5">Cash delivery</label>
                  <div class="check"></div>
                </div>
              </div>
              <div class="payment_item active">
                <div class="radion_btn">
                  <input type="radio" id="f-option6" name="paymenttype" value="paypal" id="paypal"/>
                  <label for="f-option6">Paypal </label>
                  <img src="img/product/single-product/card.jpg" alt="" />
                  <div class="check"></div>
                </div>
              </div>
              <div class="creat_account">
                <input type="checkbox" id="f-option4" name="selector" />
                <label for="f-option4">I’ve read and accept the </label>
                <a href="#">terms & conditions*</a>
              </div>
              <button type="submit" class="btn_3">ORDER</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Checkout Area =================-->
  <!--::footer_part start::-->
  @include("footer")
  @include("bottomlinks")
</body>

</html>
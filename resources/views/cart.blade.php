<!doctype html>
<html lang="zxx">

<head>
  @include('toplinks')
</head>

<body>
  <!--::header part start::-->
   @include('header')
  <!--================Home Banner Area =================-->
  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Cart Products</h2>
              <p>Home <span>-</span>Cart Products</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @include('layouts.alerts')
  <!--================Cart Area =================-->
  <section class="cart_area padding_top">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
             @foreach($items as $item)
              <tr>
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <img src="{{$item->associatedModel->image}}" width="147" height="100" alt="" />
                    </div>
                    <div class="media-body">
                      <p>{{$item->name}}</p>
                    </div>
                  </div>
                </td>
                <td>
                  <h5>{{$item->price}}MAD</h5>
                </td>
                <td>
                  <form class="d-flex flex-row justify-content-center align-items-center" action="{{route("update.cart",$item->associatedModel->slug)}}" method="post">
                    @csrf
                    @method("PUT")
                       <div class="form-group">
                           <input type="number" name="qty" id="qty" value="{{$item->quantity}}" max="{{$item->associatedModel->inStock}}" min="1" class="form-control">
                       </div>
                       <div class="form-group">
                           <button type="submit" class="btn btn-sm btn-warning">
                                 <i class="fa fa-edit"></i>
                           </button>
                       </div>
                  </form>
                </td>
                <td>
                  <h5>{{$item->price * $item->quantity}}MAD</h5>
                </td>
                <td>
                    <form class="d-flex flex-row justify-content-center align-items-center" action="{{route("remove.cart",$item->associatedModel->slug)}}" method="post">
                        @csrf
                        @method("DELETE")
                           <div class="form-group">
                               <button type="submit" class="btn btn-sm btn-danger">
                                     <i class="fa fa-trash"></i>
                               </button>
                           </div>
                      </form>
                </td>
              </tr>
              @endforeach
              <tr>
                <td></td>
                <td></td>
                <td>
                  <h5>Subtotal</h5>
                </td>
                <td>
                  <h5>{{\Cart::getSubtotal()}}MAD</h5>
                </td>
                <td></td>
              </tr>

            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="{{route("category.details")}}">Continue Shopping</a>
            @if(\Cart::getSubtotal() > 0)
            <a class="btn_1 checkout_btn_1" href="{{route("checkout")}}">Proceed to checkout</a>
            @endif
          </div>
        </div>
      </div>
  </section>
  <!--================End Cart Area =================-->
    @include("footer")
    @include("bottomlinks")
</body>

</html>
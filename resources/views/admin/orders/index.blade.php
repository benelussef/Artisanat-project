<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.toplinks')

</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('admin.menu')
        <div class="m-3 p-1">
            @include("layouts.alerts")
         </div>
        <div class="row mt-5 p-5">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                <h3 class="title-5 m-b-35">Orders</h3>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Client</th>
                                <th>Product</th>
                                <th>Quantite</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>Paye</th>
                                <th>Livree</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr class="tr-shadow">
                                <td>
                                 {{$order->id}}
                                </td>
                                <td>{{$order->user->name}}</td>
                                <td>
                                    {{$order->product_name}}
                                </td>
                                <td>{{$order->qty}}</td>
                                <td>{{$order->price}} MAD</td>
                                <td>{{$order->total}} MAD</td>
                                <td>
                                   @if($order->paid)
                                   <i class="fa fa-check text-success"></i>
                                   @else
                                   <i class="fa fa-times text-danger"></i>
                                   @endif
                                </td>
                                <td>
                                    @if($order->delivered)
                                    <i class="fa fa-check text-success"></i>
                                    @else
                                    <i class="fa fa-times text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    <div class="table-data-feature d-flex justify-content-between">
                                        <form method="POST" action="{{ route("orders.update",$order->id)}}">
                                            @csrf
                                            @method("PUT")
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Livree">
                                            <i class="zmdi zmdi-edit"></i>
                                        </button>
                                        </form>
                                        <form id="{{$order->id}}" method="POST" action="{{ route("orders.destroy",$order->id)}}">
                                            @csrf
                                            @method("DELETE")
                                        <button
                                        onclick="event.preventDefault();
                                        if(confirm('Delete Order {{$order->id}}?'))
                                        document.getElementById({{$order->id}}).submit();
                                        "
                                        class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="zmdi zmdi-delete"></i>
                                        </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <tr class="spacer"></tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="justify-content-center d-flex">
                         {{$orders->links()}}
                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>
            
        @include('admin.footer')

            <!-- END PAGE CONTAINER-->
        </div>

    </div>

  @include('admin.bottomlinks')
</body>

</html>
<!-- end document-->

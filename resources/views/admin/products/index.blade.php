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
                <h3 class="title-5 m-b-35">Products</h3>
                <div class="table-data__tool">
                    <div class="table-data__tool-right">
                        <a href="{{route("products.create")}}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>Add Product</a>
                    </div>
                </div>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Description</th>
                                <th>Quantite</th>
                                <th>Price</th>
                                <th>Disponible</th>
                                <th>Categorie</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr class="tr-shadow">
                                <td><img src="{{asset($product->image)}}" width="60" height="50" class="img-fluid rounded"></td>

                                <td>{{$product->title}}</td>
                                <td>
                                    {{Str::limit($product->description,50)}}
                                </td>
                                <td>{{$product->inStock}}</td>
                                <td>{{$product->price}} MAD</td>
                                <td>
                                   @if($product->inStock > 0)
                                   <i class="fa fa-check text-success"></i>
                                   @else
                                   <i class="fa fa-times text-danger"></i>
                                   @endif
                                </td>
                                <td>
                                 @isset($product->category->title)
                                 {{$product->category->title}} 
                                 @endisset
                                </td>
                                <td>
                                    <div class="table-data-feature d-flex justify-content-between">
                                    
                                        <a href="{{ route("products.edit",$product->slug)}}" class="item" data-toggle="tooltip" data-placement="top" title="update">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <form id="{{$product->id}}" method="POST" action="{{ route("products.destroy",$product->slug)}}">
                                            @csrf
                                            @method("DELETE")
                                        <button
                                        onclick="event.preventDefault();
                                        if(confirm('Delete Order {{$product->title}}?'))
                                        document.getElementById({{$product->id}}).submit();
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
                         {{$products->links()}}
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

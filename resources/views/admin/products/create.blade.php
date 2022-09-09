<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.toplinks')

</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('admin.menu')
        <div class="m-5 p-1">
         </div>
        <div class="container mt-5 pt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-6">        
        <div class="card">
            <div class="card-header">Add Product</div>
            <div class="card-body">
                <form action="{{route("products.store")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Title</label>
                        <input name="title" type="text" class="form-control" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Description</label>
                        <textarea  name="description"  class="form-control" placeholder="Description" cols="40" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Price</label>
                        <input name="price" type="number" class="form-control" placeholder="price">
                    </div>    
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Quantite</label>
                        <input name="inStock" type="number" class="form-control" placeholder="Quantite">
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Image</label>
                        <input name="image" type="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Category</label>
                        <select name="category_id" class="form-control">
                               <option value="" selected>Select an category</option>
                               @foreach($categories as $category)
                               <option value="{{$category->id}}">
                                {{$category->title}}
                               </option>
                               @endforeach
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-lg btn-info btn-block">
                            <i class="fa fa-plus fa-lg"></i>
                            <span>Add Product</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
                </div>
            </div>
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

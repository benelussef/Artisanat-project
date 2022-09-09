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
            <div class="card-header">Update Category {{$category->title}}</div>
            <div class="card-body">
                <form action="{{route("categories.update",$category->slug)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Title</label>
                        <input name="title" type="text" class="form-control" placeholder="Title" value="{{$category->title}}">
                    </div>
                    <div class="form-group d-flex justify-content-center">
                        <img src="{{asset($category->image)}}" height="200" width="200">
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Image</label>
                        <input name="image" type="file" class="form-control">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-lg btn-info btn-block">
                            <i class="fa fa-update fa-lg"></i>
                            <span>Update</span>
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

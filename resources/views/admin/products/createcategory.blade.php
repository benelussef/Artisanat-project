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
           <div class="card mt-5 pt-5">
            <div class="card-header ">Add Category</div>
            <div class="card-body mb-5 pt-b">
                <form action="{{route("categories.store")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Title</label>
                        <input name="title" type="text" class="form-control" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Image</label>
                        <input name="image" type="file" class="form-control">
                    </div>
                        <div>
                        <button type="submit" class="btn btn-lg btn-info btn-block">
                            <i class="fa fa-plus fa-lg"></i>
                            <span>Add Category</span>
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

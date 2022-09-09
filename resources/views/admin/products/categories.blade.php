<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.toplinks')

</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('admin.menu')
         <div class="mt-3 p-1">
            @include("layouts.alerts")
         </div>
        <div class="row mt-5 p-5">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                <h3 class="title-5 m-b-35">Categories</h3>
                <div class="table-data__tool">
                    <div class="table-data__tool-right">
                        <a href="{{route("categories.create")}}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>Add Category</a>
                    </div>
                </div>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Category</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr class="tr-shadow">
                                <td><img src="{{asset($category->image)}}" width="60" height="50" class="img-fluid rounded"></td>

                                <td>{{$category->title}}</td>
                                <td>
                                    <div class="table-data-feature">
                                    
                                        <a href="{{ route("categories.edit",$category->slug)}}" class="item" data-toggle="tooltip" data-placement="top" title="update">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <form id="{{$category->id}}" method="POST" action="{{ route("categories.destroy",$category->slug)}}">
                                            @csrf
                                            @method("DELETE")
                                        <button
                                        onclick="event.preventDefault();
                                        if(confirm('Delete Order {{$category->title}}?'))
                                        document.getElementById({{$category->id}}).submit();
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
                         {{$categories->links()}}
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

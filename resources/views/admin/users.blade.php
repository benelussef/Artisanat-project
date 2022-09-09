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
                <h3 class="title-5 m-b-35">Users</h3>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Actived</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr class="tr-shadow">
                                <td>{{$user->name}}</td>
                                <td>
                                    {{$user->email}}
                                </td>
                                <td>{{$user->numberphone}}</td>
                                <td>{{$user->address}}</td>

                                <td>
                                   @if($user->active)
                                   <i class="fa fa-check text-success"></i>
                                   @else
                                   <i class="fa fa-times text-danger"></i>
                                   @endif
                                </td>
                                <td>
                                    <div class="table-data-feature d-flex justify-content-between">
                                        <form id="{{$user->id}}" method="POST" action="{{ route("users.destroy",$user->id)}}">
                                            @csrf
                                            @method("DELETE")
                                        <button
                                        onclick="event.preventDefault();
                                        if(confirm('Delete Order {{$user->name}}?'))
                                        document.getElementById({{$user->id}}).submit();
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
                         {{$users->links()}}
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

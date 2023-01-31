@php
    $id = session('id');
 $role = session('role');
@endphp

@if(!empty($id))



<!doctype html>
<html lang="en">

<head>

    @include('Layout.appStyles')

</head>

<body data-sidebar="dark">

<!-- Begin page -->
<div id="layout-wrapper">


{{--    Header--}}
@include('Layout.header')

{{--    End Header--}}

<!-- Left Sidebar Start  -->
@include('Layout.AdminPortal.admin_sidebar')
<!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Users</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                                    <li class="breadcrumb-item active">User Management</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                   <div class="col-md-3">
                       <button class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                          data-bs-target="#userAddModal">Add User</button>
                   </div>
                </div>
                <br>
                @if(session()->has('message'))
                        <div class="col-md-4">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session()->get('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                        @endif
                        @foreach ($errors->all() as $error)
                        <div class="col-md-4">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $error }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>



                    @endforeach

                <br>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="scrollme">
                                    <table id="datatable-buttons" class="table table-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Role</th>
                                        <th></th>
                                        <th></th>

                                    </tr>
                                    </thead>


                                    <tbody>
                                    @if(!empty($data))
                                        @foreach($data as $item)
                                            @if($item->id != $id)
                                                @if($item->isActive == 1)
                                                <tr>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->email}}</td>
                                                    <td>{{$item->contact}}</td>
                                                    <td>{{$item->role}}</td>
                                                    <td><a href="{{url('disableUser').$item->userId}}" class="btn btn-outline-warning btn-sm waves-effect waves-light">Disable User</a> </td>
                                                    <td><button data-bs-toggle="modal"
                                                                data-bs-target="#resetPassword" data-id="{{$item->userId}}" class="btn btn-outline-danger btn-sm waves-effect waves-light">Reset Password</button> </td>
                                                </tr>
                                                @else
                                                    <tr style="color: red">
                                                        <td>{{$item->name}}</td>
                                                        <td>{{$item->email}}</td>
                                                        <td>{{$item->contact}}</td>
                                                        <td>{{$item->role}}</td>
                                                        <td class="text-danger">Disabled</td>
                                                        <td></td>
                                                    </tr>
                                                    @endif
                                            @endif
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>



            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


{{--        Modals--}}

{{--        Add User modal--}}

        <div id="userAddModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel">Add User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('addUser')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Contact Number</label>
                                <input type="number" class="form-control"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength="10"

                                id="contact" name="contact" required >
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Role</label>
                                   <select name="role" id="role" class="form-select">
                                       <option value="Admin">Admin</option>
                                       <option value="House Keeping Supervisor">House Keeping Supervisor</option>
                                       <option value="FrontOps">Front Ops Operator</option>
                                       <option value="FnB">FnB Operator</option>
                                       <option value="BackOps">Back Ops Operator</option>
                                   </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                    </button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger waves-effect waves-light"
                                data-bs-dismiss="modal">Close</button>

                    </div>

                </div>
            </div>
        </div>

{{--        password reset modal--}}
        <div id="resetPassword" class="modal fade" tabindex="-1" aria-labelledby="resetPassword"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel">Reset Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('resetPassword')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="text" class="form-control" id="id" name="userId" hidden required>

                            <div class="mb-3">
                                <label for="" class="form-label">Enter Password</label>
                                <input type="password" class="form-control" id="pwd" name="pwd" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button"class="btn btn-outline-danger waves-effect waves-light"
                                data-bs-dismiss="modal">Close</button>

                    </div>

                </div>
            </div>
        </div>
{{--        End password reset modal--}}

{{--        End add user modal--}}


{{--        End Modals--}}




        {{--        Footer--}}
        @include('Layout.footer')
        {{--        End Footer--}}
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
@include('Layout.rightSideBar')
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

@include('Layout.appJs')
</body>
<script>
    $('#resetPassword').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget)
        let id = button.data('id')

        let modal = $(this)
        modal.find('.modal-body #id').val(id);
    });

</script>
</html>


@else
    @include('Layout.notValidateUser')
@endif

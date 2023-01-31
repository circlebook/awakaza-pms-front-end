@php
    $id = session('id');
    $role = session('role');
	$name = session('name');
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
                            <h4 class="mb-sm-0 font-size-18">Locators</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Locators</a></li>
                                    <li class="breadcrumb-item active">Locator Management</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                   <div class="col-md-3">
                       <button class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                          data-bs-target="#locatorAddModal">Add Locator</button>
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
                                        <th>Locator ID</th>
                                        <th>Description</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                    @if(!empty($data))
                                        @foreach($data as $item)    
                                                <tr>
                                                    <td>{{$item->locatorId}}</td>
                                                    <td>{{$item->description}}</td>
                                                    <td><button data-bs-toggle="modal"
                                                                data-bs-target="#editLocator" data-id="{{$item->locatorId}}" class="btn btn-outline-warning btn-sm waves-effect waves-light">Edit Locator</button> </td>
                                                    <td><a href="{{url('DeleteLocator').$item->locatorId}}" class="btn btn-outline-danger btn-sm waves-effect waves-light">Delete</a> </td>
                                                </tr>

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

{{--        Add Locator modal--}}

        <div id="locatorAddModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel">Add Locator</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('insertLocator')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="mb-3">
                                <label for="" class="form-label">Locator ID</label>
                                <input type="text" class="form-control" id="InlocatorId" name="InlocatorId" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Description</label>
                                <input type="text" class="form-control" id="InlocatorDescription" name="InlocatorDescription" required>
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

{{--        Locator Edit modal--}}
        <div id="editLocator" class="modal fade" tabindex="-1" aria-labelledby="editLocator"
             aria-hidden="true">
             <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel">Edit Locator</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('editLocator')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="mb-3">
                                <label for="" class="form-label">Locator ID</label>
                                <input type="text" class="form-control" id="EditlocatorId" name="EditlocatorId" value="{{ $item->locatorId }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Description</label>
                                <input type="text" class="form-control" id="EditlocatorDescription" name="EditlocatorDescription" required>
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

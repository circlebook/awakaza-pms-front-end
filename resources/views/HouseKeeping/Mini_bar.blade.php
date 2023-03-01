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
        @include('Layout.HouseKeeping.HouseKeeping_sidebar')
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
                                <h4 class="mb-sm-0 font-size-18">Update Mini Bar</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Update Mini Bar</a>
                                        </li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-md-3">
                            <button class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                                data-bs-target="#itemAddModal">Add
                                Item</button>
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
                                                    <th>Item </th>
                                                    <th>Price</th>
                                                    <th>View details</th>


                                                </tr>
                                            </thead>


                                            <tbody>
                                                @if(!empty($data))
                                                @foreach($data as $item)
                                                <tr>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->price}}</td>
                                                    <td><button data-bs-toggle="modal" data-bs-target="#itemEditModal"
                                                            data-id="{{$item->id}}" data-name="{{$item->name}}"
                                                            data-price="{{$item->price}}"
                                                            class="btn btn-outline-warning btn-sm waves-effect waves-light">Edit
                                                        </button>
                                                    </td>
                                                    <td><a href="{{url('deleteItem').$item->id}}"
                                                            class="btn btn-outline-danger btn-sm waves-effect waves-light">Delete</a>
                                                    </td>
                                                </tr>

                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                <br>
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

    {{--        Add item modal--}}

    <div id="itemAddModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Add Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{url('Mini_bar_itemAdd')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="mb-3">
                            <label for="" class="form-label">Item Name</label>
                            <input type="text" class="form-control" id="minBaritemName" name="minBaritemName" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Price</label>
                            <input type="text" class="form-control" id="minibarPrice" name="minibarPrice" required>
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

    {{--        item Edit modal--}}
    <div id="itemEditModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Edit Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{url('Mini_bar_itemEdit')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="text" class="form-control" id="itemId" name="itemId" hidden required>


                        <div class="mb-3">
                            <label for="" class="form-label">Item Name</label>
                            <input type="text" class="form-control" id="minBaritemName" name="minBaritemName" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Price</label>
                            <input type="text" class="form-control" id="minibarPrice" name="minibarPrice" required>
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
$('#itemEditModal').on('show.bs.modal', function(event) {
    let button = $(event.relatedTarget)
    let id = button.attr('data-id')

    let name = button.attr('data-name')
    let price = button.attr('data-price')


    let modal = $(this)
    modal.find('.modal-body #itemId').val(id);
    modal.find('.modal-body #minBaritemName').val(name);
    modal.find('.modal-body #minibarPrice').val(price);
});
</script>
</html>
@else
@include('Layout.notValidateUser')
@endif
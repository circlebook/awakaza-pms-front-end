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

    <style type="text/css">
        .roomNo{
            background: #556ee6;
            color: white;
            border-radius: 50%;
            width: 3vh;
            height: 3vh;
            align-items: center;
            text-align: center;
            font-size: 2vh;
        }

        .whiteCard{
            

        }

        .labelForm{
            font-weight: bold;
        }

        .FormRows{
            display: flex;
            flex-direction: row;
            justify-content: center;
            
        }


        .FormCols{
            display: flex;
            flex-direction: column;
            
        }

        .tableNameField{
            width: 20%;
        }

        .tableValueFieldItem{
            width: 50%;
        }
    </style>
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
                            <h4 class="mb-sm-0 font-size-18">Rooms</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Rooms</a></li>
                                    <li class="breadcrumb-item active">Room Management</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                   <div class="col-md-3">
                       <button class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                          data-bs-target="#roomAddModal">Add Room</button>
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
                                        <th class="align-middle">Room No</th>
                                        <th class="align-middle">Rating</th>
                                        <th class="align-middle">Clean State</th>
                                        <th class="align-middle"></th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                    @if(!empty($data))
                                        @foreach($data as $item)    
                                                <tr>
                                                    <td class="text-body fw-bold"><div class="roomNo">{{$item->roomNo}}</div></td>
                                                    <td>
                                                    @for ($i = 0; $i < $item->roomTypeId; $i++)
                                                        <i class="bx bx-star"></i>
                                                    @endfor
                                                    </td>
                                                    <td>
                                                        @if($item->cleanState == "clean")
                                                        <span class="badge badge-pill badge-soft-success font-size-11">clean</span>
                                                        @else
                                                        <span class="badge badge-pill badge-soft-danger font-size-11">dirty</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                    <button id="{{$item->roomNo}}" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#viewRoomDetailsModal" 
                                                     data-cleanState="{{$item->cleanState}}"
                                                     data-roomTypeId="{{$item->roomTypeId}}"
                                                     data-airConditioning="{{$item->airConditioning}}" 
                                                     data-miniBar="{{$item->miniBar}}"
                                                     data-bedType="{{$item->bedType}}"
                                                     >View Details</button>   </td>
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

{{--        Add Room modal--}}

<div id="roomAddModal" class="modal fade" tabindex="-1" aria-labelledby="roomAddModal"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel">Add Room</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('addRoom')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="mb-3">
                                <label for="" class="form-label">Room Type</label>
                                <select name="InRoomType" id="InRoomType" class="form-select">
                                @if(!empty($roomTypes))
                                        @foreach($roomTypes as $item)                    
                                        <option value="{{$item->id}}">{{$item->id}} rated</option>                   
                                    @endforeach
                                @endif
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Air Conditioning</label>
                                <select name="InAir" id="InAir" class="form-select">   
                                        <option value="1" selected>yes</option>
                                        <option value="0">no</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Bed Type</label>
                                <select name="bedType" id="bedType" class="form-select">   
                                        <option value="double" selected>double</option>
                                        <option value="single">single</option>
                                        <option value="queen">queen</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">mini Bar</label>
                                <select name="miniBar" id="miniBar" class="form-select">   
                                        <option value="1" selected>yes</option>
                                        <option value="0">no</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Clean State</label>
                                <select name="cleanState" id="cleanState" class="form-select">   
                                        <option value="dirty" selected>dirty</option>
                                        <option value="clean">clean</option>
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

{{--  Room details modal--}}
<div id="viewRoomDetailsModal" class="modal fade" tabindex="-1" aria-labelledby="viewRoomDetailsModal"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="roomNo" class="roomNo"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('editRoom')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="mb-3">
                                <input type="text" class="form-control" id="roomNo" name="roomNo" hidden required>
                                <label for="" class="form-label">Room Type</label>
                                <select name="InRoomType" id="InRoomType" class="form-select">
                                @if(!empty($roomTypes))
                                        @foreach($roomTypes as $item)                    
                                        <option value="{{$item->id}}">{{$item->id}} rated</option>                   
                                    @endforeach
                                @endif
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Air Conditioning</label>
                                <select name="InAir" id="InAir" class="form-select">   
                                        <option value="1" selected>yes</option>
                                        <option value="0">no</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Bed Type</label>
                                <select name="bedType" id="bedType" class="form-select">   
                                        <option value="double" selected>double</option>
                                        <option value="single">single</option>
                                        <option value="queen">queen</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">mini Bar</label>
                                <select name="miniBar" id="miniBar" class="form-select">   
                                        <option value="1" selected>yes</option>
                                        <option value="0">no</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Clean State</label>
                                <select name="cleanState" id="cleanState" class="form-select">   
                                        <option value="dirty" selected>dirty</option>
                                        <option value="clean">clean</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Update
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
{{--        End Room Details modal--}}

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
    $('#viewRoomDetailsModal').on('show.bs.modal', function (event) {
        
        let button = $(event.relatedTarget)
        let roomNo = button.attr('id')
        let cleanState = button.attr('data-cleanState')
        let roomTypeId = button.attr('data-roomTypeId')
        let bedType = button.attr('data-bedType')
        let miniBar = button.attr('data-miniBar')
        let airConditioning = button.attr('data-airConditioning')
        


        let modal = $(this); 
        modal.find('.modal-title').text("Room No: ".concat(String(roomNo)));
        modal.find('.modal-body #roomNo').val(roomNo);
        modal.find('.modal-body #InRoomType option[value='+roomTypeId+']').attr('selected', true);
        modal.find('.modal-body #bedType option[value='+bedType+']').attr('selected', true);
        modal.find('.modal-body #miniBar').val(miniBar);
        modal.find('.modal-body #InAir').val(airConditioning);
        modal.find('.modal-body #cleanState option[value='+cleanState+']').attr('selected', true);
        
    });
    

    

</script>
</html>
@else
    @include('Layout.notValidateUser')
@endif

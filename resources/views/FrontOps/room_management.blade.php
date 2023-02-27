<!DOCTYPE html>
<html lang="en">
<head>
    @include('Layout.appStyles')



</head>
<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        {{--    Header--}}
        @include('Layout.header')
        <!-- ========== Left Sidebar Start ========== -->
        @include('Layout.FrontOps.FrontOps_sidebar')
        <!-- Left Sidebar End -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <!-- 

                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header"> -->
                    <h5 class="modal-title mt-0" id="myModalLabel">ROOM MANAGEMENT</h5>

                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data">
                        {{csrf_field()}}


                        <div class="mb-3">
                            <label for="" class="form-label">Select Type</label>
                            <select name="role" id="role" class="form-select">
                                <option value="Admin">same</option>
                                <option value="House Keeping Supervisor">upper</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Current room</label>
                            <input type="text" class="form-control" id="InlocatorId" name="InlocatorId" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">New room</label>
                            <input type="text" class="form-control" id="InlocatorDescription"
                                name="InlocatorDescription" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Reason</label>
                            <select name="role" id="role" class="form-select">
                                <option selected>Select/Add Reason</option>

                                <option value="Admin">Reason 1</option>
                                <option value="House Keeping Supervisor">Reason 2</option>

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


    </form>
    </div>
    </div>
    </div>
    </div>
</body>
</html>
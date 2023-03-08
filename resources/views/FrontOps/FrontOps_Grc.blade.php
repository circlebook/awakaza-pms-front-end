<!DOCTYPE html>
<html lang="en">
<head>
@include('Layout.appStyles')

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->

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
<!--<section class="pt-5 col-4 " style="margin-top:3%; ">-

<!added by geethaka -->
         
<!-- geethaka end -->

<div class="main-content">

  <div class="page-content">
      <div class="container-fluid">

<div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Guests</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Guest Registration</a></li>
                                    <li class="breadcrumb-item active">GRC Management</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                   <div class="col-md-3">
                       <button class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                          data-bs-target="#createGRCModal">Create GRC</button>
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

         <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="scrollme">
                                    <table id="datatable-buttons" class="table table-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>NIC no</th>
                                        <th>E-Mail</th>
                                        <th></th>
                                        <th></th>

                                    </tr>
                                    </thead>


                                    <tbody>
                                    
                                    @if(!empty($data))
                                        @foreach($data as $item)
                                            
                                                
                                                <tr>
                                                    <td>{{$item->firstName}}</td>
                                                    <td>{{$item->lastName}}</td>
                                                    <td>{{$item->NIC}}</td>
                                                    <td>{{$item->email}}</td>
                                                    <td><button id="{{$item->id}}" class="btn btn-outline-warning btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#editGRCModal" 
                                                        data-firstName="{{$item->firstName}}"
                                                        data-lastName="{{$item->lastName}}"
                                                        data-passportNo="{{$item->passportNo}}" 
                                                        data-nicNo="{{$item->NIC}}"
                                                        data-birthDay="{{$item->DOB}}"
                                                        data-phoneNo="{{$item->contactNo}}"
                                                        data-email="{{$item->email}}"
                                                        {{-- data-arrivalD="{{$item->arrivalD}}"
                                                        data-departureD="{{$item->departureD}}" --}}
                                                        
                                                        >Edit Details</button> </td>
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

              <div id="createGRCModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
                aria-hidden="true">
               <div class="modal-dialog">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 class="modal-title mt-0" id="myModalLabel">Create GRC</h5>
                           <button type="button" class="btn-close" data-bs-dismiss="modal"
                                   aria-label="Close"></button>
                       </div>
                       <div class="modal-body">
                           <form action="{{url('createGrc')}}" method="post" enctype="multipart/form-data">
                               {{csrf_field()}}
                               <div class="mb-3">
                                   <label for="" class="form-label">first Name</label>
                                   <input type="text" class="form-control" id="firstName" name="firstName" required>
                               </div>
                               <div class="mb-3">
                                   <label for="" class="form-label">Last Name</label>
                                   <input type="text" class="form-control" id="lastName" name="lastName" required>
                               </div>
                               <div class="mb-3">
                                <label for="" class="form-label">Passport Number</label>
                                <input type="text" class="form-control" id="passportNo" name="passportNo" required>
                              </div>

        

                              <div class="mb-3">
                                <label for="" class="form-label">NIC Number</label>
                                <input type="text" class="form-control" id="nicNo" name="nicNo" required>
                              </div>
                              
                              <div class="mb-3">
                                <label for="" class="form-label">Birthday</label>
                                <input type="date" class="form-control" id="birthDay" name="birthDay" required>
                              </div>


                                <div class="mb-3">
                                   <label for="" class="form-label">Contact Number</label>
                                   <input type="number" class="form-control"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength="10"

                                   id="phoneNo" name="phoneNo" required >
                               </div>

                               <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                              </div>


                               {{-- <div class="mb-3">
                                   <label for="" class="form-label">Arrival date</label>
                                   <input type="date" class="form-control" id="arrivalD" name="arrivalD" required>
                               </div>

                               <div class="mb-3">
                                <label for="" class="form-label">Departure date</label>
                                <input type="date" class="form-control" id="departureD" name="departureD" required>
                              </div> --}}

                              
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

           <div id="editGRCModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
                aria-hidden="true">
               <div class="modal-dialog">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 class="modal-title mt-0" id="myModalLabel">Edit GRC</h5>
                           <button type="button" class="btn-close" data-bs-dismiss="modal"
                                   aria-label="Close"></button>
                       </div>
                       <div class="modal-body">
                           <form action="{{url('editGRC')}}" method="post" enctype="multipart/form-data">
                               {{csrf_field()}}
                               <input type="text" class="form-control" id="id" name="id" required hidden>
                               <div class="mb-3">
                                   <label for="" class="form-label">first Name</label>
                                   <input type="text" class="form-control" id="firstName" name="firstName" required>
                               </div>
                               <div class="mb-3">
                                   <label for="" class="form-label">Last Name</label>
                                   <input type="text" class="form-control" id="lastName" name="lastName" required>
                               </div>
                               <div class="mb-3">
                                <label for="" class="form-label">Passport Number</label>
                                <input type="text" class="form-control" id="passportNo" name="passportNo" required>
                              </div>

        

                              <div class="mb-3">
                                <label for="" class="form-label">NIC Number</label>
                                <input type="text" class="form-control" id="nicNo" name="nicNo" required>
                              </div>
                              
                              <div class="mb-3">
                                <label for="" class="form-label">Birthday</label>
                                <input type="date" class="form-control" id="birthDay" name="birthDay" required>
                              </div>


                                <div class="mb-3">
                                   <label for="" class="form-label">Contact Number</label>
                                   <input type="number" class="form-control"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength="10"

                                   id="phoneNo" name="phoneNo" required >
                               </div>

                               <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                              </div>


                               {{-- <div class="mb-3">
                                   <label for="" class="form-label">Arrival date</label>
                                   <input type="date" class="form-control" id="arrivalD" name="arrivalD" required>
                               </div>

                               <div class="mb-3">
                                <label for="" class="form-label">Departure date</label>
                                <input type="date" class="form-control" id="departureD" name="departureD" required>
                              </div> --}}

                              
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
           @include('Layout.footer')
                

          </div>
        </div>
      </div>

@include('Layout.appJs')


</body>


<script>
    $('#editGRCModal').on('show.bs.modal', function (event) {
        
        let button = $(event.relatedTarget)
        let id = button.attr('id')
        let firstName = button.attr('data-firstName')
        let lastName = button.attr('data-lastName')
        let passportNo = button.attr('data-passportNo')
        let nicNo = button.attr('data-nicNo')
        let birthDay = button.attr('data-birthDay')
        let phoneNo = button.attr('data-phoneNo')
        let email = button.attr('data-email')
        // let arrivalD = button.attr('data-arrivalD')
        // let departureD = button.attr('data-departureD')

        let modal = $(this); 
        modal.find('.modal-title').text("GRCid: ".concat(String(id)));
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #firstName').val(firstName);
        modal.find('.modal-body #lastName').val(lastName);
        modal.find('.modal-body #passportNo').val(passportNo);
        modal.find('.modal-body #nicNo').val(nicNo);
        modal.find('.modal-body #birthDay').val(birthDay);
        modal.find('.modal-body #phoneNo').val(phoneNo);
        modal.find('.modal-body #email').val(email);
        // modal.find('.modal-body #arrivalD').val(arrivalD);
        // modal.find('.modal-body #departureD').val(departureD);
        
    });
    
    
</script>

</html>
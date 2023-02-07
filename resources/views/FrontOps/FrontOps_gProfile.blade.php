<!DOCTYPE html>
<html lang="en">
<head>
@include('Layout.appStyles')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

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
<section class="pt-5 col-4 container" style="margin-top:3%;">



<form class="shadow rounded" style="margin-top:10%; background-image: linear-gradient(to right, rgb(230,230,250) , rgb(176,196,222));" action="{{url('createGprofile')}}" method="post">
{{csrf_field()}}
<h4 class="text-center pt-3 mb-3">Create Guest Profile</h4>
<div class="container">

<div class="row mb-3 px-3">
<label for="name" class="form-label">Personal details</label>
  <div class="col">
    <input type="text" name="Occupation" id="Occupation" class="form-control" placeholder="Enter Occupation" aria-label="Occupation">
  </div>
  <div class="col">
    <input type="text" name="Comapany" id="Company" class="form-control" placeholder="Enter Company" aria-label="Company">
  </div>
</div>


<div class="row mb-3 px-3">
  <div class="col">
    <input type="date" name="birthDay" id="birthDay" class="form-control" placeholder="Enter Date of Birth" aria-label="Date of birth*">
  </div>
</div>  

<div class="row mb-3 px-3">
<label for="name" class="form-label">Contact Details</label>
  <div class="col">
    <input type="text" name="phoneNo" id="phoneNo" class="form-control" placeholder="Enter Phone Number" aria-label="Phone Number*">
  </div>
  <div class="col">
    <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email Address" aria-label="Email Address*">
  </div>
</div>

<div class="row mb-3 px-3">
<label for="name" class="form-label">Visiting information</label>
  <div class="col">
    <input type="date" name="arrivalD" id="arrivalD" class="form-control" placeholder="Enter arrival Date" aria-label="Arrival Date*">
  </div>
  <div class="col">
    <input type="date" name="departureD" id="departureD" class="form-control" placeholder="Enter Departure Date" aria-label="Departure Date*">
  </div>
</div>

</div>
  <div class="mt-5 pb-3 px-3">
  <button type="submit" class="btn btn-primary">Confirm</button>
</div>

</div>
</div>
</form>
</section> 
</body>
</html>
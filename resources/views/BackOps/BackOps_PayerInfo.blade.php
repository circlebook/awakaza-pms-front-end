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
@include('Layout.BackOps.BackOps_sidebar')
<!-- Left Sidebar End -->
<section class="pt-5 col-4 container" style="margin-top:3%;">

<form class="shadow rounded" style="margin-top:10%; background-image: linear-gradient(to right, rgb(230,230,250) , rgb(176,196,222));">
<h4 class="text-center pt-3 mb-3">Payer Information</h4>
<div class="container">

<div class="row mb-3 px-3">
<label for="name" class="form-label">Name</label>
  <div class="col">
    <input type="text" class="form-control" placeholder="First name" aria-label="First name">
  </div>
  <div class="col">
    <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
  </div>
</div>
 <div class="mb-3 px-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name@example.com">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="form-group mb-3 px-3">
  <label class="col-md-4 control-label">Phone #</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="phone" placeholder="(011)555-1212" class="form-control" type="text">
    </div>
  </div>
</div>
<div class="col-12 mb-3 px-3">
    <label for="inputAddress" class="form-label">Home Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St, Colombo-03">
  </div>
<fieldset class="row mb-3 px-3">
<label class="col-md-6">Do you wish to pay advance?</label>  
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
        <label class="form-check-label fw-light fst-italic" for="gridRadios1">
          Yes
        </label>
      </div>

      <div class="mb-3 form-check">
        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
        <label class="form-check-label fw-light fst-italic" for="gridRadios2">
          No
        </label>
      </div>
      </fieldset>
      <div class="mb-3 col-md-6 px-3">
    <label for="amount" class="form-label">Enter advance amount</label>
    <input type="text" class="form-control" placeholder="LKR 20,000">
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
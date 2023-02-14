<!DOCTYPE html>
<html lang="en">
<head>
@include('Layout.appStyles')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap/bootstrap-dropdown.js"></script>
<script>
     $(document).ready(function(){
        $('.dropdownMenuButton').dropdown()
    });
</script>
</head>
<body data-sidebar="dark">

<!-- <body data-layout="horizontal" data-topbar="dark"> -->

<!-- Begin page -->
<div id="layout-wrapper">
{{--    Header--}}
@include('Layout.header')

{{--    End Header--}}
        <!-- ========== Left Sidebar Start ========== -->
@include('Layout.BackOps.BackOps_sidebar')
<!-- Left Sidebar End -->

<div class="main-content">

<div class="page-content">
    <div class="container-fluid">

<h1>Confirmed</h1>
<form style="background-image: linear-gradient(to right, rgb(230,230,250) , rgb(176,196,222));">
<div class="row">
  <!--Room Type-->
    <div class="col-3">
  <select class="form-select" aria-label="Default select example">
  <option selected>Room Type</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
  </div>
  <!--Date Range-->
<div class="col-3">
<select class="form-select" aria-label="Default select example">
  <option selected>Date Range</option>
  <!-- <div class="input-group">
   <input class="form-control py-2 border-right-0 border" type="date">
   <span class="input-group-append ml-n1">
     <div class="input-group-text bg-transparent"><i class="fa fa-calendar-alt"></i></div>
   </span>
</div>
</div>

<div class="col-6">
<div class="input-group">
   <input class="form-control py-2 border-right-0 border" type="date">
   <span class="input-group-append ml-n1">
     <div class="input-group-text bg-transparent"><i class="fa fa-calendar-alt"></i></div>
   </span>
</div>
</div>
</div> -->
</div>
</div>
</form>
</div>
</div>

</div>
<!-- JAVASCRIPT -->
@include('Layout.appJs')
</body>

</html>
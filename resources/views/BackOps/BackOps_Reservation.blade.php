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
<section class="pt-1 pb-3 col-4 container" style="margin-top:3%;">




</section> 
</body>
</html>
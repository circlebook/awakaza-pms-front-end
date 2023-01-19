<!DOCTYPE html>
<!-- Author: Geethaka -->
@php
    $id = session('id');
 $role = session('role');
@endphp

@if(!empty($id))

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Awakaza Main DashBoard</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	@include('Layout.appStyles')

	<style type="text/css">
		.btn {
		  background-color: #ddd;
		  border: none;
		  color: black;
		  padding: 16px 32px;
		  text-align: center;
		  font-size: 16px;
		  margin: 4px 2px;
		  transition: 0.3s;
		  height: 20vh;
		  display: flex;
		  flex-direction: column;
		  justify-content: center;
		  font-size: 3vh;


		}

		.btn-denied {
		  background-color: #ddd;
		  border: none;
		  color: black;
		  padding: 16px 32px;
		  text-align: center;
		  font-size: 16px;
		  margin: 4px 2px;
		  transition: 0.3s;
		  height: 20vh;
		  display: flex;
		  flex-direction: column;
		  justify-content: center;
		  font-size: 3vh;
		  


		}

		.btn:hover {
		  background-color: #39468C;
		  color: white;
		}

		.btn-denied:hover {
		  background-color: #ff5050;
		  color: white;
		}

		.flex-container-column{
			display: flex;
			flex-direction: column;
			height: 100vh;
			justify-content: center;
		}

		.flex-container-row{
			display: flex;
			flex-direction: row;
			justify-content: center;
		}

		.flex-container-row-rv{
			display: flex;
			flex-direction: row;
			justify-content: flex-end;
			
		}



	</style>
	
</head>
<body>

	<!-- Header -->
	<div class=" container-fluid" style="height: 5vh; box-shadow: 10px; background-color: white;">
		<div class="flex-container-row-rv pr-5">
		<img class="rounded-circle header-profile-user mr-2" src="assets/images/users/avatar-1.png" alt="Header Avatar">
			<h5 class="my-2">
				<span class="d-none d-xl-inline-block ms-1 mr-5" key="t-henry">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
				<a class="text-danger" href="{{url('logout')}}"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
			</h5>
		</div>
	</div>
	<!-- Header end -->

	<div class="container-fluid" style="background-color:white; height: 95vh;">
		
		<div class="flex-container-column">
		<div class="row">
			<div class="col-12"><div class="flex-container-row"><h1 style="font-size: 8vh;">Hotel Management System</h1></div></div>
		</div>
		<!-- First Row-->
		<div class="row" style="margin:10vh;">
			<div class="col-3">
				<!-- blank -->
			</div>

			<div class="col-2">
			@if($role == 'Admin')
				<a href="{{ url('Admin_dashboard') }}" class="btn m-2"><div style="margin: 2rem;">Admin Portal</div></a>
			@else
				<a href="" class="btn-denied m-2" data-toggle="modal" data-target="#accessDeniedPopUp"><div style="margin: 2rem;">Admin Portal</div></a>
			@endif
			</div>
			<div class="col-2">
			@if($role == 'Admin' || $role == 'FrontOps')
				<a href="{{ url('FrontOps_dashboard') }}" class="btn m-2"><div style="margin: 2rem;">Front Ops</div></a>
			@else
				<a href="" class="btn-denied m-2" data-toggle="modal" data-target="#accessDeniedPopUp"><div style="margin: 2rem;">Front Ops</div></a>
			@endif
			</div>
			<div class="col-2">
			@if($role == 'Admin' || $role == 'BackOps')
				<a href="{{ url('BackOps_dashboard') }}" class="btn m-2"><div style="margin: 2rem;">Back Ops</div></a>
			@else
				<a href="" class="btn-denied m-2" data-toggle="modal" data-target="#accessDeniedPopUp"><div style="margin: 2rem;">Back Ops</div></a>
			@endif
			</div>

			<div class="col-3">
				<!-- blank -->
			</div>

		</div>
			<!-- First Row End-->

			<!-- Second Row-->
			<div class="row">
			<div class="col-4">
				<!-- blank -->
			</div>

			<div class="col-2">
			@if($role == 'Admin' || $role == 'House Keeping Supervisor')
				<a href="{{ url('HouseKeeping_dashboard') }}" class="btn m-2"><div style="margin: 2rem;">House Keeping</div></a>
			@else
				<a href="" class="btn-denied m-2" data-toggle="modal" data-target="#accessDeniedPopUp"><div style="margin: 2rem;">House Keeping</div></a>
			@endif

			</div>
			<div class="col-2">
			@if($role == 'Admin' || $role == 'FnB')
				<a href="{{ url('Billing_dashboard') }}" class="btn m-2"><div style="margin: 2rem;">Billing</div></a>
			@else
				<a href="" class="btn-denied m-2" data-toggle="modal" data-target="#accessDeniedPopUp"><div style="margin: 2rem;">Billing</div></a>
			@endif
			</div>

			<div class="col-4">
				<!-- blank -->
			</div>
		</div>
			<!-- Second Row End-->			
		</div>
	</div>
	</div>

	<!-- Access Denied Popup start -->
	<div class="modal fade" id="accessDeniedPopUp" tabindex="-1" role="dialog" aria-labelledby="accessDeniedPopUpLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="accessDeniedPopUpLabel">Access Denied</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Sorry.. You don't have the permissions needed to access this page.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn-secondary px-3 py-1" style="border-radius: 10%;" data-dismiss="modal"><span>Close</span></button>
      </div>
    </div>
  </div>
</div>
	<!-- Access Denied Popup End-->



	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>


@else
    @include('Layout.notValidateUser')
@endif
<!DOCTYPE html>
<!-- Author: Geethaka -->
@php
    $id = session('id');
 	$role = session('role');
	$name = session('name');
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
		  transition-property: background-color, transform;
		  transition: 0.3s, 15s;
		  height: 20vh;
		  display: flex;
		  flex-direction: column;
		  justify-content: center;
		  font-size: 3vh;
		  


		}

		.btn:hover {
		  background-color: #39468C;
		  color: white;
		  box-shadow: 10px 10px #669999;
		  
		 
		}

		.btn-denied:hover {
		  background-color: #ff5050;
		  color: white;
		  box-shadow: 10px 10px #669999;
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

		.flex-container-row-left{
			display: flex;
			flex-direction: row;
			justify-content: left;
			
		}

		.flex-container-row-rv{
			display: flex;
			flex-direction: row;
			justify-content: flex-end;
			
		}


		.flex-container-row-opposite{
			display: flex;
			flex-direction: row;
			justify-content: space-between;
			
		}

		.hero{
			width: 100%;
			height: 100vh;
			background-image: url('assets/images/mainDash/background.jpeg');
			background-size: cover;
			background-position: center;
			postition: relative;
			overflow: hidden;
			
		}

		.hero_color{
			width: 100%;
			height: 100vh;
			background-color: #ffffb3;
			background-size: cover;
			background-position: center;
			postition: relative;
			overflow: hidden;

		}

		@keyframes ColorChange {
			0%   {color: #3333ff;}
			
			50%  {color: #39468C;}
			100% {color: #3333ff;}
			}
		
		.heading{
			color: #39468C;
			text-shadow: 1px 1px #999966;
		}

		.cardImage{
			height: 20vh;
			width: 20vh;

		}

		.card_style{
			background-color: white;

		}

		.cardTitle{
			font-size: 3vh;
			color: #39468C;
		}

		.card{
			transition: 0.3s;
			box-shadow: 3px 3px 3px 3px #999966;
			height: 40vh;
			margin-top: 2vh;
			border-radius: 2em;
			overflow: hidden;
 			
		}

		.cardAnimationSet1{
			animation: MoveUpDown 3s linear infinite;
			animation-delay: 1s;
		}

		.cardAnimationSet2{
			animation: MoveUpDown 3s linear infinite;
			animation-delay: 2s;
		}

		.card:hover{
			box-shadow: 10px 10px #669999;
		}

		@keyframes MoveUpDown {
			0%, 100% {
				transform: translateY(0);
			}
			50% {
				transform: translateY(-5px);
		}
	}
	</style>
	
</head>
<body>
	<div class="hero">
	<!-- Header -->
	<div class=" container-fluid" style="height: 0.5vh; box-shadow: 10px;">
		<div class="flex-container-row-opposite pr-5">
			<div class="container-fluid"><div class="flex-container-row-left"><h1 style="font-size: 3vh;" class="heading">Hotel Management System</h1></div></div>
			<div class="container">
			<div class="flex-container-row-rv">
				<img class="rounded-circle header-profile-user mr-2" src="assets/images/users/avatar-1.png" alt="Header Avatar">
				<h5 class="my-2">
					<span class="d-none d-xl-inline-block ms-1 mr-5" key="t-henry">{{ $name }}</span>
					<a class="text-danger" href="{{url('logout')}}"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
				</h5>
			</div>
			</div>
		</div>
	</div>
	<!-- Header end -->

	<div class="container-fluid"  height: 95vh;">
		
		<div class="flex-container-column">
		
		<!-- First Row-->
		<div class="row" style="margin:1vh;">
			<div class="col-3">
				<!-- blank -->
			</div>

			<div class="col-2">
					@if($role == 'Admin')
					<a href="{{ url('Admin_dashboard') }}">
					@else
					<a href="" data-toggle="modal" data-target="#accessDeniedPopUp">
					@endif
					<div class="card p-0 card_style cardAnimationSet1">
						<center><img class="card-img-top" src="assets/images/mainDash/admin.jpg" alt="Card image cap"></center>
						<div class="card-body">
						<center><h1 class="card-title cardTitle">Admin Portal</h1></center>
						</div>
					</div>
					</a>
					
			</div>
			<div class="col-2">
			@if($role == 'Admin' || $role == 'FrontOps')
					<a href="{{ url('FrontOps_dashboard') }}">
			@else
					<a href="" data-toggle="modal" data-target="#accessDeniedPopUp">
			@endif
					<div class="card p-0 card_style cardAnimationSet2">
						<center><img class="card-img-top" src="assets/images/mainDash/frontOps.jpg" alt="Card image cap"></center>
						<div class="card-body">
						<center><h1 class="card-title cardTitle">Front Ops</h1></center>
						</div>
					</div>
					</a>
			</div>
			<div class="col-2">
			@if($role == 'Admin' || $role == 'BackOps')
			<a href="{{ url('BackOps_dashboard') }}">
			@else
			<a href="" data-toggle="modal" data-target="#accessDeniedPopUp">
			@endif
					<div class="card p-0 card_style cardAnimationSet1">
						<center><img class="card-img-top" src="assets/images/mainDash/backOps2.jpg" alt="Card image cap"></center>
						<div class="card-body">
						<center><h1 class="card-title cardTitle">BackOps</h1></center>
						</div>
					</div>
			</a>
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
				<a href="{{ url('HouseKeeping_dashboard') }}">
			@else
					<a href="" data-toggle="modal" data-target="#accessDeniedPopUp">
			@endif
					<div class="card p-0 card_style cardAnimationSet2">
						<center><img class="card-img-top" src="assets/images/mainDash/houseKeeping.jpg" alt="Card image cap"></center>
						<div class="card-body">
						<center><h1 class="card-title cardTitle">HouseKeeping</h1></center>
						</div>
					</div>
			</a>

			</div>
			<div class="col-2">
			@if($role == 'Admin' || $role == 'FnB')
				<a href="{{ url('Billing_dashboard') }}">
			@else
				<a href="" data-toggle="modal" data-target="#accessDeniedPopUp">
			@endif
					<div class="card p-0 card_style cardAnimationSet1">
						<center><img class="card-img-top " src="assets/images/mainDash/bill.jpg" alt="Card image cap" style="height: 31vh;"></center>
						<div class="card-body">
						<center><h1 class="card-title cardTitle">Billing</h1></center>
						</div>
					</div>
			</a>
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


	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
</body>
</html>


@else
    @include('Layout.notValidateUser')
@endif
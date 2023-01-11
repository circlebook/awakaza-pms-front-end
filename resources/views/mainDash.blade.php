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

		.btn:hover {
		  background-color: #39468C;
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
	<div class="flex-container-row-rv" style="height: 0vh">
		
	</div>
	<!-- Header end -->

	<div class="container-fluid" style="background-color:white; height: 100vh;">
		
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
				
				<a href="{{ route('adminPortal') }}" class="btn m-2"><div style="margin: 2rem;">Admin Portal</div></a>

			</div>
			<div class="col-2">
				<a href="https://google.com" class="btn m-2"><div style="margin: 2rem;">Front Ops</div></a>
			</div>
			<div class="col-2">
				<a href="https://google.com" class="btn m-2"><div style="margin: 2rem;">Back Ops</div></a>
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
				
				<a href="https://google.com" class="btn m-2"><div style="margin: 2rem;">House Keeping</div></a>

			</div>
			<div class="col-2">
				<a href="https://google.com" class="btn m-2"><div style="margin: 2rem;">Billing</div></a>
			</div>

			<div class="col-4">
				<!-- blank -->
			</div>
		</div>
			<!-- Second Row End-->			
		</div>
	</div>
	</div>



	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>


@else
    @include('Layout.notValidateUser')
@endif
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

<section class="pt-1 pb-3 col-8 container" style="margin-top:5%;">
    
<!-- <div class="container">
  <h2>Meal Plans</h2>
  <div class="row">
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Bed and Breakfast</h5>
          <p class="card-text">Price: $50</p>
          <button class="btn btn-primary select-plan" data-plan="BB">Select</button>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Half Board</h5>
          <p class="card-text">Price: $80</p>
          <button class="btn btn-primary select-plan" data-plan="HB">Select</button>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Full Board</h5>
          <p class="card-text">Price: $100</p>
          <button class="btn btn-primary select-plan" data-plan="FB">Select</button>
        </div>
      </div>
    </div>
  </div>
  <div id="selected-plan"></div>
</div>


<div class="container">
  <h2>Meal Plans</h2>
  <div class="row">
    <div class="col-sm-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Day</th>
            <th>Bed and Breakfast</th>
            <th>Half Board</th>
            <th>Full Board</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td><input type="radio" name="day1" value="BB"></td>
            <td><input type="radio" name="day1" value="HB"></td>
            <td><input type="radio" name="day1" value="FB"></td>
          </tr>
          <tr>
            <td>2</td>
            <td><input type="radio" name="day2" value="BB"></td>
            <td><input type="radio" name="day2" value="HB"></td>
            <td><input type="radio" name="day2" value="FB"></td>
          </tr>
          <tr>
            <td>3</td>
            <td><input type="radio" name="day3" value="BB"></td>
            <td><input type="radio" name="day3" value="HB"></td>
            <td><input type="radio" name="day3" value="FB"></td>
          </tr>
         Add additional rows for more days 
        </tbody>
      </table>
    </div>
  </div>
  <div id="selected-plan"></div>
  <button class="btn btn-primary" id="submit-plan">Submit</button>
</div> -->

<div class="container">
  <h2>Meal Plans</h2>
  <div class="row">
    <div class="col-sm-12">
      <table class="table table-bordered" id="meal-plan-table">
        <thead>
          <tr>
            <th>Day</th>
            <th>Bed and Breakfast</th>
            <th>Half Board</th>
            <th>Full Board</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td><input type="radio" name="day1" value="BB"></td>
            <td><input type="radio" name="day1" value="HB"></td>
            <td><input type="radio" name="day1" value="FB"></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div id="selected-plan"></div>
  <button class="btn btn-primary" id="add-day">Add Day</button>
  <button class="btn btn-primary" id="submit-plan">Submit</button>
</div>

</section>
</body>
</html>
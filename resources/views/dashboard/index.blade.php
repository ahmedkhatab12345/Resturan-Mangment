@extends('layouts.dashboard.app')
@section('content') 
<div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
<div class="container-fluid">
<div class="row g-3 mb-3 align-items-center">
<div class="col">
<ol class="breadcrumb bg-transparent mb-0">
<li class="breadcrumb-item"><a class="text-secondary" href="index.html">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
</ol>
</div>
</div> 
<div class="row align-items-center">
<div class="col">
<h1 class="fs-5 color-900 mt-1 mb-0">Welcome back, Allie!</h1>
<small class="text-muted">You have 12 new messages and 7 new notifications.</small>
</div>
<div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-12 mt-2 mt-md-0">

<div class="input-group">
<input class="form-control" type="text" name="daterange">
<button class="btn btn-secondary" type="button" data-bs-toggle="tooltip" title="Send Report"><i class="fa fa-envelope"></i></button>
<button class="btn btn-secondary" type="button" data-bs-toggle="tooltip" title="Download Reports"><i class="fa fa-download"></i></button>
<button class="btn btn-secondary" type="button" data-bs-toggle="tooltip" title="Generate PDF"><i class="fa fa-file-pdf-o"></i></button>
<button class="btn btn-secondary" type="button" data-bs-toggle="tooltip" title="Share Dashboard"><i class="fa fa-share-alt"></i></button>
</div>

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{url('/')}}/dashboard/assets/js/bundle/daterangepicker.bundle.js"></script>

<script>
              // date range picker
              $(function() {
                $('input[name="daterange"]').daterangepicker({
                  opens: 'left'
                }, function(start, end, label) {
                  console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                });
              })
            </script>
</div>
</div> 
</div>
</div>

<div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
<div class="container-fluid">
<div class="row row-cols-xxl-4 row-cols-xl-2 row-cols-lg-4 row-cols-md-2 row-cols-sm-2 row-cols-1 g-xl-3 g-2 mb-3">
<div class="col">
<div class="card">
<div class="card-body d-flex align-items-start">
<div class="avatar rounded no-thumbnail">
<i class="fa fa-shopping-basket fa-lg"></i>
</div>
<div class="flex-fill ms-3">
<div class="fw-bold"><span class="h4 mb-0">401</span><span class="text-success ms-1">2.55% <i class="fa fa-caret-up"></i></span></div>
<div class="text-muted small">Total Orders</div>
<div class="mt-3">
<label class="small d-flex justify-content-between">This Week<span class="fw-bold">248</span></label>
<div class="progress mt-1" style="height: 6px;">
<div class="progress-bar bg-primary" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 87%;"></div>
</div>
</div>
<div class="mt-2">
<label class="small d-flex justify-content-between">Last Week<span class="fw-bold">148</span></label>
<div class="progress mt-1" style="height: 6px;">
<div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="44" aria-valuemin="0" aria-valuemax="100" style="width: 44%;"></div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col">
<div class="card">
<div class="card-body d-flex align-items-start">
<div class="avatar rounded no-thumbnail">
<i class="fa fa-users fa-lg"></i>
</div>
<div class="flex-fill ms-3">
<div class="fw-bold"><span class="h4 mb-0">1089</span><span class="text-danger ms-1">1.05% <i class="fa fa-caret-down"></i></span></div>
<div class="text-muted small">Customers</div>
 <div class="mt-3">
<label class="small d-flex justify-content-between">This Week<span class="fw-bold">349</span></label>
<div class="progress mt-1" style="height: 6px;">
<div class="progress-bar bg-primary" role="progressbar" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100" style="width: 43%;"></div>
</div>
</div>
<div class="mt-2">
<label class="small d-flex justify-content-between">Last Week<span class="fw-bold">488</span></label>
<div class="progress mt-1" style="height: 6px;">
<div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="79" aria-valuemin="0" aria-valuemax="100" style="width: 79%;"></div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col">
<div class="card">
<div class="card-body d-flex align-items-start">
<div class="avatar rounded no-thumbnail">
<i class="fa fa-cart-plus fa-lg"></i>
</div>
<div class="flex-fill ms-3">
<div class="fw-bold"><span class="h4 mb-0">56</span><span class="text-success ms-1">5.77% <i class="fa fa-caret-up"></i></span></div>
<div class="text-muted">New Order</div>
<div class="mt-3">
<label class="small d-flex justify-content-between">This Week<span class="fw-bold">44</span></label>
<div class="progress mt-1" style="height: 6px;">
<div class="progress-bar bg-primary" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
</div>
</div>
<div class="mt-2">
<label class="small d-flex justify-content-between">Last Week<span class="fw-bold">27</span></label>
<div class="progress mt-1" style="height: 6px;">
<div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100" style="width: 41%;"></div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col">
<div class="card">
<div class="card-body d-flex align-items-start">
<div class="avatar rounded no-thumbnail">
<i class="fa fa-dollar fa-lg"></i>
</div>
<div class="flex-fill ms-3">
<div class="fw-bold"><span class="h4 mb-0">$42k</span><span class="text-success ms-1">9.22% <i class="fa fa-caret-up"></i></span></div>
<div class="text-muted">Total Revenue</div>
<div class="mt-3">
<label class="small d-flex justify-content-between">This Week<span class="fw-bold">$1,815</span></label>
<div class="progress mt-1" style="height: 6px;">
<div class="progress-bar bg-primary" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;"></div>
</div>
</div>
<div class="mt-2">
<label class="small d-flex justify-content-between">Last Week<span class="fw-bold">$284</span></label>
<div class="progress mt-1" style="height: 6px;">
<div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="19" aria-valuemin="0" aria-valuemax="100" style="width: 19%;"></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div> 
<div class="row g-3 row-deck">
<div class="col-lg-8 col-md-12">
<div class="card">
<div class="card-header">
<h6 class="card-title m-0">Visitor Statistic</h6>
<div class="dropdown morphing scale-left">
<a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
<a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
<ul class="dropdown-menu shadow border-0 p-2">
<li><a class="dropdown-item" href="#">File Info</a></li>
<li><a class="dropdown-item" href="#">Copy to</a></li>
<li><a class="dropdown-item" href="#">Move to</a></li>
<li><a class="dropdown-item" href="#">Rename</a></li>
<li><a class="dropdown-item" href="#">Block</a></li>
<li><a class="dropdown-item" href="#">Delete</a></li>
</ul>
</div>
</div>
<div class="card-body">
<div id="apex-VisitorStatistic"></div>
</div>
</div> 
</div>
<div class="col-lg-4 col-md-6">
<div class="card">
<div class="card-body text-center">
<h5 class="mb-0">Loan to Value</h5>
<div class="mt-3" id="apex-LoantoValue"></div>
<h3 class="mb-0 text-primary">$25,480</h3>
<span class="text-muted small">Loan Balance</span>
<h6 class="mt-3 mb-0 fw-bold text-danger">102.10%</h6>
<span class="text-muted small">Debt Service Coverage</span>
<h6 class="mt-3 mb-0 fw-bold">Debt Yield</h6>
<span class="text-muted">22.74%</span>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6">
<div class="card">
<div class="card-header">
<h6 class="card-title m-0">Restaurent rating</h6>
<div class="dropdown morphing scale-left">
<a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
<a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
<ul class="dropdown-menu shadow border-0 p-2">
<li><a class="dropdown-item" href="#">File Info</a></li>
<li><a class="dropdown-item" href="#">Copy to</a></li>
<li><a class="dropdown-item" href="#">Move to</a></li>
<li><a class="dropdown-item" href="#">Rename</a></li>
<li><a class="dropdown-item" href="#">Block</a></li>
<li><a class="dropdown-item" href="#">Delete</a></li>
</ul>
</div>
</div>
<div class="d-flex justify-content-center">
<div id="apex-RestaurentRating"></div>
</div>
<div class="card-body px-lg-5 px-4">
<div class="mt-3">
<label class="small d-flex justify-content-between">Service<span class="fw-bold">2K</span></label>
<div class="progress mt-1" style="height: 2px;">
<div class="progress-bar chart-color1" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
</div>
</div>
<div class="mt-3">
<label class="small d-flex justify-content-between">Food<span class="fw-bold">1K</span></label>
<div class="progress mt-1" style="height: 2px;">
<div class="progress-bar chart-color2" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%;"></div>
</div>
</div>
<div class="mt-3">
<label class="small d-flex justify-content-between">Waiting time<span class="fw-bold">780</span></label>
<div class="progress mt-1" style="height: 2px;">
<div class="progress-bar chart-color3" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: 15%;"></div>
</div>
</div>
</div>
</div> 
</div>
<div class="col-lg-4 col-md-6">
<div class="card">
<div class="card-body">
<ul class="nav nav-tabs tab-card mb-3 d-flex" role="tablist">
<li class="nav-item flex-fill text-center"><a class="nav-link active" data-bs-toggle="tab" href="#nav-order-today" role="tab">Order Today</a></li>
<li class="nav-item flex-fill text-center"><a class="nav-link" data-bs-toggle="tab" href="#nav-order-week" role="tab">Order This week</a></li>
</ul>
<div class="custom_scroll" style="height: 380px; scroll-behavior: smooth;">
<ul class="timeline-activity list-unstyled mb-0">
<li class="activity px-3 py-2 mb-1" data-date="12:30 - Sun">
<div class="fw-bold small d-flex justify-content-between align-items-center">New Order <span class="badge bg-warning">ID: 215</span></div>
<div>
<small class="text-muted">1 Burger, 1 Corn Rice curd</small>
</div>
</li>
<li class="activity px-3 py-2 mb-1" data-date="12:31 - Sun">
<div class="fw-bold small">Order Received</div>
<div>
</div>
</li>
<li class="activity px-3 py-2 mb-1" data-date="12:32 - Sun">
<div class="fw-bold small">Payment Verify</div>
<div>
<h5 class="mb-0 text-success">$80.5 - Done</h5>
<small class="text-muted">NetBanking</small>
</div>
</li>
<li class="activity px-3 py-2 mb-1" data-date="12:35 - Sun">
<div class="fw-bold small">Order inprogress</div>
<div>
<label class="me-2">Team:</label>
<a href="#" title="avatar"><img class="avatar xs rounded" src="{{url('/')}}/dashboard/assets/img/xs/avatar3.jpg" alt="friend"> </a>
<a href="#" title="avatar"><img class="avatar xs rounded" src="{{url('/')}}/dashboard/assets/img/xs/avatar1.jpg" alt="friend"> </a>
<a href="#" title="avatar"><img class="avatar xs rounded" src="{{url('/')}}/dashboard/assets/img/xs/avatar7.jpg" alt="friend"> </a>
</div>
</li>
<li class="activity px-3 py-2 mb-1" data-date="12:55 - Sun">
<div class="fw-bold small">Delivery on the way</div>
<div>
<p class="mb-1 small text-muted"><i class="fa fa-map-marker ps-1"></i> 123 6th St. Melbourne, FL 32904</p>
<a href="#" title="avatar"><img class="avatar xs rounded" src="{{url('/')}}/dashboard/assets/img/xs/avatar5.jpg" alt="friend"> </a>
<label class="ms-1">Robert Hammer</label>
</div>
</li>
<li class="activity px-3 py-2 mb-1" data-date="01:10 - Sun">
<div class="fw-bold small d-flex justify-content-between align-items-center">Delivery<span class="badge bg-success">Done</span></div>
</li>
</ul>
</div>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6">
<div class="card">
<div class="card-header">
<h6 class="card-title m-0">Delivery Route</h6>
<div class="dropdown morphing scale-left">
<a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
<a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
<ul class="dropdown-menu shadow border-0 p-2">
<li><a class="dropdown-item" href="#">File Info</a></li>
<li><a class="dropdown-item" href="#">Copy to</a></li>
<li><a class="dropdown-item" href="#">Move to</a></li>
<li><a class="dropdown-item" href="#">Rename</a></li>
<li><a class="dropdown-item" href="#">Block</a></li>
<li><a class="dropdown-item" href="#">Delete</a></li>
</ul>
</div>
</div>
<iframe style="width: 100%; height: 200px; filter: grayscale(100); border: 0;" allowfullscreen="true" aria-hidden="false" tabindex="0" src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d12074.66938771027!2d-74.40733235849672!3d40.83526985386759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0x89c3a786df3d45ed%3A0xd2ca0189df6dc9e7!2sNormandy%20Park%2C%20Parsippany%2C%20NJ%2007054%2C%20United%20States!3m2!1d40.8402518!2d-74.4064636!4m5!1s0x89c3a86ee04fc3d1%3A0x22e044ab1c8bb3e3!2sDestination%20JUMP*21%2C%2039%20Leslie%20Ct%2C%20Whippany%2C%20NJ%2007981%2C%20United%20States!3m2!1d40.8245013!2d-74.390345!5e0!3m2!1sen!2sin!4v1613110633269!5m2!1sen!2sin"></iframe>
<div class="media-body px-2 py-4 text-md-start text-center">
<div class="d-flex px-xl-3 px-2 mb-4">
<img class="avatar rounded" src="{{url('/')}}/dashboard/assets/img/profile_av.png" alt="">
<div class="flex-fill ms-3">
<div class="h6 mb-0 text-muted"><span>Nellie Maxwell</span></div>
<small class="text-muted">+ 41 123 456 7890</small>
</div>
</div>
<h6 class="px-xl-3 px-2 fw-bold mb-0">2.7 miles Late Evening Bike Ride</h6>
<div class="px-xl-3 px-2 mb-4">Feb 11, 2021 9:10PM</div>
<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-start">
<div class="px-xl-3 px-2 pt-2">
<strong>7 min</strong>
<div class="small text-muted">Duration</div>
</div>
<div class="px-xl-3 px-2 pt-2">
<strong>11:38km/h</strong>
<div class="small text-muted">Avg. Speed</div>
</div>
<div class="px-xl-3 px-2 pt-2">
<strong>20:45km/h</strong>
<div class="small text-muted">Max. Speed</div>
</div>
</div>
</div>
</div>
</div>
</div> 
</div>
</div>
@endsection
@extends('layouts/layoutMaster')

@section('title', 'eCommerce Customer Details Overview - Apps')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('public/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('public/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('public/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('public/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}" />
<link rel="stylesheet" href="{{asset('public/assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="{{asset('public/assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('public/assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('public/assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('public/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('public/assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="{{asset('public/assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('public/assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('public/assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('public/assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('public/assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('public/assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('/assets/js/modal-edit-user.js')}}"></script>
<script src="{{asset('/assets/js/app-ecommerce-customer-detail.js')}}"></script>
<script src="{{asset('/assets/js/app-ecommerce-customer-detail-overview.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">eCommerce / Customer Details /</span> Overview
</h4>

<div class="d-flex flex-column flex-sm-row align-items-center justify-content-sm-between mb-4 text-center text-sm-start gap-2">
  <div class="mb-2 mb-sm-0">
    <h4 class="mb-1">
      Customer ID #634759
    </h4>
    <p class="mb-0">
      Aug 17, 2020, 5:48 (ET)
    </p>
  </div>
  <button type="button" class="btn btn-label-danger delete-customer">Delete Customer</button>
</div>


<div class="row">
  <!-- Customer-detail Sidebar -->
  <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
    <!-- Customer-detail Card -->
    <div class="card mb-4">
      <div class="card-body">
        <div class="customer-avatar-section">
          <div class="d-flex align-items-center flex-column">
            <img class="img-fluid rounded my-3" src="{{ asset('/assets/img/avatars/12.png')}}" height="110" width="110" alt="User avatar" />
            <div class="customer-info text-center">
              <h4 class="mb-1">Lorine Hischke</h4>
              <small>Customer ID #634759</small>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-around flex-wrap mt-4 py-3">
          <div class="d-flex align-items-center gap-2">
            <div class="avatar">
              <div class="avatar-initial rounded bg-label-primary"><i class='bx bx-cart-alt bx-sm'></i>
              </div>
            </div>
            <div>
              <h5 class="mb-0">184</h5>
              <span>Orders</span>
            </div>
          </div>
          <div class="d-flex align-items-center gap-2">
            <div class="avatar">
              <div class="avatar-initial rounded bg-label-primary"><i class='bx bx-dollar bx-sm'></i>
              </div>
            </div>
            <div>
              <h5 class="mb-0">$12,378</h5>
              <span>Spent</span>
            </div>
          </div>
        </div>

        <div class="info-container">
          <small class="d-block pt-4 border-top fw-normal text-uppercase text-muted my-3">DETAILS</small>
          <ul class="list-unstyled">
            <li class="mb-3">
              <span class="fw-medium me-2">Username:</span>
              <span>lorine.hischke</span>
            </li>
            <li class="mb-3">
              <span class="fw-medium me-2">Email:</span>
              <span>vafgot@vultukir.org</span>
            </li>
            <li class="mb-3">
              <span class="fw-medium me-2">Status:</span>
              <span class="badge bg-label-success">Active</span>
            </li>
            <li class="mb-3">
              <span class="fw-medium me-2">Contact:</span>
              <span>(123) 456-7890</span>
            </li>

            <li class="mb-3">
              <span class="fw-medium me-2">Country:</span>
              <span>USA</span>
            </li>
          </ul>
          <div class="d-flex justify-content-center">
            <a href="javascript:;" class="btn btn-primary me-3" data-bs-target="#editUser" data-bs-toggle="modal">Edit Details</a>

          </div>
        </div>
      </div>
    </div>
    <!-- /Customer-detail Card -->
    <!-- Plan Card -->

    <div class="card mb-4 bg-gradient-primary">
      <div class="card-body">
        <div class="row justify-content-between mb-3">
          <div class="col-md-12 col-lg-7 col-xl-12 col-xxl-7 text-center text-lg-start text-xl-center text-xxl-start order-1  order-lg-0 order-xl-1 order-xxl-0">
            <h4 class="card-title text-white text-nowrap">Upgrade to premium</h4>
            <p class="card-text text-white">Upgrade customer to premium membership to access pro features.</p>
          </div>
          <span class="col-md-12 col-lg-5 col-xl-12 col-xxl-5 text-center mx-auto mx-md-0 mb-2"><img src="{{ asset('/assets/img/illustrations/rocket.png')}}" class="w-px-75 m-2" alt="3dRocket"></span>
        </div>
        <button class="btn btn-white text-primary w-100 fw-medium shadow-sm" data-bs-target="#upgradePlanModal" data-bs-toggle="modal">Upgrade to premium</button>
      </div>
    </div>

    <!-- /Plan Card -->
  </div>
  <!--/ Customer Sidebar -->


  <!-- Customer Content -->
  <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
    <!-- Customer Pills -->
    <ul class="nav nav-pills flex-column flex-md-row mb-4">
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i>Overview</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('app/ecommerce/customer/details/security')}}"><i class="bx bx-lock-alt me-1"></i>Security</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('app/ecommerce/customer/details/billing')}}"><i class="bx bx-detail me-1"></i>Address & Billing</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('app/ecommerce/customer/details/notifications')}}"><i class="bx bx-bell me-1"></i>Notifications</a></li>
    </ul>
    <!--/ Customer Pills -->

    <!-- / Customer cards -->
    <div class="row text-nowrap">
      <div class="col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="card-icon mb-3">
              <div class="avatar">
                <div class="avatar-initial rounded bg-label-primary"><i class='bx bx-dollar bx-sm'></i>
                </div>
              </div>
            </div>
            <div class="card-info">
              <h4 class="card-title mb-3">Account Balance</h4>
              <div class="d-flex align-items-end mb-1 gap-1">
                <h4 class="text-primary mb-0">$2345</h4>
                <p class="mb-0"> Credit Left</p>
              </div>
              <p class="text-muted mb-0 text-truncate">Account balance for next purchase</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-icon mb-3">
              <div class="avatar">
                <div class="avatar-initial rounded bg-label-success"><i class='bx bx-gift bx-sm'></i>
                </div>
              </div>
            </div>
            <div class="card-info">
              <h4 class="card-title mb-3">Loyalty Program</h4>
              <span class="badge bg-label-success mb-1">Platinum member</span>
              <p class="text-muted mb-0">3000 points to next tier</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-icon mb-3">
              <div class="avatar">
                <div class="avatar-initial rounded bg-label-warning"><i class='bx bx-star bx-sm'></i>
                </div>
              </div>
            </div>
            <div class="card-info">
              <h4 class="card-title mb-3">Wishlist</h4>
              <div class="d-flex align-items-end mb-1 gap-1">
                <h4 class="text-warning mb-0">15</h4>
                <p class="mb-0">Items in wishlist</p>
              </div>
              <p class="text-muted mb-0 text-truncate">Receive notification when items go on sale</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-icon mb-3">
              <div class="avatar">
                <div class="avatar-initial rounded bg-label-info"><i class='bx bxs-discount bx-sm'></i>
                </div>
              </div>
            </div>
            <div class="card-info">
              <h4 class="card-title mb-3">Coupons</h4>
              <div class="d-flex align-items-end mb-1 gap-1">
                <h4 class="text-info mb-0">21</h4>
                <p class="mb-0">Coupons you win</p>
              </div>

              <p class="text-muted mb-0 text-truncate">Use coupon on next purchase</p>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- / customer cards -->


    <!-- Invoice table -->
    <div class="card mb-4">
      <div class="table-responsive mb-3">
        <table class="table datatables-customer-order border-top">
          <thead>
            <tr>
              <th></th>
              <th></th>
              <th>Order</th>
              <th>Date</th>
              <th>Status</th>
              <th>Spent</th>
              <th class="text-md-center">Actions</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
    <!-- /Invoice table -->
  </div>
  <!--/ Customer Content -->
</div>

<!-- Modal -->
@include('_partials/_modals/modal-edit-user')
@include('_partials/_modals/modal-upgrade-plan')
<!-- /Modal -->
@endsection

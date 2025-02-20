@extends('layouts/layoutMaster')

@section('title', 'eCommerce Customer Details Security - Apps')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('public/assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('public/assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="{{asset('public/assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('public/assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('public/assets/vendor/libs/moment/moment.js')}}"></script>
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
<script src="{{asset('/assets/js/modal-enable-otp.js')}}"></script>
<script src="{{asset('/assets/js/app-ecommerce-customer-detail.js')}}"></script>
<script src="{{asset('/assets/js/app-user-view-security.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">eCommerce / Customer Details /</span> Security
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
      <li class="nav-item"><a class="nav-link" href="{{url('app/ecommerce/customer/details/overview')}}"><i class="bx bx-user me-1"></i>Overview</a></li>
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-lock-alt me-1"></i>Security</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('app/ecommerce/customer/details/billing')}}"><i class="bx bx-detail me-1"></i>Address & Billing</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('app/ecommerce/customer/details/notifications')}}"><i class="bx bx-bell me-1"></i>Notifications</a></li>
    </ul>
    <!--/ Customer Pills -->
    <!-- Change Password -->
    <div class="card mb-4">
      <h5 class="card-header">Change Password</h5>
      <div class="card-body">
        <form id="formChangePassword" method="POST" onsubmit="return false">
          <div class="alert alert-warning" role="alert">
            <h6 class="alert-heading mb-2 pb-1">Ensure that these requirements are met</h6>
            <span>Minimum 8 characters long, uppercase & symbol</span>
          </div>
          <div class="row">
            <div class="mb-3 col-12 col-sm-6 form-password-toggle">
              <label class="form-label" for="newPassword">New Password</label>
              <div class="input-group input-group-merge">
                <input class="form-control" type="password" id="newPassword" name="newPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>

            <div class="mb-3 col-12 col-sm-6 form-password-toggle">
              <label class="form-label" for="confirmPassword">Confirm New Password</label>
              <div class="input-group input-group-merge">
                <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <div>
              <button type="submit" class="btn btn-primary me-2">Change Password</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!--/ Change Password -->

    <!-- Two-steps verification -->
    <div class="card mb-4">
      <h5 class="card-header pb-2">Two-steps verification</h5>
      <div class="card-body">
        <p>Keep your account secure with authentication step.</p>
        <h6>SMS</h6>
        <div class="d-flex justify-content-between border-bottom mb-3 pb-2">
          <span>+1(968) 945-8832</span>
          <div class="action-icons">
            <a href="javascript:;" class="text-body me-1" data-bs-target="#enableOTP" data-bs-toggle="modal"><i class="bx bx-edit"></i></a>
            <a href="javascript:;" class="text-body"><i class="bx bx-trash-alt"></i></a>
          </div>
        </div>
        <p class="mb-0">Two-factor authentication adds an additional layer of security to your account by requiring more than just a password to log in.
          <a href="javascript:void(0);" class="text-body">Learn more.</a>
        </p>
      </div>
    </div>
    <!--/ Two-steps verification -->

    <!-- Recent Devices -->
    <div class="card mb-4">
      <h5 class="card-header">Recent Devices</h5>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th class="text-truncate">Browser</th>
              <th class="text-truncate">Device</th>
              <th class="text-truncate">Location</th>
              <th class="text-truncate">Recent Activities</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-truncate"><i class='bx bxl-windows text-info me-3'></i> Chrome on Windows</td>
              <td class="text-truncate">HP Spectre 360</td>
              <td class="text-truncate">Switzerland</td>
              <td class="text-truncate">10, July 2021 20:07</td>
            </tr>
            <tr>
              <td class="text-truncate"><i class='bx bx-mobile-alt text-danger me-3'></i> Chrome on iPhone</td>
              <td class="text-truncate">iPhone 12x</td>
              <td class="text-truncate">Australia</td>
              <td class="text-truncate">13, July 2021 10:10</td>
            </tr>
            <tr>
              <td class="text-truncate"><i class='bx bxl-android text-success me-3'></i> Chrome on Android</td>
              <td class="text-truncate">Oneplus 9 Pro</td>
              <td class="text-truncate">Dubai</td>
              <td class="text-truncate">14, July 2021 15:15</td>
            </tr>
            <tr>
              <td class="text-truncate"><i class='bx bxl-apple me-3'></i>Chrome on MacOS</td>
              <td class="text-truncate">Apple iMac</td>
              <td class="text-truncate">India</td>
              <td class="text-truncate">16, July 2021 16:17</td>
            </tr>
            <tr>
              <td class="text-truncate"><i class='bx bxl-windows text-info me-3'></i> Chrome on Windows</td>
              <td class="text-truncate">HP Spectre 360</td>
              <td class="text-truncate">Switzerland</td>
              <td class="text-truncate">20, July 2021 21:01</td>
            </tr>
            <tr>
              <td class="text-truncate border-bottom-0"><i class='bx bxl-android text-success me-3'></i> Chrome on Android</td>
              <td class="text-truncate border-bottom-0">Oneplus 9 Pro</td>
              <td class="text-truncate border-bottom-0">Dubai</td>
              <td class="text-truncate border-bottom-0">21, July 2021 12:22</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!--/ Recent Devices -->
  </div>
  <!--/ Customer Content -->
</div>

<!-- Modal -->
@include('_partials/_modals/modal-edit-user')
@include('_partials/_modals/modal-enable-otp')
@include('_partials/_modals/modal-upgrade-plan')
<!-- /Modal -->
@endsection

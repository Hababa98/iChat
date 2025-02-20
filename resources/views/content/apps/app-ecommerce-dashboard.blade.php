@extends('layouts/layoutMaster')



@section('title', 'eCommerce - Dashboards')



@section('vendor-style')

    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />

    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />

    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />

@endsection



@section('page-style')

    <link rel="stylesheet" href="{{ asset('public/assets/vendor/css/pages/card-analytics.css') }}" />

@endsection



@section('vendor-script')

    <script src="{{ asset('public/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <script src="{{ asset('public/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>

@endsection



@section('page-script')

    <script src="{{ asset('/assets/js/app-ecommerce-dashboard.js') }}"></script>

    <script src="{{ asset('/assets/js/app-ecommerce-dashboard-order-list.js') }}"></script>

    <script src="{{ asset('/assets/js/app-dashboard-user-list.js') }}"></script>

@endsection

@section('content')

    <div class="row">



        <div class="col-md-12 col-lg-4">

            <div class="row">

                {{-- <div class="col-lg-6 col-md-3 col-6 mb-4">

        <div class="card">

          <div class="card-body">

            <div class="card-title d-flex align-items-start justify-content-between">

              <div class="avatar flex-shrink-0">

                <img src="{{asset('/assets/img/icons/unicons/wallet-info.png')}}" alt="Credit Card" class="rounded">

              </div>

              <div class="dropdown">

                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                  <i class="bx bx-dots-vertical-rounded"></i>

                </button>

                <div class="dropdown-menu" aria-labelledby="cardOpt6">

                  <a class="dropdown-item" href="javascript:void(0);">View More</a>

                  <a class="dropdown-item" href="javascript:void(0);">Delete</a>

                </div>

              </div>

            </div>

            <span class="d-block">Sales</span>

            <h4 class="card-title mb-1">$4,679</h4>

            <small class="text-success fw-medium"><i class='bx bx-up-arrow-alt'></i> +28.42%</small>

          </div>

        </div>

      </div> --}}



                <div class="col-lg-6 col-md-3 col-6 mb-4">

                    <div class="card card-border-shadow-primary h-100">

                        <div class="card-body">

                            <div class="d-flex align-items-center mb-2 pb-1">

                                <div class="avatar me-2">

                                    <span class="avatar-initial rounded bg-label-primary"><i
                                            class="fa fa-wallet text-success"></i></span>

                                </div>



                            </div>

                            <p class="mb-1">Total Earnings</p>

                            <h4 class="ms-1">$ {{ $totalSales }}</h4>

                        </div>

                    </div>

                </div>

                <div class="col-lg-6 col-md-3 col-6 mb-4">

                    <div class="card card-border-shadow-primary h-100">

                        <div class="card-body">

                            <div class="d-flex align-items-center mb-2 pb-1">

                                <div class="avatar me-2">

                                    <span class="avatar-initial rounded bg-label-primary"><i
                                            class="fa fa-wallet"></i></span>

                                </div>



                            </div>

                            <p class="mb-1">Total Product</p>

                            <h4 class="ms-1 mb-0"> {{ $totalProduct }}</h4>

                        </div>

                    </div>

                </div>

                <div class="col-lg-6 col-md-3 col-6 mb-4">

                    <div class="card card-border-shadow-primary h-100">

                        <div class="card-body">

                            <div class="d-flex align-items-center mb-2 pb-1">

                                <div class="avatar me-2">

                                    <span class="avatar-initial rounded bg-label-primary"><i class="fa fa-users"></i></span>

                                </div>



                            </div>

                            <p class="mb-1">Total Users</p>

                            <h4 class="ms-1 mb-0"> {{ $totalUser }}</h4>

                        </div>

                    </div>

                </div>

                <div class="col-lg-6 col-md-3 col-6 mb-4">

                    <div class="card card-border-shadow-primary h-100">

                        <div class="card-body">

                            <div class="d-flex align-items-center mb-2 pb-1">

                                <div class="avatar me-2">

                                    <span class="avatar-initial rounded bg-label-primary"><i
                                            class="menu-icon tf-icons bx bx-cart-alt"></i></span>

                                </div>

                            </div>

                            <p class="mb-1">Total Orders</p>

                            <h4 class="ms-1 mb-0">{{ $totalOrders }}</h4>

                        </div>

                    </div>

                </div>
                <div class="col-lg-6 col-md-3 col-6 mb-4">

                    <div class="card card-border-shadow-primary h-100">

                        <div class="card-body">

                            <div class="d-flex align-items-center mb-2 pb-1">

                                <div class="avatar me-2">

                                    <span class="avatar-initial rounded bg-label-primary"><i
                                            class="menu-icon tf-icons bx bx-cart-alt"></i></span>

                                </div>

                            </div>

                            <p class="mb-1">Total Stores</p>

                            <h4 class="ms-1 mb-0">{{ $totalOrders }}</h4>

                        </div>

                    </div>

                </div>
                <div class="col-lg-6 col-md-3 col-6 mb-4">

                    <div class="card card-border-shadow-primary h-100">

                        <div class="card-body">

                            <div class="d-flex align-items-center mb-2 pb-1">

                                <div class="avatar me-2">

                                    <span class="avatar-initial rounded bg-label-primary"><i
                                            class="menu-icon tf-icons bx bx-cart-alt"></i></span>

                                </div>

                            </div>

                            <p class="mb-1">Total Stores</p>

                            <h4 class="ms-1 mb-0">{{ $totalOrders }}</h4>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        <!-- Total Income -->

        <div class="col-md-6 col-lg-8 mb-4">

            <div class="card">

                <div class="row row-bordered g-0">

                    <div class="col-md-8">

                        <div class="card-header">

                            <h5 class="card-title mb-0">Total Income</h5>

                            <small class="card-subtitle">Yearly report overview</small>

                        </div>

                        <div class="card-body">

                            <div id="totalIncomeChart"></div>

                        </div>

                    </div>

                </div>

            </div>

            <!--/ Total Income -->

        </div>

        <!--/ Total Income -->

    </div>

    <div class="row">

        <div class="col-md-6 col-lg-12 mb-4 mb-md-0">

            <div class="card">

                <div class="card-datatable table-responsive">

                    <table class="datatables-dashboard-order table border-top">

                        <thead>

                            <tr>

                                <th></th>

                                <th>order</th>

                                <th>date</th>

                                <th>customers</th>

                                <th>status</th>

                                <th>actions</th>

                            </tr>

                        </thead>

                    </table>

                </div>

            </div>

        </div>

    </div>



    <br>



    <div class="row">

        <div class="col-md-6 col-lg-12 mb-4 mb-md-0">

            <div class="card">

                <div class="card-datatable table-responsive">

                    <table class="datatables-dashboard-users table border-top">

                        <thead>

                            <tr>

                                <th></th>

                                <th>User</th>

                                <th>Status</th>

                                <th>Actions</th>

                            </tr>

                        </thead>

                    </table>

                </div>

            </div>

        </div>

    </div>

@endsection

@extends('layouts/layoutMaster')

@section('title', 'Dashboard')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/@form-validation/umd/styles/index.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/rateyo/rateyo.css') }}" />
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/css/pages/card-analytics.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('public/assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/@form-validation/umd/bundle/popular.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="{{ asset('public/assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('public/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/rateyo/rateyo.js') }}"></script>
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/css/pages/app-ecommerce.css') }}" />
@endsection

@section('page-script')
    <script src="{{ asset('public/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('public/assets/js/dashboard-chart.js') }}"></script>
    <script src="{{ asset('public/assets/js/dashboard-users.js') }}"></script>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-4">
            <div class="row">
                <div class="col-lg-6 col-md-3 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <div style="background-color: #fff; padding: 12px; border-radius: 8px;">
                                        <i class="menu-icon tf-icons bx bx-user"
                                            style="color: #696cff; font-size: 30px;"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="d-block">Total Users</span>
                            <h4 class="card-title mb-1">{{ $usersCount }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-3 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <div style="background-color: #fff; padding: 12px; border-radius: 8px;">
                                        <i class="menu-icon tf-icons tf-icons bx bx-group"
                                            style="color: #696cff; font-size: 30px;"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="d-block">Total Groups</span>
                            <h4 class="card-title mb-1">{{ $groupsCount }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-3 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <div style="background-color: #fff; padding: 12px; border-radius: 8px;">
                                        <i class="menu-icon tf-icons bx bx-phone-call"
                                            style="color: #696cff; font-size: 30px;"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="d-block">Voice Calls</span>
                            <h4 class="card-title mb-1">
                                @php
                                    $totalVoiceCalls = array_sum($totalVoiceCallsByMonth);
                                    echo $totalVoiceCalls;
                                @endphp
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-3 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <div style="background-color: #fff; padding: 12px; border-radius: 8px;">
                                        <i class="menu-icon tf-icons bx bx-video"
                                            style="color: #696cff; font-size: 30px;"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="d-block">Video Calls</span>
                            <h4 class="card-title mb-1">
                                @php
                                    $totalVideoCalls = array_sum($totalVideoCallsByMonth);
                                    echo $totalVideoCalls;
                                @endphp
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Users Graph -->
        <div class="col-md-6 col-lg-8 mb-4">
            <div class="card">
                <div class="row row-bordered g-0">
                    <div class="col-md-8">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Total Users (2024)</h5>
                            <small class="card-subtitle">Yearly report overview</small>
                        </div>
                        <div class="card-body">
                            <div id="totalUsersChart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Voice Calls & Video Calls Graph -->
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header header-elements">
                    <div>
                        <h5 class="card-title mb-0">Total Voice Calls & Video Calls (2024)</h5>
                        <small class="text-muted">Yearly report overview</small>
                    </div>
                    <div class="card-header-elements ms-auto py-0">
                        <!-- Add total calls here -->
                        <span class="badge bg-label-secondary">
                            <i class='bx bx-phone-call bx-xs text'></i>
                            <span class="align-middle">
                                @php
                                    $totalVoiceCalls = array_sum($totalVoiceCallsByMonth);
                                    echo $totalVoiceCalls;
                                @endphp
                            </span>
                        </span>
                        <span class="badge bg-label-secondary">
                            <i class='bx bx-video bx-xs text'></i>
                            <span class="align-middle">
                                @php
                                    $totalVideoCalls = array_sum($totalVideoCallsByMonth);
                                    echo $totalVideoCalls;
                                @endphp
                            </span>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="lineChart" class="chartjs" data-height="500"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- Users List --}}
    <div class="card" style="margin-top: 10px;">
        <div class="card-datatable table-responsive">
            <table class="datatables-users table border-top">
                <thead>
                    <tr>
                        <th></th>
                        <th>User</th>
                        <th>Country Name</th>
                        <th>Country Code</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    {{-- Total Users Script --}}
    <script>
        var totalUsersConfig = {
            chart: {},
            series: [{
                name: 'Total Users',
                data: {!! json_encode($monthCountDatauser) !!}
            }],
            // Other configuration options for your chart
        };
        var monthCountDatauser = {!! json_encode($monthCountDatauser) !!};

        // Render the chart
        var totalUsersChart = new ApexCharts(document.querySelector("#totalUsersChart"), totalUsersConfig);
        totalUsersChart.render();
    </script>

    {{-- Total Voice Calls and Video Calls Script --}}
    <script>
        var totalCallsConfig = {
            chart: {},
            series: [{
                name: 'Total Audio Calls',
                data: {!! json_encode(array_values($totalVoiceCallsByMonth)) !!}
            }, {
                name: 'Total Video Calls',
                data: {!! json_encode(array_values($totalVideoCallsByMonth)) !!}
            }],
            xaxis: {
                categories: {!! json_encode($monthNames) !!}
            },
            // Other configuration options for your chart
        };

        // Render the chart
        var totalCallsChart = new ApexCharts(document.querySelector("#lineChart"), totalCallsConfig);
        totalCallsChart.render();
    </script>
    <script>
        var monthCountData = {!! json_encode($monthCountData) !!};
    </script>
@endsection

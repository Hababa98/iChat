@extends('layouts/layoutMaster')

@section('title', 'View Notifications')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/@form-validation/umd/styles/index.min.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('public/assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/@form-validation/umd/bundle/popular.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection

@section('page-script')
    <script src="{{ asset('public/assets/js/notifications-list.js') }}"></script>

@endsection

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">View Notifications /</span> Notifications List
    </h4>
    <div class="row g-4 mb-4">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
    </div>

    <!-- Notifications List Table -->
    <div class="card">
        <div class="card-datatable table-responsive">
            <table class="datatables-users table border-top">
                <thead>
                    <tr>
                        <th></th>
                        <th>Notification id</th>
                        <th>Notification Title</th>
                        <th>Message</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@php
    $customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Whoxa Login')

@section('vendor-style')
    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/@form-validation/umd/styles/index.min.css') }}" />
@endsection

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/css/pages/page-auth.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('public/assets/vendor/libs/@form-validation/umd/bundle/popular.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('/assets/js/pages-auth.js') }}"></script>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">

                    <div class="card-body">
                        <!-- Image instead of Logo -->
                        <div class="app-brand justify-content-center">
                            <img src="{{ asset('public/assets/images/applogo.png') }}" alt="Whoxa"
                                style="width: 100px; height: 100px;">
                        </div>
                        @if (Session::has('message'))
                            <p class="alert alert-danger">{{ Session::get('message') }}</p>
                        @endif
                        <!-- /Logo -->
                        {{-- <h4 class="mb-2">Welcome to {{ config('variables.templateName') }}! 👋</h4>
                        <p class="mb-4">Please sign-in to your account and start the adventure</p> --}}

                        <form id="formAuthentication" class="mb-3" action="{{ url('/auth/login') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email or Username</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter your email or username" autofocus>
                                <span class="error">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="mb-3 form-password-toggle">

                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                <span class="error">{{ $errors->first('password') }}</span>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary d-grid w-100"
                                    style="background-color: #349CF8; color: white; border-color: #349CF8;">Sign in</button>
                            </div>
                        </form>
                        <style>
                            .btn-primary:hover {
                                background-color: #349CF8 !important;
                                border-color: #349CF8 !important;
                            }
                        </style>

                        <table class="mt-3 table table-bordered">
                            <tbody>
                                <tr>

                                    <td>Email</td>
                                    <td>admin@admin.com</td>

                                </tr>

                                <tr>
                                    <td>Password</td>
                                    <td>12345678</td>
                                </tr>

                                <tr>
                                    <td align="center" colspan="2">
                                        <button type="button" class="copycred btn btn-sm btn-primary"
                                            style="background-color: #349CF8; color: white; border-color: #349CF8;">
                                            Copy
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>
@endsection

<script>
    $(document).ready(function() {
        $(".copycred").on("click", function() {
            $(this).text("Copied !");

            $("input[name=email]").val('admin@admin.com');
            $("input[name=password]").val('12345678');
        });
    });
</script>

@extends('layouts/layoutMaster')

@section('title', 'Settings')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/quill/typography.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/quill/katex.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/quill/editor.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/dropzone/dropzone.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/tagify/tagify.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('public/assets/vendor/libs/quill/katex.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/quill/quill.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/tagify/tagify.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('public/assets/js/appsetting-add.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Settings /</span><span> Privacy Policy</span>
    </h4>

    <div class="row g-4 mb-4">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
    </div>

    <div class="app-ecommerce">
        <!-- Privacy Policy -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1 mt-3">Privacy Policy</h4>
                <p class="text-muted">Follow the policy</p>
            </div>
        </div>

        <form class="add-service pt-0" id="addAppSetting" method="post" action="{{ route('privacypolicy-save') }}">
            @csrf
            <div class="row">
                <!-- Privacy Policy Details -->
                <div class="col-12 col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Privacy Policy Details</h5>
                        </div>
                        <div class="card-body">
                            <!-- Privacy Policy -->
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="privacy_policy">Privacy Policy<span
                                            style="color: red;">*</span></label>
                                    <input type="text" id="privacy_policy" value="{{ $app_setting['privacy_policy'] }}"
                                        placeholder="Enter Privacy Policy" name="privacy_policy"
                                        class="form-control @error('privacy_policy') is-invalid @enderror" />
                                    @error('privacy_policy')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary me-sm-3 me-1 data-submit" value="Submit"
                                onclick="submitForm(event)">
                            <button type="button" class="btn btn-secondary me-sm-3 me-1"
                                onclick="cancelForm()">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

<script>
    function cancelForm() {
        window.location.href = "{{ route('dashboard') }}";
    }
</script>

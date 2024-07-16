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
        <span class="text-muted fw-light">Settings /</span><span> Login Setting</span>
    </h4>

    <div class="row g-4 mb-4">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
    </div>

    <div class="app-ecommerce">
        <!-- App Setting -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1 mt-3">Login Setting</h4>
                <p class="text-muted">Manage your Login Credentials</p>
            </div>
        </div>

        <form class="add-service pt-0" id="addAppSetting" method="post" action="{{ route('appsetting-save') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- Login Credentials -->
                <div class="col-12 col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Login Credentials</h5>
                        </div>
                        <div class="card-body">

                            <div class="form-group d-flex justify-content-between align-items-center border-top pt-3">
                                <label for="phone" class="h6 mb-0">Phone</label>
                                <div class="w-25 d-flex justify-content-end">
                                    <label class="switch switch-primary switch-sm me-4 pe-2">
                                        <input type="checkbox" name="phone_status" class="switch-input">
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on">
                                                <span class="switch-off"></span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-between align-items-center  pt-3">
                                <label for="email" class="h6 mb-0">Email</label>
                                <div class="w-25 d-flex justify-content-end">
                                    <label class="switch switch-primary switch-sm me-4 pe-2">
                                        <input type="checkbox" name="email_status" class="switch-input">
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on">
                                                <span class="switch-off"></span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group mt-4">
                                <input type="submit" class="btn btn-primary me-sm-3 me-1 data-submit" value="Submit"
                                    onclick="submitForm(event)">
                                <button type="button" class="btn btn-secondary me-sm-3 me-1"
                                    onclick="cancelForm()">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection

<script>
    function displaySelectedImage(input) {
        var container = document.getElementById('selectedImageContainer');
        container.innerHTML = '';

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var image = document.createElement('img');
                image.src = e.target.result;
                image.style.maxWidth = '100px';
                image.style.maxHeight = '100px';
                container.appendChild(image);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
    function cancelForm() {
        window.location.href = "{{ route('dashboard') }}";
    }
</script>

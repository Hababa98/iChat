@extends('layouts/layoutMaster')

@section('title', 'Add Wallpaper')

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
    <script src="{{ asset('public/assets/js/notifications-add.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Wallpapers /</span><span> Add Wallpaper</span>
    </h4>

    <div class="row g-4 mb-4">
        @if (session()->has('message'))
            <div class="alert alert-danger">
                {{ session()->get('message') }}
            </div>
        @endif
    </div>

    <div class="app-ecommerce">
        <!-- Add Wallpaper -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1 mt-3">Wallpaper Settings</h4>
                <p class="text-muted">Manage your wallpaper preferences</p>
            </div>
        </div>

        <form class="add-service pt-0" id="addNotificationForm" method="post" action="{{ route('wallpapers-save') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- Add Wallpaper -->
                <div class="col-12 col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-tile mb-0">Add Wallpaper</h5>
                        </div>
                        <div class="card-body">
                            <!-- Wallpaper Title -->
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="name">Wallpaper Name<span
                                            style="color: red;">*</span></label>
                                    <input type="text" id="name" value="{{ old('name') }}"
                                        placeholder="Enter Wallpaper Name" name="name"
                                        class="form-control @error('name') is-invalid @enderror" />
                                    @error('name')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Image Upload --}}
                            <div class="form-group mb-3">
                                <label class="form-label" for="image">Wallpaper Image<span
                                        style="color: red;">*</span></label>
                                <div class="custom-file">
                                    <input type="file" name="image" class="form-control form-control-lg"
                                        id="exampleInputFile">
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center pt-3">
                                <span class="mb-0 h6">Status<span class="text-danger">*</span></span>
                                <div class="w-25 d-flex justify-content-end">
                                    <input type="hidden" name="status" value="0">
                                    <label class="switch switch-primary switch-sm me-4 pe-2">
                                        <input type="checkbox" name="status" class="switch-input"
                                            {{ old('status') ? 'checked' : '' }}>
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on">
                                                <span class="switch-off"></span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <span class="text-muted fw-light">(Please Select Status)</span><br>
                            <span id="status-error" class="error"></span><br>

                            <input type="submit" class="btn btn-primary me-sm-3 me-1 data-submit" value="Submit"
                                onclick="submitForm(event)">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

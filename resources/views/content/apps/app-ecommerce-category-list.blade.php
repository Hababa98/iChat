@extends('layouts/layoutMaster')

@section('title', 'eCommerce Product Category - Apps')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('public/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/@form-validation/umd/styles/index.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/quill/typography.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/quill/katex.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/quill/editor.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/css/pages/app-ecommerce.css') }}" />

@endsection

@section('vendor-script')
    <script src="{{ asset('public/assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/@form-validation/umd/bundle/popular.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/quill/katex.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/quill/quill.js') }}"></script>

    <script src="{{ asset('public/assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('/assets/js/app-ecommerce-category-list.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Category /</span> Category List
    </h4>

    <div class="app-ecommerce-category">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="card">
            <div class="card-datatable table-responsive">
                <table class="datatables-category-list table border-top">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Categories</th>
                            <th>Status</th>
                            <th class="text-lg-center">Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!-- Offcanvas to add new customer -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEcommerceCategoryList"
            aria-labelledby="offcanvasEcommerceCategoryListLabel">
            <!-- Offcanvas Header -->
            <div class="offcanvas-header py-4">
                <h5 id="offcanvasEcommerceCategoryListLabel" class="offcanvas-title">Add Category</h5>
                <button type="button" class="btn-close bg-label-secondary text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <!-- Offcanvas Body -->
            <div class="offcanvas-body border-top">
                <form action="{{ url('app/ecommerce/product/category/add') }}" method="POST" enctype="multipart/form-data"
                    class="pt-0" onsubmit="return categoryValidaton()">
                    <!-- Title -->
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="ecommerce-category-title">Title</label>
                        <input type="text" class="form-control" id="category-name" placeholder="Enter category title"
                            name="category_name" aria-label="category title">
                        <span id="category-name-error" class="error">{{ $errors->first('category_name') }}</span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="ecommerce-category-image">Attachment</label>
                        <input class="form-control" type="file" id="category-image" name="category_image">
                        <span id="category-image-error" class="error">{{ $errors->first('category_image') }}</span>
                    </div>
                    <!-- Status -->
                    <div class="mb-4 ecommerce-select2-dropdown">
                        <label class="form-label">Select category status</label>
                        <select id="ecommerce-category-status" name="status" class="select2 form-select"
                            data-placeholder="Select category status">
                            <option value="">Select category status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        <span class="error">{{ $errors->first('status') }}</span>
                    </div>
                    <!-- Submit and reset -->
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">Add</button>
                        <button type="reset" class="btn bg-label-danger" data-bs-dismiss="offcanvas">Discard</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

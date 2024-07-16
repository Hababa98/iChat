@extends('layouts/layoutMaster')


@section('title', 'Email - Apps')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/typography.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/katex.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/editor.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/tagify/tagify.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
@endsection
@section('vendor-script')
    <script src="{{ asset('public/assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/quill/katex.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/quill/quill.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/tagify/tagify.js') }}"></script>

@endsection


@section('page-script')
    <script src="{{ asset('assets/js/app-ecommerce-product-add.js') }}"></script>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<style>
    .drag-image.active {
        border: 2px solid #ffcc00;
        /* Set the highlight border color */
        box-shadow: 0 0 10px rgba(255, 204, 0, 0.5);
    }
</style>
@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">eCommerce /</span><span> Add Product</span>
    </h4>

    <form action="{{ url('app/ecommerce/product/store') }}" id="add-products" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="app-ecommerce">
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">

                <div class="d-flex flex-column justify-content-center">
                    <h4 class="mb-1 mt-3">Add a new Product</h4>
                    <p class="text-muted">Orders placed across your store</p>
                </div>
                <div class="d-flex align-content-center flex-wrap gap-3">
                    {{-- <button type="submit" class="btn btn-primary">Publish product</button> --}}
                    <input type="submit" class="btn btn-primary" value="Publish product">
                    {{-- <button type="submit" class="btn btn-primary">Publish product</button> --}}
                </div>

            </div>

            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-tile mb-0">Product information</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="ecommerce-product-name">Name</label>
                                <input type="text" class="form-control" id="product_name" placeholder="Product title"
                                    name="product_name" aria-label="Product title" value="{{ old('product_name') }}">
                                <span class="error">{{ $errors->first('product_name') }}</span>
                            </div>
                            <div class="row mb-3">
                                <div class="col"><label class="form-label" for="ecommerce-product-sku">SKU</label>
                                    <input type="number" class="form-control" id="ecommerce-product-sku" placeholder="SKU"
                                        name="product_sku" aria-label="Product SKU">
                                </div>
                            </div>
                            {{-- <div>
                                <label class="form-label">Description <span class="text-muted">(Optional)</span></label>
                                <textarea name="product_description" class="form-control" id="product_description" cols="30" rows="10">{{ old('product_description') }}</textarea>
                                <span class="error">{{ $errors->first('product_description') }}</span>
                            </div> --}}
                            <label class="form-label">Key Features <span class="text-muted">(Optional)</span></label>
                            <div class="form-control p-0 pt-1">
                                <div class="comment-toolbar border-0 border-bottom">
                                    <div class="d-flex justify-content-start">
                                        <span class="ql-formats me-0">
                                            <button class="ql-bold"></button>
                                            <button class="ql-italic"></button>
                                            <button class="ql-underline"></button>
                                            <button class="ql-list" value="ordered"></button>
                                            <button class="ql-list" value="bullet"></button>
                                            <button class="ql-link"></button>
                                            <button class="ql-image"></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="comment-editor border-0 pb-4" id="key_features_description">
                                </div>
                                <input type="text" name="key_features" style="display: none" id="key_features">
                            </div>
                            <br>
                            <label class="form-label">Description <span class="text-muted">(Optional)</span></label>
                            <div class="form-control p-0 pt-1">
                                <div class="comment-toolbar1 border-0 border-bottom">
                                    <div class="d-flex justify-content-start">
                                        <span class="ql-formats me-0">
                                            <button class="ql-bold"></button>
                                            <button class="ql-italic"></button>
                                            <button class="ql-underline"></button>
                                            <button class="ql-list" value="ordered"></button>
                                            <button class="ql-list" value="bullet"></button>
                                            <button class="ql-link"></button>
                                            <button class="ql-image"></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="comment-editor1 border-0 pb-4" id="ecommerce_product_description">
                                </div>
                                <input type="text" name="product_description" style="display: none"
                                    id="product_description">


                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 card-title">Media</h5>
                        </div>
                        <div class="dropzone needsclick" id="dropzone-basic" enctype="multipart/form-data">
                            <div class="dz-message needsclick my-5">
                                <p class="fs-4 note needsclick my-2">Drag and drop your image here</p>
                                <small class="text-muted d-block fs-6 my-2">or</small>
                                <span class="note needsclick btn bg-label-primary d-inline" id="btnBrowse">Browse
                                    image</span>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Variants</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-repeater">
                                <div data-repeater-list="variant_data">
                                    <div data-repeater-item>
                                        <div class="row">
                                            <div class="mb-3 col-4">
                                                <label class="form-label" for="form-repeater-1-1">Options</label>
                                                <select id="form-repeater-1-1" class="select2 form-select"
                                                    data-placeholder="Size">
                                                    @foreach ($variant as $value)
                                                        <option value="{{ $value->name }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3 col-8">
                                                <label class="form-label invisible" for="form-repeater-1-2">Not
                                                    visible</label>
                                                <input type="text" id="form-repeater-1-2" class="form-control "
                                                    name="size" placeholder="Enter size" />
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-primary" data-repeater-create>
                                        Add another option
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Inventory</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Navigation -->
                                <div class="col-12 col-md-4 mx-auto card-separator">
                                    <div class="d-flex justify-content-between flex-column mb-3 mb-md-0 pe-md-3">
                                        <ul class="nav nav-align-left nav-pills flex-column">
                                            <li class="nav-item">
                                                <button class="nav-link active" data-bs-toggle="tab"
                                                    data-bs-target="#restock">
                                                    <i class="bx bx-cube me-2"></i>
                                                    <span class="align-middle">Stock</span>
                                                </button>
                                            </li>
                                            <li class="nav-item">
                                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#shipping">
                                                    <i class="bx bx-car me-2"></i>
                                                    <span class="align-middle">Shipping</span>
                                                </button>
                                            </li>
                                            <li class="nav-item">
                                                <button class="nav-link" data-bs-toggle="tab"
                                                    data-bs-target="#global-delivery">
                                                    <i class="bx bx-globe me-2"></i>
                                                    <span class="align-middle">Global Delivery</span>
                                                </button>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <!-- /Navigation -->
                                <!-- Options -->
                                <div class="col-12 col-md-8 pt-4 pt-md-0">
                                    <div class="tab-content p-0 pe-md-5 ps-md-3">
                                        <!-- Restock Tab -->
                                        <div class="tab-pane fade show active" id="restock" role="tabpanel">
                                            <h5>Options</h5>
                                            <label class="form-label" for="ecommerce-product-stock">Add to Stock</label>
                                            <div class="row mb-3 g-3">
                                                <div class="col-12 col-sm-9">
                                                    <input type="text" class="form-control"
                                                        id="ecommerce-product-stock" placeholder="Quantity"
                                                        name="quantity" aria-label="Quantity">
                                                </div>
                                                {{-- <div class="col-12 col-sm-3">
                                                    <button class="btn btn-primary"><i
                                                            class='bx bx-check me-2'></i>Confirm</button>
                                                </div> --}}
                                            </div>

                                        </div>
                                        <!-- Shipping Tab -->
                                        <div class="tab-pane fade" id="shipping" role="tabpanel">
                                            <h5 class="mb-4">Shipping Type</h5>
                                            <div>
                                                <div class="form-check mb-3">
                                                    {{-- <input class="form-check-input" type="radio" name="shippingType"
                                                        id="seller">
                                                    <label class="form-check-label" for="seller">
                                                        <span class="mb-1 h6">Fulfilled by Seller</span>
                                                        <small class="text-muted">You'll be responsible for product
                                                            delivery.<br>
                                                            Any damage or delay during shipping may cost you a Damage
                                                            fee.</small>
                                                    </label> --}}
                                                    <div class="mb-3 col ecommerce-select2-dropdown">
                                                        <select id="shipping_id" class="select2 form-select"
                                                            name="shipping_id" data-placeholder="Select Shipping">
                                                            <option value="">Select Sub Category</option>
                                                            @foreach ($shipping as $value)
                                                                <option value="{{ $value->id }}">
                                                                    {{ $value->delivery_title }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="error">{{ $errors->first('category_id') }}</span>
                                                    </div>
                                                </div>
                                                {{-- <div class="form-check mb-5">
                                                    <input class="form-check-input" type="radio" name="shippingType"
                                                        id="companyName" checked>
                                                    <label class="form-check-label" for="companyName">
                                                        <span class="mb-1 h6">Fulfilled by Company name &nbsp;<span
                                                                class="badge rounded-2 badge-warning bg-label-warning fs-tiny py-1">RECOMMENDED</span></span>
                                                        <br><small class="text-muted">Your product, Our responsibility.<br>
                                                            For a measly fee, we will handle the delivery process for
                                                            you.</small>
                                                    </label>
                                                </div>
                                                <p class="mb-0">See our <a href="javascript:void(0);">Delivery terms and
                                                        conditions</a> for details</p> --}}
                                            </div>
                                        </div>
                                        <!-- Global Delivery Tab -->
                                        <div class="tab-pane fade" id="global-delivery" role="tabpanel">
                                            <h5 class="mb-4">Global Delivery</h5>
                                            <!-- Worldwide delivery -->
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="radio" name="globalDel"
                                                    id="worldwide">
                                                <label class="form-check-label" for="worldwide">
                                                    <span class="mb-1 h6">Worldwide delivery</span>
                                                    <small class="text-muted">Only available with Shipping method:
                                                        <a href="javascript:void(0);">Fulfilled by Company name</a></small>
                                                </label>
                                            </div>
                                            <!-- Global delivery -->
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="radio" name="globalDel" checked>
                                                <label class="form-check-label w-75 pe-5" for="country-selected">
                                                    <span class="mb-2 h6">Selected Countries</span>
                                                    <input type="text" class="form-control"
                                                        placeholder="Type Country name" id="country-selected">
                                                </label>
                                            </div>
                                            <!-- Local delivery -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="globalDel"
                                                    id="local">
                                                <label class="form-check-label" for="local">
                                                    <span class="mb-1 h6">Local delivery</span>
                                                    <small class="text-muted">Deliver to your country of residence :
                                                        <a href="javascript:void(0);">Change profile address</a></small>
                                                </label>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <!-- /Options-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    {{-- <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Inventory</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="ecommerce-product-price">Prodcut Colors</label>
                                <input type="text" class="form-control" id="ecommerce-product-color"
                                    placeholder="Product Color" name="product_color" aria-label="Product color"
                                    value="{{ old('product_color') }}">
                                <span class="error">{{ $errors->first('product_color') }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="ecommerce-product-discount-price">Prodcut Size</label>
                                <input type="text" class="form-control" id="ecommerce-product-size"
                                    placeholder="Prodcut Size" name="product_size" aria-label="Product size"
                                    value="{{ old('product_size') }}">
                                <span class="error">{{ $errors->first('product_size') }}</span>
                            </div>
                        </div>
                    </div> --}}
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Pricing</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="ecommerce-product-price">Base Price</label>
                                <input type="number" class="form-control" id="ecommerce-product-price"
                                    placeholder="Price" name="product_price" aria-label="Product price"
                                    value="{{ old('product_price') }}">
                                <span class="error">{{ $errors->first('product_price') }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="ecommerce-product-discount-price">Sale Price</label>
                                <input type="number" class="form-control" id="ecommerce-product-discount-price"
                                    placeholder="Sale Price" name="product_sale_price" aria-label="Product sale price"
                                    value="{{ old('product_sale_price') }}">
                                <span class="error">{{ $errors->first('product_sale_price') }}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center border-top pt-3">
                                <span class="mb-0 h6">In stock</span>
                                <div class="w-25 d-flex justify-content-end">
                                    <label class="switch switch-primary switch-sm me-4 pe-2">
                                        <input type="checkbox" class="switch-input" checked="" name="in_stock">
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on">
                                                <span class="switch-off"></span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Organize</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 col ecommerce-select2-dropdown">
                                <label class="form-label mb-1" for="vendor">
                                    Vendor
                                </label>
                                <select id="vendor" class="select2 form-select" name="vendor_id"
                                    data-placeholder="Select Vendor">
                                    <option value="">Select Vendor</option>
                                    @foreach ($vendor as $value)
                                        <option value="{{ $value->id }}"
                                            {{ old('sub_category_id') == $value->id ? 'selected' : '' }}>
                                            {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="form-label" for="ecommerce-product-price">Category</label>
                            <div class="mb-3 col ecommerce-select2-dropdown">
                                <select id="category_id" class="select2 form-select" name="category_id"
                                    data-placeholder="Select Category">
                                    <option value="">Select Category</option>
                                    @foreach ($category as $value)
                                        <option value="{{ $value->id }}"
                                            {{ old('category_id') == $value->id ? 'selected' : '' }}>
                                            {{ $value->category_name }}</option>
                                    @endforeach
                                </select>
                                <span class="error">{{ $errors->first('category_id') }}</span>
                            </div>
                            <label class="form-label" for="ecommerce-product-price">Sub Category</label>
                            <div class="mb-3 col ecommerce-select2-dropdown">
                                <select id="sub_category_id" class="select2 form-select" name="sub_category_id"
                                    data-placeholder="Select Sub Category">
                                    <option value="">Select Sub Category</option>
                                    @foreach ($subcategory as $value)
                                        <option value="{{ $value->id }}"
                                            {{ old('sub_category_id') == $value->id ? 'selected' : '' }}>
                                            {{ $value->sub_category_name }}</option>
                                    @endforeach
                                </select>
                                <span class="error">{{ $errors->first('category_id') }}</span>
                            </div>
                            <div class="mb-3 col ecommerce-select2-dropdown">
                                <label class="form-label mb-1" for="status-org">Status
                                </label>
                                <select id="status-org" class="select2 form-select" name="status"
                                    data-placeholder="Select Status">
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                <span class="error">{{ $errors->first('status') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Media Manager</h5>

                </div>
                <div class="modal-body">
                    {{-- <button class="btn btn-sm btn-primary" id="upload-image">Upload</button>
                <button class="btn btn-sm btn-primary">All Files</button> --}}
                    <br><br>
                    <ul class="tabbable nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#all-files"
                                role="tab" aria-controls="product" aria-selected="true"><i
                                    class="feather icon-folder"></i> Upload</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="category-tab" data-toggle="pill" href="#category" role="tab"
                                aria-controls="category-tab" aria-selected="false"><i class="feather icon-folder"></i>
                                All Files</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent" style="padding-inline: 0px !important;">
                        <h4 id="product_title"></h4><br>
                        <div class="tab-pane active" id="all-files" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div data-midia-can_choose="false" style="display: flex; flex-wrap: wrap;gap:0.6rem;"
                                id="media1">
                            </div>
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0 card-title">Media</h5>
                                </div>
                                <div class="dropzone needsclick" id="dropzone-basic-image" enctype="multipart/form-data">
                                    <div class="dz-message needsclick my-5">
                                        <p class="fs-4 note needsclick my-2">Drag and drop your image here</p>
                                        <small class="text-muted d-block fs-6 my-2">or</small>
                                        <span class="note needsclick btn bg-label-primary d-inline" id="btnBrowse">Browse
                                            image</span>
                                    </div>
                                    <div class="fallback imagePreview" id="">
                                        <input name="file[]" type="file" id="image-upload" class="upload-images" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="category" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div data-midia-can_choose="false" style="display: flex; flex-wrap: wrap;gap:0.6rem;"
                                id="media2">
                            </div>
                            <div class="row" id="product_image_clear">
                                @foreach ($productImage as $item)
                                    @if ($item->product_media_image != '')
                                        <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                            <img style="max-width: 100% !important;
                                              height: 170px !important;
                                              width: 100% !important;
                                              border-radius: 10px !important;
                                              object-fit: cover !important;
                                              cursor: pointer;"
                                                src="{{ asset('assets/images/product_images/' . $item->product_media_image) }}"
                                                id="" image-id="{{ $item->id }}"
                                                product_media_image="{{ $item->product_media_image }}"
                                                class="w-100 shadow-1-strong rounded mb-4 img-fluid drag-image"
                                                alt="Boat on Calm Water">

                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="close-modal"
                        data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="imageUpload">Save changes</button>
                </div>
            </div>
        </div>
    </div>


@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    var myDropzone;
    $(document).ready(function() {
        var uploadedFiles;
        var InputName = $('.comment-editor').attr('name', 'your_name');
        var dropzoneBasic
        $("#add-products").submit(function(event) {
            event.preventDefault(); // Prevent the default form submission
            // Select all img elements within the dropzone with class "dropzone"

            var formData = new FormData($(this)[0]);
            if (uploadedFiles != null) {
                for (var i = 0; i < uploadedFiles.length; i++) {
                    formData.append("product_images[]", uploadedFiles[i]);
                }
                var imgElements = $('.dropzone img');
                if (imgElements != null) {
                    imgElements.each(function() {
                        var srcAttributeValue = $(this).attr('src');
                        var imageName = srcAttributeValue.split('/').pop();
                        formData.append("product_images[]", imageName);

                    });
                }
            }
            $.ajax({
                url: $(this).attr("action"),
                type: $(this).attr("method"),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    location.href = baseUrl + 'app/ecommerce/product/list';
                },
                error: function(error) {}
            });
        });
        window.onload = function() {
            const dropzoneBasic = document.getElementById('dropzone-basic');
            if (dropzoneBasic) {
                const myDropzone = new Dropzone(dropzoneBasic, {
                    url: '/your-upload-endpoint',
                    parallelUploads: 1,
                    maxFilesize: 5,
                    acceptedFiles: '.jpg, .jpeg, .png, .gif',
                    addRemoveLinks: true,
                    maxFiles: 6,
                    dictDefaultMessage: 'Drop files here or click to upload',
                    clickable: false, // Prevent opening file dialog on click
                });

                myDropzone.on('success', function(file, response) {
                    console.log('File uploaded successfully:', response);
                });

                myDropzone.on('error', function(file, errorMessage, xhr) {
                    console.error('Error uploading file:', errorMessage);
                });
            }
        };
        $('#category_id').on('change', function(e) {
            var category_id = e.target.value;
            $.ajax({
                url: "{{ route('app-ecommerce-product-get-subcategory') }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    category_id: category_id
                },
                success: function(data) {
                    console.log(data.data);
                    $('#sub_category_id').empty();
                    $.each(data.data, function(index, subcategory) {
                        console.log(subcategory.id);
                        $('#sub_category_id').append('<option value="' + subcategory
                            .id + '">' + subcategory.sub_category_name +
                            '</option>');
                    })
                }
            })
        });
        $('#dropzone-basic').on('click', function(event) {
            event.preventDefault();
            $('#exampleModal').modal('show');
            // window.onload = function() {
            const dropzoneBasic = document.getElementById('dropzone-basic-image');

            if (dropzoneBasic) {
                const myDropzone = new Dropzone(dropzoneBasic, {
                    url: '/your-upload-endpoint',
                    parallelUploads: 1,
                    maxFilesize: 5,
                    acceptedFiles: '.jpg, .jpeg, .png, .gif',
                    addRemoveLinks: true,
                    maxFiles: 6,
                    dictDefaultMessage: 'Drop files here or click to upload',
                });
                myDropzone.on('success', function(file, response) {
                    console.log('File uploaded successfully:', response);
                });

                myDropzone.on('error', function(file, errorMessage, xhr) {
                    console.error('Error uploading file:', errorMessage);
                });
            }
            // };
        });
        $('#close-modal').on('click', function(event) {
            event.preventDefault();
            $('#exampleModal').modal('hide');
        });


        var imageUrls = [];
        $('.drag-image').on('click', function() {
            $(this).toggleClass('active');
            var imageUrl = $(this).attr('src');
            var product_media_image = $(this).attr('product_media_image');
            if ($(this).hasClass('active')) {
                imageUrls.push({
                    image_url: imageUrl,
                    product_media_name: product_media_image
                });
            } else {
                imageUrls = imageUrls.filter(id => id.image_url !== imageUrl);
            }

        });
        // $('.upload-images').on('click', function() {
        //     var selectedFile = $(this)[0].files[0];
        //     console.log(selectedFile);
        //     alert('Selected file: ' + selectedFile.name);
        // });
        $(document).on('click', '#imageUpload', function() {
            dropzoneBasic = document.getElementById('dropzone-basic');
            dropzoneBasic.innerHTML = "";
            if (imageUrls != null) {
                for (var i = 0; i < imageUrls.length; i++) {
                    dropzoneBasic.innerHTML +=
                        `<div class="dz-preview dropzone img dz-file-preview"><div class="dz-details"><div class="dz-thumbnail"><img name="product_imgs" src="${imageUrls[i].image_url}" data-dz-thumbnail><div class="dz-success-mark"></div><div class="dz-error-mark"></div><div ="dz-error-message"><span data-dz-errormessage></span></div></div><div class="dz-filename" data-dz-name></div><div class="dz-size" data-dz-size></div></div></div><input type="text" name="product_imgs[]" ="${imageUrls[i].product_media_name}" style="display:none;">`;
                }
            }

            // if (uploadedFiles != null) {
            if ($('#pills-home-tab')) {
                var dropzone = Dropzone.forElement("#dropzone-basic-image");
                dropzone.processQueue();
                uploadedFiles = dropzone.files;
                for (var i = 0; i < uploadedFiles.length; i++) {
                    dropzoneBasic.innerHTML +=
                        `<div enctype="multipart/form-data" class="dz-preview dz-file-preview"><div class="dz-details"><div class="dz-thumbnail"><img name="" src="${uploadedFiles[i].dataURL}" data-dz-thumbnail><div class="dz-success-mark"></div><div class="dz-error-mark"></div><div class="dz-error-message"><span data-dz-errormessage></span></div></div><div class="dz-filename" data-dz-name></div><div class="dz-size" data-dz-size></div></div></div>`;
                }
            }

            // }
            $('#exampleModal').modal('hide');
        });

    });
</script>

@extends('layouts/layoutMaster')


@section('title', 'Email - Apps')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/jkanban/jkanban.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/typography.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/katex.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/editor.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/tagify/tagify.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />


@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-kanban.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jkanban/jkanban.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/quill/katex.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/quill/quill.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/libs/tagify/tagify.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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

    <form action="{{ url('app/ecommerce/product/store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="app-ecommerce">
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">

                <div class="d-flex flex-column justify-content-center">
                    <h4 class="mb-1 mt-3">Add a new Product</h4>
                    <p class="text-muted">Orders placed across your store</p>
                </div>
                <div class="d-flex align-content-center flex-wrap gap-3">
                    <button type="submit" class="btn btn-primary">Publish product</button>
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
                            <div>
                                <label class="form-label">Description <span class="text-muted">(Optional)</span></label>
                                <textarea name="product_description" class="form-control" id="product_description" cols="30" rows="10">{{ old('product_description') }}</textarea>
                                <span class="error">{{ $errors->first('product_description') }}</span>
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
                            <div class="fallback imagePreview" id="">
                                <input name="file[]" type="file" id="image-upload"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Inventory</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                {{-- {{dd($data->product_color)}} --}}
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
                    </div>
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
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Organize</h5>
                        </div>
                        <div class="card-body">
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
                    <button class="btn btn-sm btn-primary" id="upload-image">Upload</button>
                    <button class="btn btn-sm btn-primary">All Files</button>
                    <br><br>
                    {{-- <section class="p-4 text-center w-100"> --}}
                    <!-- Gallery -->
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
                                        id="" image-id="{{ $item->id }}" product_media_image="{{ $item->product_media_image }}"
                                        class="w-100 shadow-1-strong rounded mb-4 img-fluid drag-image"
                                        alt="Boat on Calm Water">

                                </div>
                            @endif
                        @endforeach
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
                              <input name="file[]" type="file" id="image-upload"/>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    let myDropzone;
    $(function() {
        // $('#imageUpload').on('change', function() {
        //     $('#imagePreview').html('');
        //     var files = $(this)[0].files;
        //     for (var i = 0; i < files.length; i++) {
        //         var reader = new FileReader();
        //         reader.onload = function(e) {
        //             $('#imagePreview').append('<img src="' + e.target.result +
        //                 '" width="80" height="80px" class="me-4 border">');
        //         };
        //         reader.readAsDataURL(files[i]);
        //     }
        // });

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
        });
        $('#close-modal').on('click', function(event) {
            event.preventDefault();
            $('#exampleModal').modal('hide');
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
                });
                myDropzone.on('success', function(file, response) {
                    console.log('File uploaded successfully:', response);
                });

                myDropzone.on('error', function(file, errorMessage, xhr) {
                    console.error('Error uploading file:', errorMessage);
                });
            }
        };
        var imageUrls = [];
        $('.drag-image').on('click', function() {
          $(this).toggleClass('active');
          var imageUrl = $(this).attr('src');
          var product_media_image = $(this).attr('product_media_image');
            if ($(this).hasClass('active')) {
                imageUrls.push({image_url:imageUrl,product_media_name:product_media_image});
            } else {
                imageUrls = imageUrls.filter(id => id.image_url !== imageUrl);
            }
            console.log(imageUrls);

        });
        $('#imageUpload').on('click', function() {
                const dropzoneBasic = document.getElementById('dropzone-basic');
                dropzoneBasic.innerHTML="";
                for (var i = 0; i < imageUrls.length; i++) {
                    // console.log(imageUrls[i].image_url);
                    dropzoneBasic.innerHTML +=
                        `<div class="dz-preview dz-file-preview"><div class="dz-details"><div class="dz-thumbnail"><img name="product_img" src="${imageUrls[i].image_url}" data-dz-thumbnail><div class="dz-success-mark"></div><div class="dz-error-mark"></div><div ="dz-error-message"><span data-dz-errormessage></span></div></div><div class="dz-filename" data-dz-name></div><div class="dz-size" data-dz-size></div></div></div>
                        <input type="text" name="product_img[]" value="${imageUrls[i].product_media_name}" style="display:none;">
                        `;
                }
                $('#exampleModal').modal('hide');
            });
            $('#upload-image').on('click', function() {
              alert("welcome");
              $('#product_image_clear').html("");
              const dropzoneBasic = document.getElementById('dropzone-basic-image');
                dropzoneBasic.innerHTML="";
                    // console.log(imageUrls[i].image_url);
                    dropzoneBasic.innerHTML +=
                        `<div class="dz-preview dz-file-preview"><div class="dz-details"><div class="dz-thumbnail"><img name="product_img" src="" data-dz-thumbnail><div class="dz-success-mark"></div><div class="dz-error-mark"></div><div ="dz-error-message"><span data-dz-errormessage></span></div></div><div class="dz-filename" data-dz-name></div><div class="dz-size" data-dz-size></div></div></div>
                        <input type="text" name="product_img[]" value="" style="display:none;">
                        `;
                // $('#exampleModal').modal('hide');
            });
    });
</script>

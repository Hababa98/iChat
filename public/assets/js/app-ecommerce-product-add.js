/**
 * App eCommerce Add Product Script
 */
'use strict';

//Javascript to handle the e-commerce product add page

(function () {
  // Comment editor

  // ? Start your code from here

  // Basic Dropzone

  // Basic Tags

  const tagifyBasicEl = document.querySelector('#ecommerce-product-color');
  const TagifyBasic = new Tagify(tagifyBasicEl);
  const date = new Date();
  const productDate = document.querySelector('.product-date');
  if (productDate) {
    productDate.flatpickr({
      monthSelectorType: 'static',
      defaultDate: date
    });
  }

  const ecommerce_product_size = document.querySelector('#form-repeater-1-2');
  const product_size = new Tagify(ecommerce_product_size);
  const product_size_date = new Date();
  const productSizeDate = document.querySelector('.product-date');
  if (productSizeDate) {
    productSizeDate.flatpickr({
      monthSelectorType: 'static',
      defaultDate: product_size_date
    });
  }
})();

//Jquery to handle the e-commerce product add page

$(function () {
  // Select2
  var select2 = $('.select2');
  if (select2.length) {
    select2.each(function () {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>').select2({
        dropdownParent: $this.parent(),
        placeholder: $this.data('placeholder') // for dynamic placeholder
      });
    });
  }

  var formRepeater = $('.form-repeater');

  if (formRepeater.length) {
    var row = 2;
    var col = 1;
    formRepeater.on('change', '.select2', function (e) {
      e.preventDefault();
      var selectedText = $(this).find(':selected').text();
      var repeaterItem = $(this).closest('[data-repeater-item]');
      var nameAttribute = selectedText.toLowerCase().replace(/\s+/g, '_');
      var index = repeaterItem.index();
      var attributeNameWithVariant = 'variant_data[' + index + '][' + nameAttribute + ']';
      console.log(nameAttribute);
      repeaterItem
        .find('.form-control')
        .attr('placeholder', 'Enter ' + selectedText)
        .attr('name', attributeNameWithVariant);
    });

    formRepeater.repeater({
      show: function () {
        var fromControl = $(this).find('.form-control, .select2');
        var formLabel = $(this).find('.form-label');

        fromControl.each(function (i) {
          var id = 'form-repeater-' + row + '-' + col;
          $(fromControl[i]).attr('id', id);
          $(formLabel[i]).attr('for', id);
          col++;
        });

        row++;
        $(this).slideDown();
        $('.select2-container').remove();

        $('.select2.form-select').select2({
          placeholder: 'Placeholder text'
        });
        $('.select2-container').css('width', '100%');
        $('.form-repeater:first .form-select').select2({
          placeholder: 'Placeholder text'
        });
      }
    });
  }
});
(function () {
  // Comment editor

  const commentEditor1 = document.querySelector('.comment-editor1');

  const commentEditor = document.querySelector('.comment-editor');
  $('#key_features').val($('#key_features_description').text());
  $('#key_features_description').on('input', function () {
    $('#key_features').val($(this).text());
  });
  if (commentEditor) {
    new Quill(commentEditor, {
      modules: {
        toolbar: '.comment-toolbar'
      },
      placeholder: 'Product Description',
      theme: 'snow'
    });
  }
  $('#product_description').val($('#ecommerce_product_description').text());
  $('#ecommerce_product_description').on('input', function () {
    $('#product_description').val($(this).text());
  });
  if (commentEditor1) {
    new Quill(commentEditor1, {
      modules: {
        toolbar: '.comment-toolbar1'
      },
      placeholder: 'Product Description',
      theme: 'snow'
    });
  }

  // previewTemplate: Updated Dropzone default previewTemplate

  // ! Don't change it unless you really know what you are doing

  const previewTemplate = `<div class="dz-preview dz-file-preview">
<div class="dz-details">
  <div class="dz-thumbnail">
    <img data-dz-thumbnail>
    <span class="dz-nopreview">No preview</span>
    <div class="dz-success-mark"></div>
    <div class="dz-error-mark"></div>
    <div class="dz-error-message"><span data-dz-errormessage></span></div>
    <div class="progress">
      <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress></div>
    </div>
  </div>
  <div class="dz-filename" data-dz-name></div>
  <div class="dz-size" data-dz-size></div>
</div>
</div>`;

  // ? Start your code from here

  // Basic Dropzone

  const dropzoneBasic = document.querySelector('#dropzone-basic');
  if (dropzoneBasic) {
    const myDropzone = new Dropzone(dropzoneBasic, {
      previewTemplate: previewTemplate,
      parallelUploads: 1,
      maxFilesize: 5,
      acceptedFiles: '.jpg,.jpeg,.png,.gif',
      addRemoveLinks: true,
      maxFiles: 1
    });
  }

  // Basic Tags

  const tagifyBasicEl = document.querySelector('#ecommerce-product-tags');
  const TagifyBasic = new Tagify(tagifyBasicEl);

  // Flatpickr

  // Datepicker
  const date = new Date();

  const productDate = document.querySelector('.product-date');

  if (productDate) {
    productDate.flatpickr({
      monthSelectorType: 'static',
      defaultDate: date
    });
  }
})();

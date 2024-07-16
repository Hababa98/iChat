'use strict';
let dt_products;
let dt_products_pending;
let dt_product_completed;
$(function () {
  let borderColor, bodyBg, headingColor;

  if (isDarkStyle) {
    borderColor = config.colors_dark.borderColor;
    bodyBg = config.colors_dark.bodyBg;
    headingColor = config.colors_dark.headingColor;
  } else {
    borderColor = config.colors.borderColor;
    bodyBg = config.colors.bodyBg;
    headingColor = config.colors.headingColor;
  }

  // Variable declaration for table

  var dt_order_table = $('.datatables-store-request'),
    statusObj = {
      1: { title: 'Cancel', class: 'bg-label-danger' },
      2: { title: 'Delivered', class: 'bg-label-success' },
      3: { title: 'Confirmed', class: 'bg-label-primary' }
    },
    paymentObj = {
      1: { title: 'Paid', class: 'text-success' },
      2: { title: 'Pending', class: 'text-warning' },
      3: { title: 'Failed', class: 'text-danger' },
      4: { title: 'Cancelled', class: 'text-secondary' }
    };
  // E-commerce Products datatable

  if (dt_order_table.length) {
    dt_products = dt_order_table.DataTable({
      processing: true,
      serverSide: true,
      pageLength: 10,
      ajax: '/app/ecommerce/store/request/list/data',
      columns: [
        // columns according to JSON
        { data: 'id' },
        { data: 'store_name' },
        { data: 'vendor_request' },
        { data: 'action' } //method_number
      ],
      columnDefs: [
        { visible: false, targets: [0] },
        {
          // Order ID
          targets: 1,
          render: function (data, type, full, meta) {
            var $avatar = full['store_logo'];
            var $output =
              '<img src="' +
              assetsPath +
              'images/store_logo/' +
              full['store_logo'] +
              '" alt="Avatar" class="rounded-circle">';
            var $row_output = '<div class="avatar me-2">' + $output + '</div>';
            return $row_output;
          }
        },
        {
          // Customers
          targets: 2,
          responsivePriority: 1,
          render: function (data, type, full, meta) {
            // For Avatar badge
            // var stateNum = Math.floor(Math.random() * 6);
            // var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
            // var $state = states[stateNum],
            //   $name = full['first_name'] + ' ' + full['last_name'],
            //   $initials = $name.match(/\b\w/g) || [];
            // $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
            // $output = '<span class="avatar-initial rounded-circle bg-label-' + $state + '">' + $initials + '</span>';

            // Creates full output for row
            var $row_output =
              '<div class="d-flex justify-content-start align-items-center order-name text-nowrap">' +
              '<div class="d-flex flex-column">' +
              '<small class="text-muted" style="line-height: 20px;"><b>Name: </b>' +
              full['store_name'] +
              '</small>' +
              '<small class="text-muted" style="line-height: 20px;"><b>Email: </b>' +
              full['email'] +
              '</small>' +
              '<small class="text-muted" style="line-height: 20px;"><b>Mobile: </b>' +
              full['mobile'] +
              '</small>' +
              '<small class="text-muted" style="line-height: 20px;"><b>Address: </b> ' +
              full['store_address'] +
              '</small>' +
              '</div>' +
              '</div>';
            return $row_output;
          }
        },
        // {
        //   targets: 4,
        //   render: function (data, type, full, meta) {
        //     var payment_mode = full.payment_mode;
        //     if (payment_mode == 'Stripe') {
        //       return '<span class="badge px-2 bg-label-success text-nowrap">' + payment_mode + '</span>';
        //     } else if (payment_mode == 'cod') {
        //       return '<span class="badge px-2 bg-label-warning text-nowrap">' + payment_mode + '</span>';
        //     } else if (payment_mode == 'Razorpay') {
        //       return '<span class="badge px-2 bg-label-primary text-nowrap">' + payment_mode + '</span>';
        //     } else if (payment_mode == 'card') {
        //       return '<span class="badge px-2 bg-label-info text-nowrap">' + payment_mode + '</span>';
        //     }
        //   }
        // },
        {
          targets: 3,
          render: function (data, type, full, meta) {
            return '<span class="text-nowrap">' + full['vendor_id'] + '</span>';
          }
        },
        {
          // Status
          targets: 4,
          render: function (data, type, full, meta) {
            var $vendor_request = full['vendor_request'] ? 'Accepted' : 'Not Accepted';
            return '<span class="badge px-2 bg-label-success" text-capitalized>' + $vendor_request + '</span>';
          }
        },

        {
          // Actions
          targets: 5,
          title: 'Actions',
          searchable: false,
          orderable: false,
          render: function (data, type, full, meta) {
            var url = 'app/ecommerce/order/details/' + full.orders_id;
            return (
              '<div class="d-inline-block text-nowrap">' +
              '<button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded me-2"></i></button>' +
              '<div class="dropdown-menu dropdown-menu-end m-0">' +
              '<a href="javascript:0;" class="dropdown-item" id="request-accepted-' +
              full.id +
              '" onclick="acceptRequest(' +
              full.id +
              ')">Yes</a>' +
              // '<a href="javascript:0;" class="dropdown-item">No</a>' +
              '</div>' +
              '</div>'
            );
          }
        }
      ],
      order: [0, 'desc'], //set any columns order asc/desc
      dom:
        '<"card-header d-flex flex-column flex-md-row align-items-start align-items-md-center"<"ms-n2"f><"d-flex align-items-md-center justify-content-md-end mt-2 mt-md-0"l<"dt-action-buttons"B>>' +
        '>t' +
        '<"row mx-2"' +
        '<"col-sm-12 col-md-6"i>' +
        '<"col-sm-12 col-md-6"p>' +
        '>',
      lengthMenu: [10, 40, 60, 80, 100], //for length of menu
      language: {
        sLengthMenu: '_MENU_',
        search: '',
        searchPlaceholder: 'Search Order',
        info: 'Displaying _START_ to _END_ of _TOTAL_ entries'
      },

      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Details of ' + data['customer'];
            }
          }),
          type: 'column',
          renderer: function (api, rowIdx, columns) {
            var data = $.map(columns, function (col, i) {
              return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                ? '<tr data-dt-row="' +
                    col.rowIndex +
                    '" data-dt-column="' +
                    col.columnIndex +
                    '">' +
                    '<td>' +
                    col.title +
                    ':' +
                    '</td> ' +
                    '<td>' +
                    col.data +
                    '</td>' +
                    '</tr>'
                : '';
            }).join('');

            return data ? $('<table class="table"/><tbody />').append(data) : false;
          }
        }
      }
    });
    $('.dataTables_length').addClass('mt-0 mt-md-3 me-3');
    $('.dt-action-buttons').addClass('pt-0');
    // To remove default btn-secondary in export buttons
    $('.dt-buttons > .btn-group > button').removeClass('btn-secondary');
  }

  // Delete Record
  $('.datatables-order tbody').on('click', '.delete-record', function () {
    dt_products.row($(this).parents('tr')).remove().draw();
  });

  // Filter form control to default size
  // ? setTimeout used for multilingual table initialization
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm');
  }, 300);
});
function deleteOrder(id) {
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert order!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, Delete order!',
    customClass: {
      confirmButton: 'btn btn-primary me-2',
      cancelButton: 'btn btn-label-secondary'
    },
    buttonsStyling: false
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        url: baseUrl + 'app/ecommerce/order/delete/' + id,
        type: 'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function () {
          Swal.fire({
            icon: 'success',
            title: 'Deleted!',
            text: 'Order has been removed.',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
          location.href = baseUrl + 'app/ecommerce/order/list';
        }
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      Swal.fire({
        title: 'Cancelled',
        text: 'Cancelled Delete :)',
        icon: 'error',
        customClass: {
          confirmButton: 'btn btn-success'
        }
      });
    }
  });
}
function acceptRequest(id) {
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert product!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, Accepted Request!',
    customClass: {
      confirmButton: 'btn btn-primary me-2',
      cancelButton: 'btn btn-label-secondary'
    },
    buttonsStyling: false
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        url: baseUrl + 'app/ecommerce/store/request/accepted/' + id,
        type: 'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
          // $('#request-accepted-' + data.id).remove();
          // document.getElementById('#request-accepted-' + data.id).remove();
          console.log('request-accepted-' + data.id);
          var parentTr = $('#request-accepted-' + data.id).closest('tr');
          parentTr.remove();
          // var element = document.getElementById('request-accepted-' + data.id);
          // if (element) {
          //   alert('asfd');
          //   element.remove();
          // }
          Swal.fire({
            icon: 'success',
            title: 'Accepted!',
            text: 'Request accepted successfully.',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        }
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      Swal.fire({
        title: 'Cancelled',
        text: 'Cancelled Delete :)',
        icon: 'error',
        customClass: {
          confirmButton: 'btn btn-success'
        }
      });
    }
  });
}

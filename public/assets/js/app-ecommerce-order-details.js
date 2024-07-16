/**

 * app-ecommerce-order-details Script

 */



'use strict';




//sweet alert

(function () {

  const deleteOrder = document.querySelector('.delete-order');

  // Suspend User javascript

  if (deleteOrder) {

    deleteOrder.onclick = function () {

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

          Swal.fire({

            icon: 'success',

            title: 'Deleted!',

            text: 'Order has been removed.',

            customClass: {

              confirmButton: 'btn btn-success'

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

    };

  }



  //for custom year

  function getCurrentYear() {

    var currentYear = new Date().getFullYear();

    return currentYear;

  }



  var year = getCurrentYear();

  document.getElementById('orderYear').innerHTML = year;

})();
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


(function () {

  $('#submit').on('click', function (e) {
    var is_status = $('#is_status').val();

    var order_id = $('#order_id').val();

    console.log(order_id);

    $.ajax({

      url: baseUrl + 'app/ecommerce/order/status',

      type: 'POST',

      headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

      },

      data: {

        is_status: is_status,

        order_id: order_id

      },

      success: function (data) {
        Swal.fire({
          icon: 'success',
          // title: 'Deleted!',
          text: data.message,
          customClass: {
            confirmButton: 'btn btn-success'
          }
        });
        location.reload();

      }

    });

  });

})();

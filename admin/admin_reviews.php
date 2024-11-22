<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel - Manage Reviews</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <?php require('inc/links.php'); ?>
</head>

<body class="bg-light">
  <?php require('inc/header.php'); ?>
  <div class="container-fluid" id="main-content">
    <div class="row">
      <div class="col-lg-10 ms-auto p-4 overflow-hidden">
        <h4 class="mb-4">Manage Reviews</h4>

        <div class="card border-0 shadow-sm mb-4">
          <div class="card-body">
            <div class="text-end mb-4">
              <a class="btn btn-danger rounded-pill shadow-none btn-sm">
                <i class="bi bi-trash3-fill"></i> Delete All
              </a>
            </div>

            <div class="table-responsive-md" style="height: 450px; overflow-y: auto;">
              <table id="reviewsTable" class="table table-hover border">
                <thead class="sticky-top bg-dark">
                  <tr>
                    <th class="text-white" scope="col">#</th>
                    <th class="text-white" scope="col">Reviewer Name</th>
                    <th class="text-white" scope="col">Review</th>
                    <th class="text-white" scope="col">Rating</th>
                    <th class="text-white" scope="col">Date</th>
                    <th class="text-white" scope="col">Visibility</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>

                </tbody>
              </table>
            </div>
            <div class="text-end mt-3">
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    $(document).ready(function () {
      function getStars(rating) {
        let stars = '';
        for (let i = 1; i <= 5; i++) {
          if (i <= rating) {
            stars += '★';
          } else {
            stars += '☆';
          }
        }
        return stars;
      }
      $.ajax({
        url: './inc/getReviews.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
          let rows = '';
          $.each(data, function (index, review) {
            let isVisible = review.visible == 'true' ? 'checked' : '';
            let stars = getStars(review.rate);
            rows += `<tr>
                    <td>${review.review_id}</td>
                    <td>${review.firstName} ${review.lastName}</td>
                    <td>${review.review}</td>
                    <td>${stars}</td>
                    <td>${review.date}</td>
                    <td>
                        <div class='form-check form-switch'>
                            <input class='form-check-input visibility-toggle' type='checkbox' id='visibility-${review.review_id}' data-review-id='${review.review_id}' ${isVisible}>
                            <label class='form-check-label' for='visibility-${review.review_id}'>${review.visible ? 'Visible' : 'Hidden'}</label>
                        </div>
                    </td>
                </tr>`;
          });
          $('#reviewsTable tbody').html(rows);
        },
        error: function (xhr, status, error) {
          console.error("Error fetching reviews:", error);
        }
      });
      $(document).on('change', '.visibility-toggle', function () {
        const reviewId = $(this).data('review-id'); 
        const visible_ba = $(this).is(':checked'); 
        const data = {
          id: reviewId,
          visible: visible_ba ? 'true' : 'false' 
        };
        $.ajax({
          url: './inc/updateReview.php',
          type: 'POST',
          data: data,
          success: function (response) {
            alert('Update successful:', response);
          },
          error: function (xhr, status, error) {
            console.error('Update failed:', error);
          }
        });
      });
    });
  </script>

</body>

</html>
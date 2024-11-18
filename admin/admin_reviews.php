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
              <table class="table table-hover border">
                <thead class="sticky-top bg-dark text-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Reviewer Name</th>
                    <th scope="col">Review</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Date</th>
                    <th scope="col">Visibility</th>
                  </tr>
                </thead>
                <tbody id="reviewsTable">
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
      $.ajax({
        url: './inc/getReviews.php', // URL to the PHP script
        type: 'GET',
        dataType: 'json',
        success: function (data) {
          let rows = '';
          console.log(data);
          $('#reviewsTable').empty();
          $.each(data, function (index, review) {
            let isVisible = review.visible ? 'checked' : '';
            console.log(review);
            rows += `<tr>
                    <td>${index + 1}</td>
                    <td>${review.firstName} ${review.lastName}</td>
                    <td>${review.review}</td>
                    <td>${review.rate}</td>
                    <td>${review.date}</td>
                    <td>
                        <div class='form-check form-switch'>
                            <input class='form-check-input visibility-toggle' type='checkbox' id='visibility-${review.review_id}' data-review-id='${review.id}' ${isVisible}>
                            <label class='form-check-label' for='visibility-${review.review_id}'>${review.visible ? 'Visible' : 'Hidden'}</label>
                        </div>
                    </td>
                </tr>`;
          });
          $('#reviewsTable').html(rows);
        },
        error: function (xhr, status, error) {
          console.error("Error fetching reviews:", error);
        }
      });
    });

    document.querySelectorAll('.visibility-toggle').forEach(toggle => {

      const label = toggle.nextElementSibling;
      toggle.addEventListener('change', () => {
        const reviewId = toggle.getAttribute('data-review-id');
        const visibility = toggle.checked ? 'visible' : 'hidden';


        label.textContent = toggle.checked ? 'Visible' : 'Hidden';

        console.log(`Review ID: ${reviewId}, New Visibility: ${visibility}`);
      });
    });

  </script>

</body>

</html>
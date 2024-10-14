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
                <tbody>

                  <tr>
                    <td>1</td>
                    <td>Juan Dela Cruz</td>
                    <td>This is a fantastic product!</td>
                    <td>★★★★★</td>
                    <td>2024-10-01</td>
                    <td>
                    <div class="form-check form-switch">
                        <input class="form-check-input visibility-toggle" type="checkbox" data-review-id="1" checked>
                        <label class="form-check-label" for="flexSwitchCheckDefault1">Visible</label>
                        <button class="btn btn-danger ms-3">Delete</button> 
                    </div>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Jane Smith</td>
                    <td>Not as good as expected.</td>
                    <td>★★★☆☆</td>
                    <td>2024-09-28</td>
                    <td>
                      <div class="form-check form-switch">
                        <input class="form-check-input visibility-toggle" type="checkbox" data-review-id="2">
                        <label class="form-check-label" for="flexSwitchCheckDefault2">Hidden</label>
                        <button class="btn btn-danger ms-3">Delete
                        
                        </button>
                      </div>
                    </td>
                  </tr>

                </tbody>
              </table>
            </div>

            <div class="text-end mt-3">
              <button class="btn btn-dark rounded-pill shadow-none btn-sm" id="save-button">
                <i class="bi bi-save"></i> Save Changes
              </button>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>

    document.querySelectorAll('.visibility-toggle').forEach(toggle => {

      const label = toggle.nextElementSibling; 
      toggle.addEventListener('change', () => {
        const reviewId = toggle.getAttribute('data-review-id');
        const visibility = toggle.checked ? 'visible' : 'hidden';
        

        label.textContent = toggle.checked ? 'Visible' : 'Hidden';
        
        console.log(`Review ID: ${reviewId}, New Visibility: ${visibility}`);
      });
    });


    document.getElementById('save-button').addEventListener('click', () => {
      const visibilityChanges = [];
      document.querySelectorAll('.visibility-toggle').forEach(toggle => {
        const reviewId = toggle.getAttribute('data-review-id');
        const visibility = toggle.checked ? 'visible' : 'hidden';
        visibilityChanges.push({ reviewId, visibility });
      });


      console.log('Saving changes:', visibilityChanges);
      alert('Changes saved successfully!');
    });
  </script>

</body>
</html>

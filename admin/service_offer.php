<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Services & Offers</title>
  <?php require('inc/links.php'); ?>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* General Styles */
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
    }

    .bg-container {
      background: linear-gradient(45deg, #ff7e5f, #feb47b);
      padding: 20px;
      border-radius: 10px;
      text-align: center;
      color: white;
    }

    h1 {
      font-size: 1.5rem;
    }

    /* Category List */
    .category-list {
      display: flex;
      gap: 0.5rem;
      flex-wrap: wrap;
    }

    .category-item {
      background-color: #ffffff;
      border: 1px solid #ddd;
      border-radius: 20px;
      padding: 0.5rem 1rem;
      font-size: 0.9rem;
      color: #333;
      cursor: pointer;
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .category-item:hover {
      background-color: #ff7e5f;
      color: white;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .category-item .btn-container {
      display: none;
      margin-top: 0.5rem;
    }

    .category-item:hover .btn-container {
      display: flex;
      gap: 0.5rem;
    }

    /* Service Grid */
    .service-item {
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      padding: 10px;
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .service-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .service-item img {
      width: 100%;
      max-width: 120px;
      height: 90px;
      object-fit: cover;
      border-radius: 8px;
      margin-bottom: 10px;
    }

    .service-item p {
      font-size: 0.9rem;
      font-weight: bold;
      color: #333;
      margin: 0.5rem 0;
    }

    .form-check-label {
      font-size: 0.8rem;
    }

    /* Buttons */
    .btn-container .btn {
      font-size: 0.8rem;
      padding: 0.3rem 0.5rem;
    }

    .btn-primary {
      background-color: #ff7e5f;
      border: none;
      transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #feb47b;
    }

    .btn-outline-secondary {
      border-color: #ff7e5f;
      color: #ff7e5f;
      transition: all 0.3s ease;
    }

    .btn-outline-secondary:hover {
      background-color: #ff7e5f;
      color: white;
    }

    /* Modals */
    .modal-header {
      background-color: #ff7e5f;
      color: white;
    }

    .modal-footer .btn-primary {
      background-color: #ff7e5f;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
      .category-list {
        flex-direction: column;
      }

      .category-item {
        text-align: center;
        width: 100%;
      }
    }

    /* Custom Layout for Left Side Buttons */
    .left-align {
      display: flex;
      justify-content: flex-start;
      align-items: center;
      gap: 1rem;
    }
  </style>
</head>

<body>
  <?php require('inc/header.php'); ?>

  <!-- Main Container -->
  <div class="container my-4">

    <!-- Background Banner -->
    <div class="bg-container mb-4">
      <h1>Admin Services & Offers</h1>
    </div>

    <!-- Categories Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div class="category-list" id="category-list">
        <div class="category-item" id="category-grooming">
          Grooming
          <div class="btn-container">
            <button class="btn btn-outline-secondary btn-sm"
              style="background-color: #f0f0f0; color: #333; border: 2px solid #ddd;">Edit</button>
            <button class="btn btn-outline-danger btn-sm"
              style="background-color: #ff4d4d; color: white; border: 2px solid #ff1a1a;">Delete</button>

          </div>
        </div>
        <div class="category-item" id="category-spa">
          Spa
          <div class="btn-container">
            <button class="btn btn-outline-secondary btn-sm"
              style="background-color: #f0f0f0; color: #333; border: 2px solid #ddd;">Edit</button>
            <button class="btn btn-outline-danger btn-sm"
              style="background-color: #ff4d4d; color: white; border: 2px solid #ff1a1a;">Delete</button>

          </div>
        </div>
      </div>
      <div>
        <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Add
          Category</button>
        <h6 class="mt-2">Total Categories: <span id="total-categories">0</span></h6>
      </div>
    </div>

    <!-- Services Section -->
    <div class="left-align mb-4">
      <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addServiceModal">Add
        Service</button>
      <h6 class="mt-2">Total Services: <span id="total-services">0</span></h6>
    </div>

    <!-- Services Container -->
    <div id="item-list" class="row g-3" id="services-container">

      <!-- Services Grid -->
      <div class="col-md-4 service-grooming">
        <div id="item-service" class="service-item">
          <img src="dog-grooming.jpg" onerror="this.onerror=null; this.src='placeholder-image.png';"
            alt="Service Image">
          <p>Dog Grooming</p>
          <p>Full grooming for dogs</p>
          <p>$30</p>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="appointment-required-dog-grooming">
            <label class="form-check-label" for="appointment-required-dog-grooming">Appointment Required</label>
          </div>
          <div class="btn-container mt-2">
            <button class="btn btn-outline-secondary btn-sm">Edit</button>
            <button class="btn btn-outline-danger btn-sm">Delete</button>
          </div>
        </div>
      </div>



    </div>

    <!-- Add Category Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="add-category-form" method="post" action="./inc/addCategory.php">
              <div class="mb-3">
                <label for="category-name" class="form-label">Category Name</label>
                <input name="category_name" type="text" class="form-control" id="category-name" required>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Category</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Add Service Modal -->
    <div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addServiceModalLabel">Add Service</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="add-service-form" method="post" action="./inc/addService.php" enctype="multipart/form-data">
              <input type="hidden" name="idCategory" id="category_id">
              <div class="mb-3">
                <label for="service-name" class="form-label">Service Name</label>
                <input type="text" class="form-control" name="service_name" id="service-name" required>
              </div>
              <div class="mb-3">
                <label for="service-description" class="form-label">Description</label>
                <textarea class="form-control" name="service_description" id="service-description" rows="3"
                  required></textarea>
              </div>
              <div class="mb-3">
                <label for="service-price" class="form-label">Price</label>
                <input type="number" class="form-control" name="service_price" id="service-price" required>
              </div>
              <div class="mb-3">
                <label for="service-price" class="form-label">Image</label>
                <input type="file" class="form-control" name="service_image" id="service-image" required>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Service</button>
          </div>
        </div>
        </form>
      </div>
    </div>


    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="edit-category-form">
              <div class="mb-3">
                <label for="edit-category-name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="edit-category-name" required>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit Service Modal -->
    <div class="modal fade" id="editServiceModal" tabindex="-1" aria-labelledby="editServiceModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editServiceModalLabel">Edit Service</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="edit-service-form">
              <div class="mb-3">
                <label for="edit-service-name" class="form-label">Service Name</label>
                <input type="text" class="form-control" id="edit-service-name" required>
              </div>
              <div class="mb-3">
                <label for="edit-service-description" class="form-label">Description</label>
                <textarea class="form-control" id="edit-service-description" rows="3" required></textarea>
              </div>
              <div class="mb-3">
                <label for="edit-service-price" class="form-label">Price</label>
                <input type="number" class="form-control" id="edit-service-price" required>
              </div>
              <div class="mb-3">
                <label for="edit-service-image" class="form-label">Image</label>
                <input type="file" class="form-control" id="edit-service-image">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>
        </div>
      </div>
    </div>
    <div id="alert" class="alert alert-success" role="alert">
      A simple success alert—check it out!
    </div>
    <script>
      $(document).ready(function () {
        const url = window.location.href;
        const urlParams = new URLSearchParams(window.location.search);
        let error = urlParams.get("error");
        let alertText;
        switch (error) {
          case 'UnknownError':
            alertText = 'An unknown error has occurred.';
            break;
          case 'InputMissing':
            alertText = 'Please fill in all required fields.';
            break;
          case 'none':
            alertText = 'Success';
            break;
          case 'FailedToExecute':
            alertText = 'The operation failed to execute.';
            break;
          default:
            $('#alert').hide();
        }

        $('#alert').text(alertText);

        setTimeout(function () {
          $('#alert').fadeOut('slow');
        }, 1000);
        function loadCategories() {
          $.ajax({
            url: './inc/getCategories.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
              $('#category-list').empty();
              console.log(data);
              $('#total-categories').text(data.length)
              var categoryHTML = '';
              if (data.length === 0) {
                console.log("ahaha");
              } else {
                $.each(data, function (index, category) {
                  categoryHTML =
                    `
            <div class="category-item" data-id="${category.category_id}">
              ${category.category_name}
              <div class="btn-container">
                <button data-id="${category.category_id}" class="btn-edit btn btn-outline-secondary btn-sm" style="background-color: #f0f0f0; color: #333; border: 2px solid #ddd;">Edit</button>
                <button data-id="${category.category_id}" class="btn-delete btn btn-outline-danger btn-sm" style="background-color: #ff4d4d; color: white; border: 2px solid #ff1a1a;">Delete</button>
              </div>
            </div>
          `;
                  $('#category-list').append(categoryHTML);
                });
              }
              $('.btn-delete').click(function () {
                var id = $(this).data('id');
                $.ajax({
                  url: './inc/deleteCategory.php',
                  type: 'POST',
                  data: { id: id },
                  success: function (response) {
                    if (response.length === 0) {
                      loadCategories();
                      $('#alert').text("Successfully Deleted")
                      $('#alert').show();
                      setTimeout(function () {
                        $('#alert').fadeOut('slow');
                      }, 1000);
                    }
                  }
                });
              });
            }
          });
        }
        $(document).on('click', '.category-item', function () {
          var id = $(this).data('id');
          $('#category_id').val(id);
          $.ajax({
            url: './inc/fetchServices.php',
            type: 'POST',
            data: { category_id: id },
            success: function (data) {
              if (typeof data === 'string') {
                try {
                  data = JSON.parse(data);
                } catch (e) {
                  console.error('JSON parsing error:', e);
                  console.error('Response received:', data);
                  return;
                }
              }
              $('#item-list').empty();
              data.forEach(function (service) {
                console.log(service);
                var serviceHTML = `
                        <div class="col-md-4 service-grooming">
                          <div id="item-service" class="service-item">
                            <img src="dog-grooming.jpg" onerror="this.onerror=null; this.src='placeholder-image.png';"
                              alt="Service Image">
                            <p>${service.name}</p>
                            <p>${service.description}</p>
                            <p>₱${service.price}</p>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="appointment-required-${service.id}" ${service.visibility ? 'checked' : ''}>
                                <label class="form-check-label toggle-service" for="appointment-required-${service.id}">Appointment Required</label>
                            </div>
                            <div class="btn-container mt-2">
                              <button data-id="${service.id}" class="btn btn-outline-secondary btn-sm">Edit</button>
                              <button data-id="${service.id}" class="btn btn-outline-danger btn-sm">Delete</button>
                            </div>
                          </div>
                        </div>
                `;
                $('#item-list').append(serviceHTML);
                if (!service.visibility) {
                  $(`#appointment-required-${service.id}`).prop('checked', false);
                }
                $('#toggle-visibility-button').on('click', function () {
                  service.visibility = !service.visibility; // Toggle visibility
                  $(`#appointment-required-${service.id}`).prop('checked', service.visibility);
                });
              });
            },
            error: function (xhr, status, error) {
              console.error('AJAX Error:', status, error);
            }
          });
        });
        $(document).on('change', '.toggle-service', function () {
          var serviceId = $(this).data('id');
          var isVisible = $(this).is(':checked') ? 'true' : 'false';
          $.ajax({
            url: './inc/updateService.php',
            type: 'POST',
            data: {
              service_id: serviceId,
              visible: isVisible
            },
            success: function(response) {
            console.log("Success");
          },
            error: function (xhr, status, error) {
              alert('Update failed:', error);
              window.location.reload();
            }
        });
      });
      loadCategories();
      });

      // Handle Edit for Categories
      document.addEventListener('click', function (e) {
        // Open Edit Category Modal
        if (e.target && e.target.matches('.category-item .btn-outline-secondary')) {
          const categoryItem = e.target.closest('.category-item');
          const categoryName = categoryItem.firstChild.textContent.trim();

          const editCategoryNameInput = document.getElementById('edit-category-name');
          editCategoryNameInput.value = categoryName;

          const saveCategoryButton = document.querySelector('#editCategoryModal .btn-primary');
          saveCategoryButton.onclick = function () {
            const updatedName = editCategoryNameInput.value.trim();
            if (updatedName) {
              categoryItem.firstChild.textContent = updatedName + " ";
              const modal = bootstrap.Modal.getInstance(document.getElementById('editCategoryModal'));
              modal.hide();
            }
          };

          const editCategoryModal = new bootstrap.Modal(document.getElementById('editCategoryModal'));
          editCategoryModal.show();
        }
      });

      // Handle Edit for Services
      document.addEventListener('click', function (e) {
        if (e.target && e.target.matches('.service-item .btn-outline-secondary')) {
          const serviceItem = e.target.closest('.service-item');
          const serviceName = serviceItem.querySelector('p:nth-child(2)').textContent;
          const serviceDescription = serviceItem.querySelector('p:nth-child(3)').textContent;
          const servicePrice = serviceItem.querySelector('p:nth-child(4)').textContent.replace('$', '');

          // Set current service details in the modal
          document.getElementById('edit-service-name').value = serviceName;
          document.getElementById('edit-service-description').value = serviceDescription;
          document.getElementById('edit-service-price').value = servicePrice;

          // Save changes when "Save Changes" is clicked
          const saveServiceButton = document.querySelector('#editServiceModal .btn-primary');
          saveServiceButton.onclick = function () {
            const updatedName = document.getElementById('edit-service-name').value.trim();
            const updatedDescription = document.getElementById('edit-service-description').value.trim();
            const updatedPrice = document.getElementById('edit-service-price').value.trim();

            if (updatedName && updatedDescription && updatedPrice) {
              // Update the service item visually
              serviceItem.querySelector('p:nth-child(2)').textContent = updatedName;
              serviceItem.querySelector('p:nth-child(3)').textContent = updatedDescription;
              serviceItem.querySelector('p:nth-child(4)').textContent = `$${updatedPrice}`;

              const modal = bootstrap.Modal.getInstance(document.getElementById('editServiceModal'));
              modal.hide();
            }
          };

          // Show the Edit Service Modal
          const editServiceModal = new bootstrap.Modal(document.getElementById('editServiceModal'));
          editServiceModal.show();
        }
      });
    </script>

    <?php require('inc/scripts.php'); ?>
</body>

</html>
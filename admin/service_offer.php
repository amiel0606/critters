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
    /* General Styling for Dropdown Item */
.dropdown-item {
  padding: 10px 15px;
  transition: background-color 0.2s ease;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.dropdown-item:hover {
  background-color: #f8f9fa; /* Light gray on hover */
}

/* Category Name Styling */
.category-ito {
  font-size: 14px;
  font-weight: 500;
  color: #333;
  text-decoration: none;
  flex-grow: 1;
}

/* Action Buttons Group */
.action-buttons {
  display: flex;
  gap: 8px; /* Space between buttons */
  justify-content: flex-end;
}

/* Button Styling */
.btn-sm {
  font-size: 12px;
  padding: 5px 8px;
}

/* Edit Button */
.btn-outline-primary {
  border-color: #007bff;
  color: #007bff;
}

.btn-outline-primary:hover {
  background-color: #007bff;
  color: #fff;
}

/* Delete Button */
.btn-outline-danger {
  border-color: #dc3545;
  color: #dc3545;
}

.btn-outline-danger:hover {
  background-color: #dc3545;
  color: #fff;
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
      max-width: 200px;
    }

    .btn-outline-secondary:hover {
      background-color: #ff7e5f;
      color: white;
      max-width: 200px;
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
      <div class="dropdown">
        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="categoryDropdown"
          data-bs-toggle="dropdown" aria-expanded="false">
          Select Category
        </button>
        <ul class="dropdown-menu" aria-labelledby="categoryDropdown" id="category-list">
          <li><a class="dropdown-item"  id="category-grooming">Grooming</a></li>
          <li><a class="dropdown-item"  id="category-spa">Spa</a></li>
        </ul>
      </div>
      <div>
        <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Add
          Category</button>
        <h6 class="mt-2"><span id="total-categories">0</span></h6>
      </div>
    </div>
    <!-- Services Section -->
    <div id="service-hide" class="left-align mb-4">
      <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addServiceModal">Add
        Service</button>
      <h6 class="mt-2">Total Services: <span id="total-services">0</span></h6>
    </div>

    <!-- Services Container -->
    <div style="display: none;" id="item-list" class="row g-3" id="services-container">

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
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Category</button>
            </form>
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
                <label for="service-image" class="form-label">Image</label>
                <input type="file" class="form-control" name="service_image" id="service-image" required>
              </div>
              <div class="mb-3">
                <label for="service-category" class="form-label">Select Category</label>
                <select class="form-control" name="service_category" id="service-category" required>
                  <option value="" disabled selected>Select a category</option>
                  <option value="grooming">Grooming</option>
                  <option value="spa">Spa</option>
                  <option value="training">Training</option>
                  <option value="health">Health</option>
                  <option value="boarding">Boarding</option>
                </select>
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
            <form action="./inc/editCategories.php" method="POST" id="edit-category-form">
              <input type="hidden" name="edit-category-id" id="edit-category-id">
              <div class="mb-3">
                <label for="edit-category-name" class="form-label">Category Name</label>
                <input type="text" class="form-control" name="edit-category-name" id="edit-category-name" required>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
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
            <form id="edit-service-form" method="POST" action="./inc/editService.php" enctype="multipart/form-data">
              <input type="hidden" name="service_id" id="service_id">
              <div class="mb-3">
                <label for="edit-service-name" class="form-label">Service Name</label>
                <input type="text" class="form-control" name="edit-service-name" id="edit-service-name" required>
              </div>
              <div class="mb-3">
                <label for="edit-service-description" class="form-label">Description</label>
                <textarea class="form-control" name="edit-service-description" id="edit-service-description" rows="3"
                  required></textarea>
              </div>
              <div class="mb-3">
                <label for="edit-service-price" class="form-label">Price</label>
                <input type="number" class="form-control" name="edit-service-price" id="edit-service-price" required>
              </div>
              <div class="mb-3">
                <label for="edit-service-image" class="form-label">Image</label>
                <input type="file" class="form-control" name="edit-service-image" id="edit-service-image">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div style="display: none;" id="alert" class="alert alert-success" role="alert">
      A simple success alert—check it out!
    </div>
    <script>
  $(document).ready(function() {
      loadCategories(); 
      $(document).on('click', function (event) {
        if (!$(event.target).closest('.dropdown').length) {
          $('.dropdown-menu').removeClass('show');
        }
      });
      $('#service-hide').hide();
      $('#item-list').hide();
      $('#item-list').empty();
      const url = window.location.href;
      const urlParams = new URLSearchParams(window.location.search);
      let error = urlParams.get("error");
      let alertText;
      switch (error) {
        case 'UnknownError':
          alertText = 'An unknown error has occurred.';
          $('#alert').removeClass('alert-info');
          $('#alert').addClass('alert-danger');
          $('#alert').text(alertText);
          $('#alert').show();
          setTimeout(function () {
            $('#alert').fadeOut('slow');
          }, 3000);
          break;
        case 'InputMissing':
          alertText = 'Please fill in all required fields.';
          $('#alert').removeClass('alert-info');
          $('#alert').addClass('alert-warning');
          $('#alert').text(alertText);
          $('#alert').show();
          setTimeout(function () {
            $('#alert').fadeOut('slow');
          }, 3000);
          break;
        case 'none':
          alertText = 'Success';
          $('#alert').removeClass('alert-info');
          $('#alert').addClass('alert-success');
          $('#alert').text(alertText);
          $('#alert').show();
          setTimeout(function () {
            $('#alert').fadeOut('slow');
          }, 3000);
          break;
        case 'FailedToExecute':
          alertText = 'The operation failed to execute.';
          $('#alert').removeClass('alert-info');
          $('#alert').addClass('alert-danger');
          $('#alert').text(alertText);
          $('#alert').show();
          setTimeout(function () {
            $('#alert').fadeOut('slow');
          }, 3000);
          break;
        default:
          alertText = 'Please Select A Category';
          $('#alert').removeClass('alert-success');
          $('#alert').addClass('alert-info');
          $('#alert').text(alertText);
          $('#alert').show();
      }
      function loadCategories() {
        $.ajax({
          url: './inc/getCategories.php',
          type: 'GET',
          dataType: 'json',
          success: function (data) {
            $('#category-list').empty(); 
            console.log(data);
            $('#total-categories').text("Total categories: " + data.length);

            if (data.length === 0) {
              console.log("No categories found");
              $('#category-list').append('<li><a class="dropdown-item" >No categories available</a></li>');
            } else {
              $.each(data, function (index, category) {
                var categoryHTML = `
          
                    <li class="dropdown-item d-flex justify-content-between align-items-center">
  <a class="category-ito" data-id="${category.category_id}">${category.category_name}</a>
  <div class="action-buttons">
    <button class="btn btn-sm btn-outline-primary edit-btn" data-id="${category.category_id}">Edit</button>
    <button class="btn btn-sm btn-outline-danger delete-btn" data-id="${category.category_id}">Delete</button>
  </div>
</li>

              `;
                $('#category-list').append(categoryHTML); 
              });
            }
          },
          error: function (xhr, status, error) {
            console.error("Error loading categories: ", error);
          }
        });
      }
      $(document).on('click', '.category-ito', function () {
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
            $('#total-services').text(data.length);
            $('#service-hide').show();
            $('#item-list').show();
            $('#alert').hide();
            data.forEach(function (service) {
              var serviceHTML = `
                        <div class="col-md-4 service-grooming">
                          <div id="item-service" class="service-item">
                            <img src="./inc/uploads/${service.image}"
                              alt="Service Image">
                            <p>${service.name}</p>
                            <p>${service.description}</p>
                            <p>₱${service.price}</p>
                            <div class="form-check form-switch">
                                <input data-id="${service.id}" class="toggle-service form-check-input" type="checkbox" id="appointment-required-${service.id}" ${service.visibility === 'true' ? 'checked' : ''}>
                                <label class="form-check-label toggle-service" for="appointment-required-${service.id}">Appointment Required</label>
                            </div>
                            <div class="btn-container mt-2">
                              <button data-id="${service.id}" class="btn-edit-service btn btn-outline-secondary btn-sm">Edit</button>
                              <button data-id="${service.id}" class="btn-delete-service btn btn-outline-danger btn-sm">Delete</button>
                            </div>
                          </div>
                        </div>
                `;
              $('#item-list').append(serviceHTML);
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
                  success: function (response) {
                    $('#alert').text("Service visibility is updated.");
                    $('#alert').show();
                    setTimeout(function () {
                      $('#alert').fadeOut('slow');
                    }, 3000);
                  },
                  error: function (xhr, status, error) {
                    alert('Update failed:', error);
                    window.location.reload();
                  }
                });
              });
            });
          },
          error: function (xhr, status, error) {
            console.error('AJAX Error:', status, error);
          }
        });
        $(document).on('click', '.btn-delete-service', function () {
          var serviceId = $(this).data('id');
          $.ajax({
            url: './inc/deleteService.php',
            type: 'POST',
            data: { id: serviceId },
            success: function (response) {
              $('#alert').text("Service Deleted Successfully");
              $('#alert').show();
              setTimeout(function () {
                $('#alert').fadeOut('slow');
                location.reload();
              }, 3000);
            },
            error: function (xhr, status, error) {
              alert('Delete failed:', error);
            }
          });
        });
      });
      $(document).on('click', '.category-item .btn-outline-secondary', function () {
        var category_id = $(this).data('id');
        const categoryItem = $(this).closest('.category-item');
        const categoryName = categoryItem.find('.category-name').text().trim(); // Assuming category name has a specific class
        $('#edit-category-name').val(categoryName);
        $('#edit-category-id').val(category_id);

        const editCategoryModal = new bootstrap.Modal(document.getElementById('editCategoryModal'));
        editCategoryModal.show();
      });

      $(document).on('click', '.btn-edit-service', function () {
        const serviceItem = $(this).closest('.service-item');
        const serviceId = $(this).data('id');
        $('#service_id').val(serviceId);

        const serviceName = serviceItem.find('p:nth-child(2)').text();
        const serviceDescription = serviceItem.find('p:nth-child(3)').text();
        const servicePrice = serviceItem.find('p:nth-child(4)').text().replace('₱', '');

        $('#edit-service-name').val(serviceName);
        $('#edit-service-description').val(serviceDescription);
        $('#edit-service-price').val(servicePrice);

        const editServiceModal = new bootstrap.Modal(document.getElementById('editServiceModal'));
        editServiceModal.show();
      });
    });
    </script>

    <?php require('inc/scripts.php'); ?>
</body>

</html>
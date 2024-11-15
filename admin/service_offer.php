<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product and Category Page</title>
     <?php require('inc/links.php'); ?>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Global Styles */
    body {
      background-color: #f4f7f6;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
      background-color: #fff;
      padding: 3rem;
      border-radius: 15px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
    }

    h1 {
      color: #333;
      font-size: 2.5rem;
      font-weight: 600;
      margin-bottom: 1.5rem;
    }

    /* Category Styles */
    .category-list .category-item {
      font-size: 1.2rem;
      font-weight: bold;
      padding: 0.8rem 2rem;
      margin-right: 1rem;
      border-radius: 30px;
      cursor: pointer;
      color: #fff;
      background-color: #007bff;
      transition: all 0.3s ease;
      text-align: center;
    }

    .category-list .category-item:hover {
      background-color: #0056b3;
      transform: translateY(-6px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    .category-item.active {
      background-color: #0056b3;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .category-list {
      gap: 1.5rem;
      display: flex;
      justify-content: flex-start;
      margin-bottom: 2rem;
    }

    /* Service Styles */
    .service-item {
  background-color: #f9f9f9;
  height: auto; /* Adjust for dynamic content */
  max-width: 100%;
  border-radius: 15px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  padding: 20px;
  box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

    .service-item:hover {
      transform: translateY(-7px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .service-item img {
  width: 100%;
  max-width: 200px; /* Adjust size as needed */
  height: 160px; /* Ensure consistent height */
  object-fit: cover; /* Crop and fit image */
  border-radius: 10px;
  margin-bottom: 15px;
}

    .service-item p {
      font-size: 1.1rem;
      font-weight: bold;
      color: #333;
    }

    /* Modal Styles */
    .modal-header {
      background-color: #007bff;
      color: #fff;
    }

    .modal-body {
      background-color: #f8f9fa;
    }

    .modal-footer {
      background-color: #f8f9fa;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }

    /* Category Edit/Delete Layout */
    .category-item-actions {
      font-size: 1rem;
      display: flex;
      justify-content: center;
      gap: 10px;
      color: #fff;
    }

    .category-item-actions .btn {
      font-size: 0.9rem;
    }

    .btn-container {
      display: none;
      justify-content: center;
      gap: 10px;
      margin-top: 10px;
    }

    .category-item:hover .btn-container {
      display: flex;
    }

    /* Buttons beside each other */
    .btn-container .btn-outline-light, .btn-container .btn-outline-danger {
      width: 48%; /* Make buttons take up equal width */
    }
    @media (max-width: 768px) {
  .service-item img {
    max-width: 150px; /* Adjust for smaller screens */
    height: 120px;
  }
}
  </style>
</head>
<body>
<?php require('inc/header.php'); ?>
  <div class="container my-5">
    <!-- Header -->
     <div class="bg-container" style="margin-bottom:30px;">
    <h1 class="text-muted mb-4">Admin Services & Offers</h1>

    <!-- Categories Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div class="d-flex category-list" id="category-list">
        <div class="category-item" id="category-grooming">
          Grooming
          <button class="btn btn-link btn-sm" style="font-size: 1.5rem;" onclick="toggleOptions('grooming')">:</button>
          <div class="btn-container" id="grooming-options">
            <button class="btn btn-outline-light btn-sm" onclick="editCategory('Grooming')">Edit</button>
            <span>:</span>
            <button class="btn btn-outline-danger btn-sm" onclick="deleteCategory('Grooming')">Delete</button>
          </div>
        </div>
        <div class="category-item" id="category-spa">
          Spa
          <button class="btn btn-link btn-sm" style="font-size: 1.5rem;" onclick="toggleOptions('spa')"></button>
          <div class="btn-container" id="spa-options">
            <button class="btn btn-outline-light btn-sm" class="btn btn-warning"onclick="editCategory('Spa')">Edit</button>
            <button class="btn btn-outline-danger btn-sm" onclick="deleteCategory('Spa')">Delete</button>
          </div>
        </div>
        <div class="category-item" id="category-massage">
          Massage
          <button class="btn btn-link btn-sm" style="font-size: 1.5rem;" onclick="toggleOptions('massage')">:</button>
          <div class="btn-container" id="massage-options">
            <button class="btn btn-outline-light btn-sm" onclick="editCategory('Massage')">Edit</button>
            <span>:</span>
            <button class="btn btn-outline-danger btn-sm" onclick="deleteCategory('Massage')">Delete</button>
          </div>
        </div>
        <div class="category-item" id="category-fitness">
          Fitness
          <button class="btn btn-link btn-sm" style="font-size: 1.5rem;" onclick="toggleOptions('fitness')">:</button>
          <div class="btn-container" id="fitness-options">
            <button class="btn btn-outline-light btn-sm" onclick="editCategory('Fitness')">Edit</button>
            <span>:</span>
            <button class="btn btn-outline-danger btn-sm" onclick="deleteCategory('Fitness')">Delete</button>
          </div>
        </div>
      </div>
      <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Add Category</button>
      <br>
      <div class="total-services">
        Total Category: <span id="total-services-count">0</span>
      </div>
    </div>

    <!-- Total Services -->
    <div id="addServiceBtnContainer" class="d-flex justify-content-between mb-4">
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addServiceModal">Add Service</button>
      <div class="total-services">
        Total Services: <span id="total-services-count">0</span>
      </div>
    </div>

    <!-- Services Grid -->
    <div class="row g-3" id="services-grid">
      <!-- Sample Service Items -->
      <div class="col-md-4 service-item" data-category="Grooming">
        <div class="service-item">
          <img src="dog-grooming.jpg" alt="Dog Grooming">
          <p>Dog Grooming</p>
          <p>Full grooming for dogs</p>
          <p>$30</p>
          <!-- Appointment Required Switch -->
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="appointment-required-dog-grooming">
            <label class="form-check-label" for="appointment-required-dog-grooming">Appointment Required</label>
            <div class="btns-container">
            <button class="btn btn-outline-light btn-sm" class="btn btn-warning" onclick="editService('Dog Grooming')">Edit</button>
            <button class="btn btn-outline-danger btn-sm" onclick="deleteService('Dog Grooming')">Delete</button>
          </div>
          </div>
          
        </div>
      </div>
      <div class="col-md-4 service-item" data-category="Spa">
        <div class="service-item">
          <img src="spa.jpg" alt="Spa Service">
          <p>Spa Treatment</p>
          <p>Relaxing spa for pets</p>
          <p>$40</p>
          <!-- Appointment Required Switch -->
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="appointment-required-spa">
            <label class="form-check-label" for="appointment-required-spa">Appointment Required</label>
            <div class="btns-container">
            <button class="btn btn-outline-light btn-sm" class="btn btn-warning" onclick="editService('Spa Treatment')">Edit</button>
            <span>:</span>
            <button class="btn btn-outline-danger btn-sm" onclick="deleteService('Spa Treatment')">Delete</button>
          </div>
          </div>
          
        </div>
      </div>
    </div>

  </div>

  <!-- Modal for adding a new category -->
  <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="category-name" class="form-label">Category Name</label>
              <input type="text" class="form-control" id="category-name" required>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="addCategory()">Save Category</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal for adding a new service -->
  <div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addServiceModalLabel">Add Service</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
              <div class="mb-3">
                <label for="service-name" class="form-label">Service Name</label>
                <input type="text" class="form-control" id="service-name" required>
              </div>
              <div class="mb-3">
                <label for="service-description" class="form-label">Description</label>
                <input type="text" class="form-control" id="service-description" required>
              </div>
              <div class="mb-3">
                <label for="service-price" class="form-label">Price</label>
                <input type="number" class="form-control" id="service-price" required>
              </div>
              <div class="mb-3">
                <label for="service-image" class="form-label">Image</label>
                <input type="file" class="form-control" id="service-image" accept="image/*">
              </div>
            </form>
          </div>
          
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="addService()">Save Service</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Example Functions
    function editCategory(category) {
      alert(`Edit category: ${category}`);
    }

    function deleteCategory(category) {
      alert(`Delete category: ${category}`);
    }

    function editService(service) {
      alert(`Edit service: ${service}`);
    }

    function deleteService(service) {
      alert(`Delete service: ${service}`);
    }

    // Toggle the visibility of edit/delete buttons
    function toggleOptions(category) {
      const options = document.getElementById(category + '-options');
      options.style.display = options.style.display === 'none' ? 'flex' : 'none';
    }
  </script>
      
  </div>
</body>
</html>

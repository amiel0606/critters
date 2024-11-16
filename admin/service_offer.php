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
            <button class="btn btn-outline-secondary btn-sm">Edit</button>
            <button class="btn btn-outline-danger btn-sm">Delete</button>
          </div>
        </div>
        <div class="category-item" id="category-spa">
          Spa
          <div class="btn-container">
            <button class="btn btn-outline-secondary btn-sm">Edit</button>
            <button class="btn btn-outline-danger btn-sm">Delete</button>
          </div>
        </div>
      </div>
      <div>
        <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Add Category</button>
        <h6 class="mt-2">Total Categories: <span id="total-categories">0</span></h6>
      </div>
    </div>

    <!-- Services Section -->
    <div class="left-align mb-4">
      <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addServiceModal">Add Service</button>
      <h6 class="mt-2">Total Services: <span id="total-services">0</span></h6>
    </div>

    <!-- Services Grid -->
    <div class="row g-3 mb-4" id="services-grid">
      <div class="col-md-4 service-grooming">
        <div class="service-item">
          <img src="dog-grooming.jpg" alt="Dog Grooming">
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

  </div>

  <!-- Add Category Modal -->
  <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="add-category-form">
            <div class="mb-3">
              <label for="category-name" class="form-label">Category Name</label>
              <input type="text" class="form-control" id="category-name" required>
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
  <div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addServiceModalLabel">Add Service</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="add-service-form">
            <div class="mb-3">
              <label for="service-name" class="form-label">Service Name</label>
              <input type="text" class="form-control" id="service-name" required>
            </div>
            <div class="mb-3">
              <label for="service-description" class="form-label">Description</label>
              <textarea class="form-control" id="service-description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
              <label for="service-price" class="form-label">Price</label>
              <input type="number" class="form-control" id="service-price" required>
            </div>
            <div class="mb-3">
              <label for="service-price" class="form-label">Image</label>
              <input type="file" class="form-control" id="service-price" required>
            </div>
            
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Service</button>
        </div>
      </div>
    </div>
  </div>

  <?php require('inc/scripts.php'); ?>
</body>
</html>

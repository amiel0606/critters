<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Critters Agrivet - Service</title>
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <style>
      /* Set background color */
      body {
        background-image: linear-gradient(to right, #EE9CA7, #FFDDE1);
      }

      #bg-wrapper {
        min-height: 250px;
        padding: 15px;
        max-width: 400px;
        background-color: #FFE5EC;
      }

      .pop:hover {
        border-top-color: var(--teal) !important;
        transform: scale(1.03);
        transition: all 0.3s;
      }

      .service-image {
        width: 150px;
        height: auto;
      }

      .container {
        overflow-x: hidden;
      }

      .services-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 20px;
      }

      .service-item {
        flex: 1 0 30%;
        margin-bottom: 20px;
      }

      /* Responsive design adjustments */
      @media (max-width: 992px) {
        .service-item {
          flex: 1 0 45%;
        }
      }

      @media (max-width: 576px) {
        .service-item {
          flex: 1 0 100%;
        }
      }

      /* Category buttons style */
      .categories {
        text-align: center;
        margin-bottom: 20px;
      }

      .category {
        display: inline-block;
        margin: 0 10px;
        padding: 8px 15px;
        font-size: 1rem;
        font-weight: bold;
        color: #333;
        background-color: #FFE5EC;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s;
      }

      .category:hover {
        background-color: #FF8FA6;
        color: white;
      }

      .category.active {
        background-color: #FF8FA6;
        color: white;
      }

      .dropdown-menu {
        background-color: #FFE5EC;
      }

      .dropdown-item {
        font-size: 1rem;
        font-weight: bold;
        color: #333;
        transition: background-color 0.3s ease;
      }

      .dropdown-item:hover {
        background-color: #FF8FA6;
        color: white;
      }
    </style>
</head>
<body>
  <?php
  session_start();
  require('inc/header.php');
  ?>

  <div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">Our Services</h2>
    <div class="h-line bg-dark"></div>
    <br>
    <p>
      Discover our variety of top-notch services crafted to meet your pet’s unique needs and support their health.
    </p>
  </div>

  <!-- Categories Section -->
  <div class="container">
    <div class="categories">
      <span class="category active" onclick="filterCategory('all')">All</span>
      <span class="category" onclick="filterCategory('consultation')">Consultation</span>
      <span class="category" onclick="filterCategory('vaccination')">Vaccination</span>
      <span class="category" onclick="filterCategory('grooming')">Grooming</span>
      <div class="dropdown d-inline-block">
        <button class="btn btn-outline-secondary dropdown-toggle category" type="button" id="dropdownOthers" data-bs-toggle="dropdown" aria-expanded="false">
          Others
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownOthers">
          <li><a class="dropdown-item" href="#" onclick="filterCategory('other1')">Other 1</a></li>
          <li><a class="dropdown-item" href="#" onclick="filterCategory('other2')">Other 2</a></li>
          <li><a class="dropdown-item" href="#" onclick="filterCategory('other3')">Other 3</a></li>
        </ul>
      </div>
    </div>

    <!-- Services Section -->
    <div class="services-row" id="services-container">
      <!-- Services will be loaded here dynamically -->
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      // Fetch and display services from server
      $.ajax({
        type: "GET",
        url: "./admin/inc/getServices.php",
        dataType: "json",
        success: function (data) {
          renderServices(data);
        },
      });

      // Function to render services
      function renderServices(data) {
        var html = "";
        $.each(data, function (index, service) {
          html += "<div class='service-item' data-category='" + service.service_category + "'>";
          html += "<div class='rounded shadow p-4 border-top border-4 border-dark pop' id='bg-wrapper'>";
          html += "<div class='d-flex align-items-center mb-2'>";
          html += "<img src='./admin/inc/uploads/" + service.service_image + "' class='service-image'>";
          html += "<h5 class='m-0 ms-3'>" + service.service_name + "</h5>";
          html += "</div>";
          html += "<p>" + service.service_description + "</p>";
          html += "</div>";
          html += "</div>";
        });
        $("#services-container").html(html);
      }
    });

    // Function to filter services by category
    function filterCategory(category) {
      $(".category").removeClass("active");
      $(".category:contains('" + category.charAt(0).toUpperCase() + category.slice(1) + "')").addClass("active");

      $(".service-item").each(function () {
        if (category === "all" || $(this).data("category") === category) {
          $(this).show();
        } else {
          $(this).hide();
        }
      });
    }
  </script>

  <?php require('inc/footer.php'); ?>
</body>
</html>

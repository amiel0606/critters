<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Critters Agrivet - Service</title>
  <?php require('inc/links.php'); ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
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
      <!-- Buttons will be injected here dynamically -->
    </div>


    <!-- Services Section -->
    <div class="services-row" id="services-container">
      <!-- Services will be loaded here dynamically -->
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <script>
    $(document).ready(function () {
      $.ajax({
        type: "GET",
        url: "./admin/inc/getServices.php",
        dataType: "json",
        success: function (data) {
          renderServices(data);
          renderCategories(data);
        },
        error: function (xhr, status, error) {
          console.error("AJAX Error: ", status, error);
        }
      });
      function renderServices(data) {
        var html = "";
        var visibleServices = data.filter(service => service.visibility === "true"); 
        $.each(visibleServices, function (index, service) {
          html += `
                <div class='service-item' data-category='${service.category_name}'>
                    <div class='rounded shadow p-4 border-top border-4 border-dark pop' id='bg-wrapper'>
                        <div class='d-flex align-items-center mb-2'>
                            <img src='./admin/inc/uploads/${service.service_image}' class='service-image' alt='${service.service_name}'>
                            <h5 class='m-0 ms-3'>${service.service_name}</h5>
                        </div>
                        <p>${service.service_description}</p>
                        <div class="slot mb-2">
                            <h6>Price per Slot:</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">${service.service_price}</span>
                        </div>
                        <button id="book-btn" class="btn btn-sm w-100 text-white custom-bg shadow-none" data-id="${service.service_id}">Book Now</button>
                    </div>
                </div>`;
        });
        $("#services-container").html(html);
      }

      function renderCategories(data) {
        console.log(data);
        
        var categories = new Set(
          data.map(service => service.category_name ? service.category_name : "Uncategorized") 
        );
        var categoriesHtml = `<button class="btn btn-outline-secondary category active" data-category="all">All</button>`;
        categories.forEach(function (category) {
          categoriesHtml += `<button class="btn btn-outline-secondary category" data-category="${category.toLowerCase()}">${category}</button>`;
        });
        $(".categories").html(categoriesHtml);
        $(".categories").on("click", ".category", function () {
          var selectedCategory = $(this).data("category");
          filterCategory(selectedCategory);
          $(".category").removeClass("active");
          $(this).addClass("active");
        });
      }
      function filterCategory(category) {
        $(".service-item").each(function () {
          if (category === "all" || $(this).data("category") == category) {
            $(this).show();
          } else {
            $(this).hide();
          }
        });
      }
    });

  </script>

  <?php require('inc/footer.php'); ?>
</body>

</html>
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
      /* Set background color to #FFF0F5 */
      body {
        background-color: #FFF0F5;
      }

      .bg-white{
        min-height:300px;
      }
      .pop:hover {
        border-top-color: var(--teal) !important;
        transform: scale(1.03);
        transition: all 0.3s;
      }
      .service-image {
        width: 200px; 
        height: auto;
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

  <div class="container">
    <div class="row" id="services-container">
      <!-- Services will be loaded here dynamically -->
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $.ajax({
        type: "GET",
        url: "./admin/inc/getServices.php",
        dataType: "json",
        success: function(data) {
          var html = "";
          console.log(data);
          $.each(data, function(index, service) {
            html += "<div class='col-lg-4 col-md-6 col-sm-12 mb-4'>";
            html += "<div class='bg-white rounded shadow p-4 border-top border-4 border-dark pop'>";
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
    });
  </script>

  <?php require('inc/footer.php'); ?>
</body>
</html>

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
        .pop:hover {
            border-top-color: var(--teal) !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }
    </style>
</head>
<body class="bg-light">
  <?php
  session_start();
  require('inc/header.php');
  ?>

  <div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">Our Services</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
      Our veterinary clinic provides compassionate care for your pets, offering 
      comprehensive services including wellness exams, vaccinations, surgery, 
      and emergency care to ensure their health and well-being.
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
            html += "<img src='./admin/inc/uploads/" + service.service_image + "' width='40px'>";
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Critters Agrivet - CONTACT</title>
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
</head>
<body class="bg-light">
    <?php
      session_start();
      require('inc/header.php');
    ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">CONTACT US</h2> 
        <div class="h-line bg-dark"></div>
        <div id="contact"></div>
    </div>

    <div class="container">
        <div class="row">
            <!-- New container for contact info -->
            <div class="col-lg-6 info-container mb-5 px-4" id="frames"></div>
        </div>
    </div>

    <?php require('inc/footer.php'); ?>

    <script>
      $(document).ready(function() {
          function fetchCmsData() {
              $.ajax({
                  type: 'GET',
                  url: 'http://localhost/critters/admin/inc/getCMS.php',
                  dataType: 'json',
                  success: function(response) {
                      var cms_about = response[0].about;
                      if (response.error) {
                          console.error(response.error);
                      } else {
                          $('#contact').html(`
                              <p class="text-center mt-3">${cms_about}</p>
                          `);

                          $('#frames').html(`
                              <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                                  ${response[0].map}
                                  <h5>Address</h5>
                                  <a href="${response[0].link_address}" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                                      <i class="bi bi-geo-alt-fill"></i> ${response[0].address}
                                  </a>
                                  <h5>Viber Contact Message Us</h5>
                                  <a href="Phone: 09568432651" class="d-inline-block mb-2 text-decoration-none text-dark">
                                      <i class="bi bi-chat-left-text-fill"></i> ${response[0].viber}
                                  </a> 
                                  <br>
                                  <a href="Phone:" class="d-inline-block mb-2 text-decoration-none text-dark">
                                      <i class="bi bi-telephone-fill"></i> 09628328977
                                  </a>
                                  <h5 class="mt-4">Follow Us</h5>
                                  <a href="${response[0].social}" class="d-inline-block text-dark fs-5 me-2">
                                      <i class="bi bi-facebook me-1"></i> Critters
                                  </a>

                                  
                              </div>
                          `);
                      } 
                  },
                  error: function(xhr, status, error) {
                      console.error('Error fetching CMS data:', error);
                  }
              });
          }
          fetchCmsData();
      });
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Critters Agrivet - CONTACT</title>
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <style>
        /* Make the container take full width */
        .container-fluid {
            padding-left: 15px;
            padding-right: 15px;
            width: 100%;
            max-width: 1200px; /* Max width for the entire layout */
            margin: 0 auto; /* Centering the container */
        }
        iframe{
            margin-top:20px;
        }

        /* Full-width layout using flexbox */
        .contact-layout {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 30px;
            flex-wrap: wrap;
            
        }


        .contact-layout .map-container {
            flex: 2; /* Make the map section take more space */
            min-width: 600px; /* Increased width for the map */
            height: 500px; /* Set a fixed height for the map */
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .contact-layout .details-container {
            display: flex;
            justify-content: space-evenly;
             flex-direction:column;
            flex: 1;
            width: 600px; 
            background-color: #fff;
            height: 500px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        /* Adjusting layout on smaller screens */
        @media (max-width: 768px) {
            .contact-layout {
                flex-direction: column;
                align-items: center;
            }

            .contact-layout .map-container {
                width: 100%;
                height: 400px; /* Adjust map height for mobile */
            }

            .contact-layout .details-container {
                width: 100%;
                padding: 20px;
            }

            .section-title {
                font-size: 1.2rem;
            }
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
        }

    </style>
</head>
<body class="bg-light">
    <?php
      session_start();
      require('inc/header.php');
    ?>

    <!-- Title and separator line -->
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center section-title">CONTACT US</h2> 
        <div class="h-line"></div>
        <div id="contact"></div>
    </div>

    <!-- Full-width container for the contact info -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 contact-layout" id="frames">
                <div class="map-container" id="map"></div> <!-- Map container -->
                <div class="details-container">
                    <!-- Contact details will go here -->
                </div>
            </div>
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
                                <div class="contact-layout">
                                    <!-- Map -->
                                    <div class="map-container">
                                        ${response[0].map} <!-- You can replace this with an iframe or embed link for the map -->
                                    </div>

                                    <!-- Contact Info -->
                                    <div class="details-container">
                                        <h5>Address</h5>
                                        <a href="${response[0].link_address}" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                                            <i class="bi bi-geo-alt-fill"></i> ${response[0].address}
                                        </a>
                                        <h5>Contact Number</h5>
                                        <a href="Phone: 09568432651" class="d-inline-block mb-2 text-decoration-none text-dark">
                                            <i class="bi bi-chat-left-text-fill"></i> ${response[0].viber}
                                        </a> 

                                        
                                        <h5 class="mt-4">Follow Us</h5>
                                        <a href="${response[0].social}" class="d-inline-block text-dark fs-5 me-2">
                                            <i class="bi bi-facebook me-1"></i> Critters
                                        </a>
                                    </div>
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

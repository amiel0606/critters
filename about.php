<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Critters Agrivet - Service</title>
    
    <?php require('inc/links.php'); ?>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <style>
        body{
            height: auto;
         width: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-color: #FFF0F5;
        }
        .pop:hover {
            border-top-color: var(--teal) !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }

        .box {
            border-top-color: var(--teal) !important;
        }

        .management-team-container {
            text-align: center;
        }

        .swiper-slide {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .team-image {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
        }

        .swiper-pagination {
            margin-top: 20px;
        }

        .availability-status {
            font-weight: bold;
        }

        .available {
            color: green;
        }

        .unavailable {
            color: red;
        }

        /* Flexbox styling for the About Us, Mission and Vision, and Clinic Specify sections */
        .info-row {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .info-item {
            flex: 1;
            margin: 10px;
            min-width: 280px;
        }

        .info-item h2, .info-item h3 {
            text-align: center;
        }
    </style>
</head>

<body >
    <?php
    session_start();
    require('inc/header.php');
    ?>
    <div class="bg"><img src="../vaccine.jpeg" alt=""></div>
    <!-- About Us, Mission and Vision, and Clinic Specify Sections in a Row -->
    <div class="my-5 px-4 info-row">
        <!-- About Us Section -->
        <div class="info-item">
            <h2 class="fw-bold h-font">ABOUT US</h2>
            <div class="h-line bg-dark"></div>
            <div id="about"></div>
        </div>

        <!-- Mission and Vision Section -->
        <div class="info-item">
            <h3 class="fw-bold h-font">MISSION AND VISION</h3>
            <div id="mission_vision">To provide exceptional veterinary <br>
                care through personalized treatment, advanced <br>
                medical practices, and a caring approach, ensuring <br>
                the well-being and quality of life for every pet and <br>
                peace of mind for every pet owner. </div>
        </div>

        <!-- Clinic Specify Section -->
        <div class="info-item">
            <h2 class="fw-bold h-font">CLINIC SPECIFY</h2>
            <div id="specify">The clinic only accepting Dogs and Cats services</div>
        </div>
    </div>

    <br>

    <!-- Service Statistics Section -->
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-2">
                <!-- Add about content if needed -->
            </div>
        </div>

 
    </div>

    <!-- Management Team Section -->
    <h3 class="my-5 fw-bold h-font text-center">MANAGEMENT TEAM</h3>
    <div class="container management-team-container px-4">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper mb-5" id="team-swiper">
                <!-- Team slides will be inserted here dynamically -->
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <?php require('inc/footer.php'); ?>

    <!-- Swiper JS Script -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 40,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
            },
        });

        $(document).ready(function () {
            function fetchCmsData() {
                $.ajax({
                    type: 'GET',
                    url: 'http://localhost/critters/admin/inc/getCMS.php',
                    dataType: 'json',
                    success: function (response) {
                        var cms_about = response[0].about;
                        $('#about').html(`<h5 class="text-center mt-3">${cms_about}</h5>`);
                        $('#mission_vision').text(response[0].mission_vision);
                    },
                    error: function (xhr, status, error) {
                        console.error('Error fetching CMS data:', error);
                    }
                });
            }

            fetchCmsData();

            $.ajax({
                url: './admin/inc/fetchTeam.php',
                type: 'GET',
                success: function (response) {
                    const teamData = JSON.parse(response);
                    let slides = '';
                    teamData.forEach(member => {
                        slides += `
                            <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                                <img src="./admin/inc/uploads/${member.picture}" class="team-image">
                                <h5>${member.name}</h5>
                                <p>Position: ${member.position}</p>
                                <p class="availability-status ${member.availability == 1 ? 'available' : 'unavailable'}">
                                    ${member.availability == 1 ? 'Available' : 'Unavailable'}
                                </p>
                            </div>
                        `;
                    });
                    $('#team-swiper').html(slides);
                },
                error: function (xhr, status, error) {
                    console.error("Error fetching team data:", error);
                }
            });
        });
    </script>
</body>

</html>

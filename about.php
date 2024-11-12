<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Critters Agrivet - Service</title>
    
    <?php require('inc/links.php'); ?>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <style>
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
    </style>
</head>

<body class="bg-light">
    <?php
    session_start();
    require('inc/header.php');
    ?>

    <!-- About Us Section -->
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">ABOUT US</h2>
        <div class="h-line bg-dark"></div>
        <div id="about"></div>
    </div>

    <br>
    



    <br>

    <!-- MISSION AND VISION -->
    <div class="my-5 px-4">
        <h3 class="my-5 fw-bold h-font text-center">MISSION AND VISION</h3>
        <div id="mission.vision">To provide exceptional veterinary <br>
        care through personalized treatment, advanced <br>
        medical practices, and a caring approach, ensuring <br>
        the well-being and quality of life for every pet and <br>
         peace of mind for every pet owner. </div>
    </div>



    <br>



    <br>
    <!-- SPECIFY -->
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">CLINIC SPECIFY</h2>
        
        <div id="specify">The clinic only accepting Dogs and Cats services</div>
    </div>




    <!-- Service Statistics Section -->
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-2">
                <!-- Add about content if needed -->
            </div>
        </div>

        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4 px-4">
                    <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                        <img src="images/about/service.png" width="70px">
                        <h4 class="mt-3">4 TYPES SERVICE</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 px-4">
                    <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                        <img src="images/about/customer.png" width="70px">
                        <h4 class="mt-3">10 BOOKINGS PER DAY</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 px-4">
                    <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                        <img src="images/about/review.png" width="70px">
                        <h4 class="mt-3">100+ REVIEWS</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 px-4">
                    <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                        <img src="images/about/staff.png" width="70px">
                        <h4 class="mt-3">8 STAFF MEMBERS</h4>
                    </div>
                </div>
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

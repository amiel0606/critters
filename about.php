<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Critters Agrivet - Service</title>
    <?php require('inc/links.php');?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <?php require('inc/links.php');?>
    
    <style>
  .pop:hover {
    border-top-color: var(--teal) !important;
    transform: scale(1.03);
    transition: all 0.3s;
    }
</style>

  

</head>
<body class="bg-light">
  <?php require('inc/header.php');?>

  <style>
    .box{
    border-top-color: var(--teal) !important;
    }
  </style>

      <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">ABOUT US</h2> 
        <div class="h-line bg-dark"></div>
        
        <p class="text-center mt-3">
        Critters Agrivet And Petcare Clinic our mission is to provide 
        <br> compassionate, high-quality veterinary <br> to ensure the health and well-being of your pets.
        </p>
      </div>


      <div class="container">
    <div class="row justify-content-between align-items-center">
       <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-2">
          <h3 class="mb-3">Lorem ipsum dolor sit</h3>
        <p>
         Our clinic is equipped with modern medical technology and diagnostic tools, allowing us to deliver accurate and timely diagnoses, while our comfortable, pet-friendly environment helps reduce stress for both pets and their owners. From puppies and kittens to senior pets, we are dedicated to supporting your furry friends at every stage of life.
        </p>
        </div>

        <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-1">
           <img src="images/about/doctor.jpg" class="w-100">
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
            <h4 class="mt-3"> 10 BOOKING PER DAY</h4>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4 px-4">
          <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
            <img src="images/about/review.png" width="70px">
            <h4 class="mt-3"> 100+ REVIEWS</h4>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4 px-4">
          <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
            <img src="images/about/staff.png" width="70px">
            <h4 class="mt-3"> 8 STAFFS</h4>
          </div>
        </div>
      </div>
    </div>


    <h3 class="my-5 fw-bold h-font text-center">MANAGEMENT TEAM</h3>

    <div class="container px-4">
      <div class="swiper mySwiper">
      <div class="swiper-wrapper mb-5">
      
      <div class="swiper-slide bg-white text-center overflow-hidden rounded">
        <img src="images/about/emplo1.jpg" class="w-100">
        <h5>RANDOM NAME</h5>
      </div>

      <div class="swiper-slide bg-white text-center overflow-hidden rounded">
        <img src="images/about/emplo1.jpg" class="w-100">
        <h5>RANDOM NAME</h5>
      </div>

      
      <div class="swiper-slide bg-white text-center overflow-hidden rounded">
        <img src="images/about/emplo1.jpg" class="w-100">
        <h5>RANDOM NAME</h5>
      </div>

      
      <div class="swiper-slide bg-white text-center overflow-hidden rounded">
        <img src="images/about/emplo1.jpg" class="w-100">
        <h5>RANDOM NAME</h5>
      </div>
      
    </div>
  </div>
  
  <!-- Swiper Pagination -->
  <div class="swiper-pagination"></div>
</div>

<?php require('inc/footer.php'); ?>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Swiper Initialization Script -->
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 4,
    spaceBetween: 40,
    pagination: {
      el: ".swiper-pagination",
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
      },
      640: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 3,
      },
      1024: {
        slidesPerView: 3,
      },
    }
  });
</script>


    
    


</body>
</html>

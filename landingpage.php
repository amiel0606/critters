<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Critters Agrivet - HOME</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="css/landingpage.css" />
  <?php require('inc/links.php'); ?>


</head>

<body class="bg-light">
  <?php
  session_start();
  require('inc/header.php');
  ?>

  <div class="container-fluid px-lg-4 mt-4 ">


    <div class=" swiper swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="images/carousel/1.jpg" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="images/carousel/2.jpg" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="images/carousel/3.jpg" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="images/carousel/4.jpg" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="images/carousel/5.jpg" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="images/carousel/6.jpg" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="images/carousel/7.jpg" class="w-100 d-block" />
        </div>
      </div>
    </div>
  </div>

  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font"> TESTIMONIALS</h2>
  <div class="container">
    <div class="swiper swiper-testimonials">
      <div class="swiper-wrapper" id="testimonial-container">
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script>
$(document).ready(function () {
    $.ajax({
        url: './inc/getReviews.php',
        method: 'GET',
        dataType: 'json',
        success: function (reviews) {
          // console.log(reviews);
            const testimonialContainer = $('#testimonial-container');
            testimonialContainer.empty(); 
            reviews.forEach(function (review) {
                const stars = '<div class="rating">' + '⭐'.repeat(review.rate) + '</div>';
                const testimonialHTML = `
                    <div class="swiper-slide bg-white p-4">
                        <div class="profile d-flex align-item-center mb-3">
                            <img src="images/features/userprofile.jpg" width="30px">
                            <h6 class="m-0 ms-2">${review.firstName || 'Anonymous'}</h6>
                        </div>
                        <p>${review.review}</p>
                        ${stars}
                    </div>
                `;
                testimonialContainer.append(testimonialHTML);
            });
            const slidesCount = testimonialContainer.children('.swiper-slide').length;
            // console.log('Number of testimonial slides:', slidesCount); 
            const swiperTestimonials = new Swiper('.swiper-testimonials', {
                effect: "coverflow",
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: slidesCount < 3 ? slidesCount : 3,
                loop: slidesCount > 1, 
                coverflowEffect: {
                    rotate: 50,
                    stretch: 0,
                    depth: 100,
                    modifier: 1,
                    slideShadows: false,
                },
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
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: slidesCount < 3 ? slidesCount : 3, 
                    },
                },
            });
        },
        error: function (xhr, status, error) {
            console.error('Error fetching reviews:', error);
        }
    });

    fetch('./admin/inc/showImage.php')
        .then(response => response.json())
        .then(data => {
            const swiperWrapper = document.querySelector('.swiper-container .swiper-wrapper');
            swiperWrapper.innerHTML = ''; 

            data.forEach(item => {
                const carouselItem = document.createElement('div');
                carouselItem.className = 'swiper-slide';
                carouselItem.innerHTML = `<img src="./admin/inc/uploads/${item.img1}" class="w-100 d-block" alt="${item.id}">`;
                swiperWrapper.appendChild(carouselItem);
            });

            const swiperImages = new Swiper('.swiper-container', {
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        })
        .catch(error => console.error('Error fetching images:', error));
});
</script>

  <?php require('inc/footer.php'); ?>
  <script src="https://cdn.jsdelivr.net/npm/swiper@8.3.2/dist/swiper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

</body>

</html>
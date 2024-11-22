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
  <style>
    body {
      background-image: linear-gradient(to right, #EE9CA7, #FFDDE1);
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .content-wrapper {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 40px;
      gap: 30px;
    }

    .text-container {
      width: 45%;
    }

    .text-container h1 {
      font-size: 2.5rem;
      color: #2B2B2B;
      margin-bottom: 20px;
    }

    .text-container p {
      font-size: 1.1rem;
      line-height: 1.8;
      color: #2B2B2B;
      margin-bottom: 20px;
    }

    .order-button {
      display: inline-block;
      padding: 12px 25px;
      background-color: #FF1493;
      color: #fff;
      font-size: 1.1rem;
      border: none;
      border-radius: 30px;
      text-decoration: none;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .order-button:hover {
      background-color: #FFB6C1;
    }

    .swiper-container {
      max-width: 60%;
      height: 400px;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .swiper-slide {
      background-color: #FFE5EC;
    }

    .swiper-slide img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  </style>
</head>

<body>
  <?php
  session_start();
  require('inc/header.php');
  ?>

  <!-- New Layout Section -->
  <div class="content-wrapper">
    <!-- Advertising Text Section -->
    <div class="text-container">
      <h1>Welcome to Critters Agrivet</h1>
      <p>
        Experience premium care for your pets. From veterinary services to top-quality pet products, we ensure your
        furry friends live their best lives. Visit us today and see the difference!
      </p>
      <a href="service.php" class="order-button">Explore Services</a>
    </div>

    <!-- Carousel Section -->
    <div class="swiper swiper-container">
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

  <!-- Testimonials Section -->
  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font" id="review-head" > TESTIMONIALS</h2>
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
      let testimonialContainer = $('#testimonial-container');
      $.ajax({
        url: './inc/getReviews.php',
        method: 'GET',
        dataType: 'json',
        success: function (reviews) {
          if (reviews.length === 0) {
            $('#review-head').text('No reviews just yet');
          } else {
            testimonialContainer.empty();
            reviews.forEach(function (review) {
              const stars = '<div class="rating">' + '⭐'.repeat(review.rate) + '</div>';
              const testimonialHTML = `
              <div class="swiper-slide p-4">
                <div class="profile d-flex align-item-center mb-3">
                  <h6 class="m-0 ms-2">${review.firstName || 'Anonymous'}</h6>
                </div>
                <p>${review.review}</p>
                ${stars}
              </div>
            `;
              testimonialContainer.append(testimonialHTML);
            });
          }

          const slidesCount = testimonialContainer.children('.swiper-slide').length;
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
              320: { slidesPerView: 1 },
              768: { slidesPerView: 2 },
              1024: { slidesPerView: slidesCount < 3 ? slidesCount : 3 },
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
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Critters Agrivet - HOME</title>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/landingpage.css" />
    <?php require('inc/links.php');?>
  
  
</head>
<body class="bg-light"> 
  <?php require('inc/header.php');?>

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
          <img src="images/carousel/4.jpg" class="w-100 d-block"/>
      </div>
       <div class="swiper-slide">
          <img src="images/carousel/5.jpg" class="w-100 d-block"/>
       </div>
       <div class="swiper-slide">
          <img src="images/carousel/6.jpg" class="w-100 d-block"/>
       </div>
       <div class="swiper-slide">
         <img src="images/carousel/7.jpg" class="w-100 d-block"/>
         </div>
      </div>
    </div>


    <div class="container availability-form">
      <div class="row">
        <div class="col-lg-12 bg-white shadow p-4 rounded">
            <h5 class="mb-4">Check Booking Availability</h5>
            <form>
                <div class="row align-items-end">

                    <div class="col-lg-3">
                        <label class="form-label" style="font-weight: 500">Select Date</label>
                        <input type="date" class="form-control shadow-none">
                    </div>
                    
                    <div class="col-lg-3">
                        <label class="form-label" style="font-weight: 500">Select Time</label>
                        <input type="time" class="form-control shadow-none">
                    </div>
                    
                    <div class="col-lg-3">
                        <label class="form-label" style="font-weight: 500">Select Service</label>
                        <select class="form-select shadow-none" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">Vaccine</option>
                            <option value="2">Checkup</option>
                            <option value="3">Groom</option>
                            <option value="4">Nutritional Counseling</option>
                        </select>
                    </div>
                   
                    <div class="col-lg-3">
                        <button type="submit" class="btn text-white custom-bg">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

 

          <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font"> OUR SERVICE</h2>

          <div class="container">
            <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
             <div class="col-lg-4 col-md-6 my-3">
            <div class="card border-0 shadow" style="max-width:350px; margin: auto;">
               <img src="images/carousel/Grooming-1.jpg" class="card-img-top">
              <div class="card-body">
          <h5 class="card-title-service">Groom</h5>
          <div class="service-types mb-4">
            <h6 class="mb-1">Services</h6>
            <span class="badge rounded-pill bg-light text-dark text-wrap">Bathing</span>
            <span class="badge rounded-pill bg-light text-dark text-wrap">Brushing</span>
            <span class="badge rounded-pill bg-light text-dark text-wrap">Ear Cleaning</span>
            <span class="badge rounded-pill bg-light text-dark text-wrap">Nail Clining</span>
          </div>
          <div class="rating mb-4">
            <h6 class="mb-1">Rating</h6>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
          <div class="d-flex justify-content-evenly mb-2">
            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-lg-4 col-md-6 my-3">
      <div class="card border-0 shadow" style="max-width:350px; margin: auto;">
        <img src="images/carousel/checkup.jpg" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title-service">Checkup</h5>
          <div class="service-types mb-4">
            <h6 class="mb-1">Services</h6>
            <span class="badge rounded-pill bg-light text-dark text-wrap">General Wellness</span>
            <span class="badge rounded-pill bg-light text-dark text-wrap">Puppy/Kitten</span>
            <span class="badge rounded-pill bg-light text-dark text-wrap">Senior Pet</span>
            <span class="badge rounded-pill bg-light text-dark text-wrap">Vaccination</span>
            <span class="badge rounded-pill bg-light text-dark text-wrap">Behavioral</span>
          </div>
          <div class="rating mb-4">
            <h6 class="mb-4">Rating</h6>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
          <div class="d-flex justify-content-evenly mb-2">
            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 my-3">
      <div class="card border-0 shadow" style="max-width:350px; margin: auto;">
        <img src="images/carousel/Vaccine.jpg" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title-service">Vaccine</h5>
          <div class="service-types mb-4">
            <h6 class="mb-1">Services</h6>
            <span class="badge rounded-pill bg-light text-dark text-wrap">Rabies Vaccine</span>
            <span class="badge rounded-pill bg-light text-dark text-wrap">DHPP/DAPP</span>
            <span class="badge rounded-pill bg-light text-dark text-wrap">Canine Influenza</span>
            <span class="badge rounded-pill bg-light text-dark text-wrap">Feline Leukemia Virus</span>
          </div>
          <div class="rating mb-4">
            <h6 class="mb-1">Rating</h6>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
          <div class="d-flex justify-content-evenly mb-2">
            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-12 text-center mt-5">
    <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Service</a>
  </div>
</div>





  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font"> PRODUCTS </h2>


        <div class="container">
          <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
              <!-- Card 1 -->
              <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                  <img src="images/carousel/product1.jpg" width="80px" alt="Royal Canin">
                  <h5 class="mt-3">Royal Canin</h5>
              </div>
              <!-- Card 2 -->
              <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                  <img src="images/carousel/product2.jpg" width="80px" alt="Royal Canin">
                  <h5 class="mt-3">Royal Canin</h5>
              </div>
              <!-- Card 3 -->
              <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                  <img src="images/carousel/product3.webp" width="80px" alt="Bone Toy">
                  <h5 class="mt-3">Bone Toy</h5>
              </div>
              <!-- Card 4 -->
              <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                  <img src="images/carousel/product4.jpg" width="80px" alt="Head Cat">
                  <h5 class="mt-3">Head Cat</h5>
                  </div>
                </div>
                </div>
      
                  <div class="col-lg-12 text-center mt-5">
                      <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Products</a>

                    </div>
                  </div>
        </div>


          <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font"> TESTIMONIALS</h2>

          <div class="container">
          <div class="swiper swiper-testimonials">
            <div class="swiper-wrapper">

              <div class="swiper-slide bg-white p-4">
                <div class="profile d-flex align-item-center mb-3">
                  <img src="images/features/userprofile.jpg" width="30px">
                  <h6 class="m-0 ms-2">Random user1</h6>
                </div>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Id nemo excepturi, incidunt qui libero at omnis iure
                  magni tempora ea.
                </p>
                <div class="rating">
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                </div>
              </div>
              <div class="swiper-slide bg-white p-4">
                <div class="profile d-flex align-item-center mb-3">
                  <img src="images/features/profile-simple.svg" width="30px">
                  <h6 class="m-0 ms-2">Random user1</h6>
                </div>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Id nemo excepturi, incidunt qui libero at omnis iure
                  magni tempora ea.
                </p>
                <div class="rating">
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                </div>
              </div>
              <div class="swiper-slide bg-white p-4">
                <div class="profile d-flex align-item-center mb-3">
                  <img src="images/features/userprofile.jpg" width="30px">
                  <h6 class="m-0 ms-2">Random user1</h6>
                </div>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Id nemo excepturi, incidunt qui libero at omnis iure
                  magni tempora ea.
                </p>
                <div class="rating">
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                </div>
              </div>
              <div class="swiper-slide bg-white p-4">
                <div class="profile d-flex align-item-center mb-3">
                  <img src="images/features/userprofile.jpg" width="30px">
                  <h6 class="m-0 ms-2">Random user1</h6>
                </div>
                <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Id nemo excepturi, incidunt qui libero at omnis iure
                magni tempora ea. 
                </p>
                <div class="rating">
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                </div>
              </div>
              
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>


        <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">REACH US</h2>

            <div class="container">
              <div class="row">
                <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                  <iframe class="w-100 rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d123696.17652061458!2d120.8539778823972!3d14.340131258755854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d42779def01d%3A0xced13867358a2082!2sCritters!5e0!3m2!1sen!2sph!4v1725476937233!5m2!1sen!2sph" height="450" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-lg-4 col-md-4">
                  <div class="bg-white p-4 rounded mb-4">
                    <h5>Call Us</h5>
                    <a href="Phone: 09568432651" class="d-inline-block mb-2 text-decoration-none text-dark"> 
                      <i class="bi bi-phone-fill"></i> 09568432651
                    </a>
                </div>
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Follow Us</h5>
                    <a href="#" class="d-inline-block mb-3"> 
                      <span class="badge bg-light text-dark fs-6 p-2">
                      <i class="bi bi-facebook me-1"></i>
                      Facebook
                      </span>
                    </a>
                    <br>
                    <a href="#" class="d-inline-block mb-3"> 
                      <span class="badge bg-light text-dark fs-6 p-2">
                      <i class="bi bi-chat-left-text-fill"></i>
                        Viber
                      </span>
                    </a>
              </div>
            </div>
          
                
            <?php require('inc/footer.php');?>





 
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script>
      var swiper = new Swiper(".swiper-container", {
      spaceBetween: 30, 
      effect: "fade",
      autoplay: {
        delay: 3500,
        disableOnInteraction: false,
      }
  });

  var swiper = new Swiper(".swiper-testimonials", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      loop: true,
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
      slidesPerView: 3,
      },
      }
    });
</script>

</body>
</html>

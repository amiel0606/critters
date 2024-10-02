<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Critters Agrivet - BOOKINGS</title>
    <?php require('inc/links.php');?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <?php require('inc/links.php');?>
    
   

  

</head>
<body class="bg-light">
  <?php require('inc/header.php');?>

  <div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">BOOKING</h2> 
      <div class="h-line bg-dark">

      </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-lg-0">
          <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
            <div class="container-fluid flex-lg-column align-items-stretch">
            <h4 class="mt-2">FILTERS</h4>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-column algn-items-strech mt-2" id="filterDropdown">
            <div class="border bg-light p-3 rounded mb-3">
                <h5 class="mb-3" style="font-size: 18px;">SET APPOINMENT</h5>

                <label class="form-label">Select Date</label>
                <input type="date" class="form-control shadow-none mb-3">
        
                <label class="form-label">Select Time</label>
                <input type="date" class="form-control shadow-none">

              
            </div>

            <div class="border bg-light p-3 rounded mb-3">
                <h5 class="mb-3" style="font-size: 18px;">Select Service</h5>
                <div class="mb-2">
                    <input type="checkbox" id="f1" class="form-check-input shadow-none me-1"> 
                    <label class="form-check-label " for="f1">Full Body Bathing</label>
                  </div>

                  <div class="mb-2">
                    <input type="checkbox" id="f1" class="form-check-input shadow-none me-1"> 
                    <label class="form-check-label " for="f1">Vaccination</label>
                  </div>

                  <div class="mb-2">
                    <input type="checkbox" id="f1" class="form-check-input shadow-none me-1"> 
                    <label class="form-check-label " for="f1">Rabies Vaccine</label>
                  </div>
                  
                  <div class="mb-2">
                    <input type="checkbox" id="f1" class="form-check-input shadow-none me-1"> 
                    <label class="form-check-label " for="f1">Ear Cleaning</label>
                  </div>

                  <div class="mb-2">
                    <input type="checkbox" id="f1" class="form-check-input shadow-none me-1"> 
                    <label class="form-check-label " for="f2">Feline Leukemia Virus</label>
                  </div>

                  <div class="mb-2">
                    <input type="checkbox" id="f1" class="form-check-input shadow-none me-1"> 
                    <label class="form-check-label " for="f1">Senior Pet</label>
                  </div>
            </div>

            <div class="border bg-light p-3 rounded mb-3">
              <h5 class="mb-3 text-center" style="font-size: 18px;">Slot</h5>
              <input type="number" class="form-control shadow-none">
           </div>
        </div>
        </nav>
       </div>

        <div class="col-lg-9 col-md-12 px-4">
           <div class="card mb-4 border-0 shadow">
            <div class="row g-0 p-3 align-items-center">
              <div class="col-md-5 mb-lg-0 mb-mb-0 mb-3">
                <img src="images/carousel//Grooming-1.jpg" class="img-fluid rounded">
              </div>
              <div class="col-md-3 px-lg-3 px-md-3 px">
                <h5 class="mb-3">Groom</h5>
                <div class="service-types mb-4">
                  <h6 class="mb-1">Services</h6>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">Full Body Bathing</span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">Ear Cleaning</span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">Nail Clippings</span>
                  </div>
                      <div class="slot mb-4">
                    <h6>Available Slot</h6>
                    <span class="badge rounded-pill bg-light text-dark text-wrap">5</span>
                </div>
              </div>
              <div class="col-md-2 text-align-center">
                 <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                 <a href="#" class="btn btn-sm w-100 text-white shadow-none mb-2" style="background-color: gray;">Details</a>
              </div>
            </div>
          </div>

          <div class="card mb-4 border-0 shadow">
            <div class="row g-0 p-3 align-items-center">
              <div class="col-md-5 mb-lg-0 mb-mb-0 mb-3">
                <img src="images/carousel/checkup.jpg" class="img-fluid rounded">
              </div>
              <div class="col-md-3 px-lg-3 px-md-3 px">
                <h5 class="mb-3">Cheeckup</h5>
                <div class="service-types mb-3">
                <h6 class="mb-1">Services</h6>
                   <span class="badge rounded-pill bg-light text-dark text-wrap">General Wellness</span>
                    <span class="badge rounded-pill bg-light text-dark text-wrap">Puppy/Kitten</span>
                    <span class="badge rounded-pill bg-light text-dark text-wrap">Senior Pet</span>
                    <span class="badge rounded-pill bg-light text-dark text-wrap">Vaccination</span>
                    <span class="badge rounded-pill bg-light text-dark text-wrap">Behavioral</span>
                </div>
                                <div class="slot mb-4">
                  <h6>Available Slot</h6>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">5</span>
                </div>
              </div>
              <div class="col-md-2 text-align-center">
                 <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                 <a href="#" class="btn btn-sm w-100 text-white shadow-none mb-2" style="background-color: gray;">Details</a>
              </div>
            </div>
          </div>

          <div class="card mb-4 border-0 shadow">
            <div class="row g-0 p-3 align-items-center">
              <div class="col-md-5 mb-lg-0 mb-mb-0 mb-3">
                <img src="images/carousel/Vaccine.jpg" class="img-fluid rounded">
              </div>
              <div class="col-md-3 px-lg-3 px-md-3 px">
                  <h5 class="mb-3">Vaccine</h5>
                  <div class="service-types mb-3">
                    <h6 class="mb-1">Services</h6>
                    <span class="badge rounded-pill bg-light text-dark text-wrap">Rabies Vaccine</span>
                    <span class="badge rounded-pill bg-light text-dark text-wrap">Canine Influenza</span>
                    <span class="badge rounded-pill bg-light text-dark text-wrap">Feline Leukemia Virus</span>
                    </div>
                      <div class="slot mb-4">
                    <h6>Available Slot</h6>
                    <span class="badge rounded-pill bg-light text-dark text-wrap">5</span>
                  </div>
              </div>
              
              <div class="col-md-2 text-align-center">
                 <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                 <a href="#" class="btn btn-sm w-100 text-white shadow-none mb-2" style="background-color: gray;">Details</a>
              </div>
            </div>
          </div>

          </div>
          

          



    </div>
  </div>


             
 <?php require('inc/footer.php');?>





</body>
</html>

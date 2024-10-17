<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Critters Agrivet - CONTACT</title>
    <?php require('inc/links.php');?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <?php require('inc/links.php');?>
    
   

  

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
        <div class="col-lg-6 col-md-6 mb-5 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                <iframe class="w-100 rounded mb-4" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d123696.17652061458!2d120.8539778823972!3d14.340131258755854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d42779def01d%3A0xced13867358a2082!2sCritters!5e0!3m2!1sen!2sph!4v1725476937233!5m2!1sen!2sph" height="450" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 mb-5 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                <h5>Address</h5>
                <a href="https://maps.app.goo.gl/4UqRVLp3qLXbkLd29" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                    <i class="bi bi-geo-alt-fill"></i> Dasmarinas, Cavite
                </a>
                
                <h5>Contact Number</h5>
                <a href="tel:09568432651" class="d-inline-block mb-2 text-decoration-none text-dark"> 
                    <i class="bi bi-chat-left-text-fill"></i> 09157678817
                </a>
                <h5>Email</h5>
                <a href="tel:09568432651" class="d-inline-block mb-2 text-decoration-none text-dark"> 
                    <i class="bi bi-chat-left-text-fill"></i> critters@gmail.com
                </a>
                

                <h5 class="mt-4">Follow Us</h5>
                <a href="#" class="d-inline-block text-dark fs-5 me-2">
                    <i class="bi bi-facebook me-1"></i> Critters
                </a>
            </div>
        </div>
    </div>
</div>

</div>
 <?php require('inc/footer.php');?>
</body>
</html>

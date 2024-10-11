<?php 
session_start();
if (isset($_GET['login']) && $_GET['login'] == 'success'): ?>
    <script>
        alert('Logged in successfully');
    </script>
<?php endif; ?>

<nav class="navbar navbar-expand-lg navbar-light bg-danger px-lg-3 py-lg-2 shadow-sm sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">Critters Agrivet</a>
    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active me-2 " aria-current="landingpage.php" href="landingpage.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2 " href="service.php">Service</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2 " href="booking.php">Bookings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2 " href="contact.php">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2 " href="about.php">About</a>
        </li>
      </ul>
      <div class="d-flex">
          <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2 <?php echo isset($_SESSION["id"]) ? "invisible" : ""; ?>" data-bs-toggle="modal" data-bs-target="#loginModal">
              Login
          </button>
          <button type="button" class="btn btn-outline-dark shadow-none <?php echo isset($_SESSION["id"]) ? "invisible" : ""; ?>" data-bs-toggle="modal" data-bs-target="#registerModal">
              Register
          </button>
            <!-- Dropdown -->
    <div id="dropdown" class="dropdown <?php echo isset($_SESSION["id"]) ? "" : "invisible"; ?>">
        <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo isset($_SESSION["firstName"]) ? $_SESSION["firstName"]." ".$_SESSION["lastName"] : ""; ?>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="#">Pet Profile</a></li>
            <li><a class="dropdown-item" href="#">Booking History</a></li>
            <li><a class="dropdown-item" href="./inc/logout.php">Logout</a></li>
        </ul>
    </div>
      </div>
    </div>
  </div>
</nav>


<div class="modal fade <?php echo isset($_SESSION["id"]) ? "invisible" : ""; ?>" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="./inc/login.php" method="post" >
        
      <div class="modal-header">
        <h5 class="modal-title d-flex align-items-center ">
          <i class="bi bi-person-circle fs-3 me-2"></i>User Login</h5>
        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="mb-3">
                 <label for="form-label">Email address</label>
                  <input name="email" type="email" class="form-control shadow--none">
              </div>
              <div class="mb-3">
                  <label for="form-label">Password</label>
                 <input name="password" type="password" class="form-control shadow--none">
              </div>
              <div class="d-flex align-items-center justify-content-between  ">
                <button name="submit" type="submit"  class="btn btn-dark shadow-none">LOGIN</button>
              </div>


          </div>
      </form>

    </div>
  </div>
</div>

<div class="modal fade <?php echo isset($_SESSION["id"]) ? "invisible" : ""; ?>" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="./inc/register.php" method="post">
        
      <div class="modal-header">
        <h5 class="modal-title d-flex align-items-center ">
          <i class="bi bi-person-lines-fill fs-3 me-2"></i> User Registration
        </h5>
        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container-fluid"> 
        <div class="row">
              <div class="col-md-6 ps-0 mb-3">
                 <label class="form-label">First Name</label>
                 <input name="Fname" type="text" class="form-control shadow-none">
              </div>
              <div class="col-md-6 ps-0 mb-3">
                 <label class="form-label">Last Name</label>
                 <input name="Lname" type="text" class="form-control shadow-none">
              </div>
              <div class="col-md-6">
                <label class="form-label">Email</label>
                <input name="email" type="email" class="form-control shadow-none">
            </div>
              <div class="col-md-6 ps-0 mb-3">
                 <label class="form-label">Pet Type</label>
                 <input name="petType" type="text" class="form-control shadow-none">
              </div>
              <div class="col-md-6 ps-0 mb-3">
                 <label class="form-label">Pet Name</label>
                 <input name="petName" type="text" class="form-control shadow-none">
              </div>
             <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label">Password</label>
                 <input name="password" type="password" class="form-control shadow-none">
            </div>
            <div class="col-md-6 p-0 mb-3">
                <label class="form-label">Confirm Password</label>
                  <input name="ConfPassword" type="password" class="form-control shadow-none"> 
              </div>
                </div>
            <div class="text-center my-1">
               <button name="submit" type="submit" class="btn btn-dark shadow-none">REGISTER</button>
                </div>
          </div>
          </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid bg-danger text-light p-3 d-flex align-items-center justify-content-between sticky-top">
    <div id="title">
    
    </div>
        
        <a href="./inc/logout.php" class="btn btn-light btn-sm">LOG OUT</a>
    </div>
    <div class="col-lg-2 bg-danger border-top border-3 border-secondary" id="dashboard-menu">
        <nav class="navbar navbar-expand-lg navbar-danger">
            <div class="container-fluid flex-lg-column align-items-stretch">
                <h4 class="mt-2">ADMIN PANEL</h4>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>
                <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="adminDropdown">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="admin_dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                        <button class="btn text-white px-3 w-100 shadow-none text-start d-flex align-items-center justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#bookingLinks">
                    <span><i class="bi bi-clipboard-check"></i> Bookings</span>
                    <span><i class="bi bi-caret-down-fill"></i></span>
                </button>

                <div class="collapse show px-3 small mb-1" id="bookingLinks">
                    <ul class="nav nav-pills flex-column rounded border border-secondary">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="new_bookings2.php"><i class="bi bi-folder-plus"></i> New Bookings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="bookings_record2.php"><i class="bi bi-bookmark-fill"></i>Bookings Record</a>
                        </li>
                    </ul>
                    </div>

                    <li class="nav-item">
                        <button class="btn text-white px-3 w-100 shadow-none text-start d-flex align-items-center justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#chatLinks">
                    <span><i class="bi bi-chat-dots"></i> Chats</span>
                    <span><i class="bi bi-caret-down-fill"></i></span>
                </button>

                <div class="collapse show px-3 small mb-1" id="chatLinks">
                    <ul class="nav nav-pills flex-column rounded border border-secondary">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="admin_chatbot.php"><i class="bi bi-chat-dots"></i> ChatBot</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="chat_live_message.php"><i class="bi bi-bookmark-fill"></i>Live Message</a>
                        </li>
                    </ul>
                    </div>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="users.php"><i class="bi bi-person"></i> Accounts</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link text-white" href="service_offer.php"><i class="bi bi-heart-pulse"></i> Service & Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="product_offer.php"><i class="bi bi-cart3"></i> Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="carousel.php"><i class="bi bi-images"></i> Carousel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="admin_reviews.php"><i class="bi bi-eye"></i> Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="settings.php"><i class="bi bi-gear"></i> Settings</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>


<!-- Login Modal -->
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="login-form">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-circle fs-3 me-2"></i>USER LOGIN
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="text" name="email" required class="form-control shadow-none">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="pass" required class="form-control shadow-none">
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <button type="submit" class="btn btn-dark shadow-none">Log In</button>
                        <button type="button" class="btn text-secondary text-decoration-none shadow-none p-0" data-bs-toggle="modal" data-bs-target="#forgotModal">Forgot Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="registarModal" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <form id="register-form" >
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-person-lines-fill fs-3 me-2"></i> User registration
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                            Note: Your details must match with your id
                        </span>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Name</label>
                                    <input name="name" type="text" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">EmaiL</label>
                                    <input name="email" type="email" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input name="phonenum" type="number" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Picture</label>
                                    <input name="profile" type="file" accept=".jpg, .jpng, .png, .webp" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Pet Name</label>
                                    <textarea name="pet-name" class="form-control shadow-none" row="1"required></textarea>     
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Pet Picture</label>
                                    <input name="pet-profile" type="file" accept=".jpg, .jpng, .png, .webp" class="form-control shadow-none" required>
                                </div>
                                
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Pet Type</label>
                                    <textarea name="pet-type" class="form-control shadow-none" row="1"required></textarea>     
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Pet Picture</label>
                                    <input name="profile" type="file" accept=".jpg, .jpng, .png, .webp" class="form-control shadow-none" required>
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label">Address</label>
                                    <input type="address" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Password </label>
                                    <input name="pw" type="password" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Confirm Password </label>
                                    <input name="cpw" type="password" class="form-control shadow-none" required>
                                </div>
                            </div>
                        </div>
                            <div class="text-center my1">
                                <button type="submit" class="btn btn-dark shadow-none">REGISTER</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- Forgot Password Modal -->
<div class="modal fade" id="forgotModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="forgot-form">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-circle fs-3 me-2"></i>Forgot Password
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                            Note: A link will be sent to your email to reset the password.
                        </span>
                        <label class="form-label">Email Address</label>
                        <input type="text" name="email" required class="form-control shadow-none">
                    </div>
                    <div class="mb-2 text-end">
                        <button type="button" class="btn shadow-none p-0 me-2" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-dark shadow-none">Send Link</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function() {
    function fetchCmsData() {
        $.ajax({
            type: 'GET',
            url: 'http://localhost/critters/admin/inc/getCMS.php',
            dataType: 'json',
            success: function(response) {
                var cms_title = response[0].title;
                var cms_about = response[0].about;
                if (response.error) {
                    console.error(response.error);
                } else {
                    var htmlContent = '';
                    htmlContent += `
                            <h3 class="mb-0 h-font">${response[0].title}</h3>
                    `;
                    $('#title').html(htmlContent);
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
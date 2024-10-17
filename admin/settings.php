<?php 
//require('inc/essentials.php'); 
//adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Settings</title>
    <?php require('inc/links.php'); ?>
    <style>
        .delete-btn {
            cursor: pointer;
            color: red;
            font-size: 0.9rem;
            text-decoration: underline;
        }
    </style>
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>


<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <h4 class="mb-4">SETTINGS</h4>

            <!-- GENERAL SECTION -->
            <div class="card border-0 shadow-sm mb-4">
                <div id="general" class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="card-title m-0">General Settings</h5>
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">
                            <i class="bi bi-pencil-square"></i> Edit
                        </button>
                    </div>
                    <h6 class="card-subtitle mb-1 fw-bold">Site Title</h6>
                    <p class="card-text" id="site_title"></p>
                    <h6 class="card-subtitle mb-1 fw-bold">About us</h6>
                    <p class="card-text" id="site_about"></p>
                </div>
            </div>

            <!-- GENERAL MODAL -->
            <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title">General Settings</h1>
                        </div>
                        <form action="./inc/editGeneral.php" method="post">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Site Title</label>
                                    <input type="text" name="site_title" id="site_title_inp" class="form-control shadow-none" value="Example Site Title" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">About Us</label>
                                    <textarea name="site_about" id="site_about_inp" class="form-control shadow-none" rows="6" required>We are a fictional company dedicated to providing the best service to our customers. Our mission is to deliver quality and excellence.</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
                                <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- SHUTDOWN SECTION -->
            <!-- <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="card-title m-0">Shutdown Website</h5>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="shutdown_toggle">
                        </div>
                    </div>
                    <p class="card-text">
                        No customers will be allowed to book when shutdown mode is turned on.
                    </p>
                </div>
            </div> -->

            <!-- CONTACTS DETAIL SECTION -->
            <div class="card border shadow-sm mb-4">
                <div id="contact" class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="card-title m-0">Contacts Settings</h5>
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#contacts-s">
                             <i class="bi bi-pencil-square"></i> Edit
                        </button>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <h6 class="card-subtitle mb-1 fw-bold">Address</h6>
                                <p class="card-text" id="address">123 Example Street, Sample City, SC 12345</p>
                            </div>
                            <div class="mb-4">
                                <h6 class="card-subtitle mb-1 fw-bold">Google Map</h6>
                                <p class="card-text" id="gmap">https://maps.google.com/?q=123+Example+Street,+Sample+City</p>
                            </div>
                            <div class="mb-4">
                                <h6 class="card-subtitle mb-1 fw-bold">Viber Contact Message</h6>
                                <p class="card-text">
                                    <i class="bi bi-chat-left-text-fill"></i> <span id="pn1">Hello! You can reach us at +123456789</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <h6 class="card-subtitle mb-1 fw-bold">Social Links</h6>
                                <p class="card-text mb-1">
                                    <i class="bi bi-facebook me-1"></i><span id="fb">https://facebook.com/example</span>
                                </p>
                            </div>
                            <div class="mb-4">
                                <h6 class="card-subtitle mb-1 fw-bold">iFrame</h6>
                                <iframe src="https://www.google.com/maps/embed?..." width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CONTACTS MODAL -->
            <div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Contact Settings</h5>
                        </div>
                        <form action="./inc/editContact.php" method="post">
                        <div class="modal-body">
                            <div class="container-fluid p-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Address</label>
                                            <input type="text" name="address" id="address_inp" class="form-control shadow-none" value="123 Example Street, Sample City, SC 12345" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Google Map Link</label>
                                            <textarea name="gmap_link" id="gmap_outp" class="form-control shadow-none" rows="6" required>https://maps.google.com/?q=123+Example+Street,+Sample+City</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Google Map Embed HTML</label>
                                            <textarea name="gmap" id="gmap_inp" class="form-control shadow-none" rows="6" required>https://maps.google.com/?q=123+Example+Street,+Sample+City</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Viber Number </label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-chat-left-text-fill"></i></span>
                                                <input type="text" name="pn1" id="pn1_inp" class="form-control shadow-none" value="+123456789" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Social Links</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-facebook"></i></span>
                                                <input type="text" name="fb" id="fb_inp" class="form-control shadow-none" value="https://facebook.com/example" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
                            <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- TEAM MANAGEMENT SECTION -->
            <!-- <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="card-title m-0">Team Management</h5>
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#teamModal">
                            <i class="bi bi-pencil-square"></i> Edit
                        </button>
                    </div>

                    <div class="row" id="team-data"> -->
    <!-- Team members will be dynamically populated here -->
    <!-- <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6 class="card-title">Bench Joshua Timonio</h6>
                <p class="card-text">Ang pogi position</p>
                <span class="availability-status">Available</span>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" checked onchange="toggleAvailability(this)">
                    <label class="form-check-label">Available</label>
                </div>
                <span class="delete-btn" onclick="deleteMember(this)">Delete</span>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6 class="card-title">Joshua Timonio</h6>
                <p class="card-text">Pogi Position</p>
                <span class="availability-status">Available</span>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" checked onchange="toggleAvailability(this)">
                    <label class="form-check-label">Available</label>
                </div>
                <span class="delete-btn" onclick="deleteMember(this)">Delete</span>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6 class="card-title">Bench Timonio</h6>
                <p class="card-text">Most handsome</p>
                <span class="availability-status">Available</span>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" checked onchange="toggleAvailability(this)">
                    <label class="form-check-label">Available</label>
                </div>
                <span class="delete-btn" onclick="deleteMember(this)">Delete</span>
            </div>
        </div>
    </div>
</div>
                </div>
            </div> -->

            <!-- TEAM MANAGEMENT MODAL -->
            <div class="modal fade" id="teamModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="teamModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="teamModalLabel">Add Team Member</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="teamForm">
                                <div class="mb-3">
                                    <label for="member_name_inp" class="form-label fw-bold">Name</label>
                                    <input type="text" name="member_name" id="member_name_inp" class="form-control shadow-none" required>
                                </div>
                                <div class="mb-3">
                                    <label for="member_position_inp" class="form-label fw-bold">Position</label>
                                    <input type="text" name="member_position" id="member_position_inp" class="form-control shadow-none" required>
                                </div>
                                <div class="mb-3">
                                    <label for="member_picture_inp" class="form-label fw-bold">Picture</label>
                                    <input type="file" name="member_picture" id="member_picture_inp" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none" required>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" form="teamForm">Submit</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        

        </div>
    </div>
</div>
<script>
    function toggleAvailability(element) {
        const cardBody = element.closest('.card-body');
        const status = cardBody.querySelector('.availability-status');
        if (element.checked) {
            status.textContent = 'Available';
        } else {
            status.textContent = 'Not Available';
        }
    }

    function deleteMember(element) {
        const card = element.closest('.col-md-4');
        card.remove();
    }
$(document).ready(function() {
    function fetchCmsData() {
        $.ajax({
            type: 'GET',
            url: './inc/getCMS.php',
            dataType: 'json',
            success: function(response) {
                var cms_title = response[0].title;
                var cms_about = response[0].about;
                if (response.error) {
                    console.error(response.error);
                } else {
                    var htmlContent = '';
                    htmlContent += `
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h5 class="card-title m-0">General Settings</h5>
                                    <button data-id="${response[0].cms_id}" type="button" class="edit-btn-general btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">
                                        <i  class="bi bi-pencil-square"></i> Edit
                                    </button>
                                </div>
                                <h6 class="card-subtitle mb-1 fw-bold">Site Title</h6>
                                <p class="card-text" id="site_title">${response[0].title}</p>
                                <h6 class="card-subtitle mb-1 fw-bold">About us</h6>
                                <p class="card-text" id="site_about">${response[0].about}</p>
                    `;
                    $('#general').html(htmlContent);
                    var contactHTML = '';
                    contactHTML += `
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <h5 class="card-title m-0">Contacts Settings</h5>
                                        <button data-id="${response[0].cms_id}" type="button" class="btn-edit-contact btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#contacts-s">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </button>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-4">
                                                <h6 class="card-subtitle mb-1 fw-bold">Address</h6>
                                                <p class="card-text" id="address">${response[0].address}</p>
                                            </div>
                                            <div class="mb-4">
                                                <h6 class="card-subtitle mb-1 fw-bold">Google Map</h6>
                                                <a target="_blank" href="${response[0].link_address}" class="card-text" id="gmap">${response[0].address}</a>
                                            </div>
                                            <div class="mb-4">
                                                <h6 class="card-subtitle mb-1 fw-bold">Viber Contact Message</h6>
                                                <p class="card-text">
                                                    <i class="bi bi-chat-left-text-fill"></i> <span id="pn1">Hello! You can reach us at ${response[0].viber}</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-4">
                                                <h6 class="card-subtitle mb-1 fw-bold">Social Links</h6>
                                                <p class="card-text mb-1">
                                                    <i class="bi bi-facebook me-1"></i><span id="fb">${response[0].social}</span>
                                                </p>
                                            </div>
                                            <div class="mb-4">
                                                <h6 class="card-subtitle mb-1 fw-bold">iFrame</h6>
                                                ${response[0].map}
                                            </div>
                                        </div>
                                    </div>
                    `;
                    $('#contact').html(contactHTML);
                } 
                $(document).on('click', '.edit-btn-general', function() {
                    $('#site_title_inp').val(cms_title);
                    $('#site_about_inp').val(cms_about);
                });
                $(document).on('click', '.btn-edit-contact', function() {
                    $('#address_inp').val(response[0].address);
                    $('#pn1_inp').val(response[0].viber);
                    $('#gmap_inp').val(response[0].map);
                    $('#fb_inp').val(response[0].social);
                    $('#gmap_outp').val(response[0].link_address);
                });

            },
            error: function(xhr, status, error) {
                console.error('Error fetching CMS data:', error);
            }
        });
    }
    fetchCmsData();
});
</script>

</body>
</html>

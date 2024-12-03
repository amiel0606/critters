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
        #editor {
            border: 1px solid #ccc;
            padding: 10px;
            min-height: 200px;
            overflow-y: auto;
        }
    </style>
</head>

<body class="bg-light">

    <?php require('inc/header.php'); ?>


    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h4 class="mb-4">SETTINGS</h4>
                <!-- LOGO SECTION -->
                <div class="card border-0 shadow-sm mb-4">
                    <div id="logo" class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Logo Settings</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#logo-edit-modal">
                                <i class="bi bi-pencil-square"></i> Edit
                            </button>
                        </div>
                        <!-- Logo Display -->
                        <div class="logo-container mb-3">
                            <img src="./inc/uploads/logo.png" alt="Logo" id="cms-logo" class="img-fluid"
                                style="max-width: 200px;">
                        </div>
                        <p class="card-text">Current logo of the company.</p>
                    </div>
                </div>

                <!-- Modal for Logo Edit -->
                <div class="modal fade" id="logo-edit-modal" tabindex="-1" aria-labelledby="logo-edit-modalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="logo-edit-modalLabel">Edit Logo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="./inc/editLogo.php" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="logo-file" class="form-label">Upload New Logo</label>
                                        <input type="file" class="form-control" id="logo-file" name="logo"
                                            accept="image/*">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- GENERAL SECTION -->
                <div class="card border-0 shadow-sm mb-4">
                    <div id="general" class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">General Settings</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#general-s">
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
                <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title">General Settings</h1>
                            </div>
                            <form action="./inc/editGeneral.php" method="post">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Site Title</label>
                                        <input type="text" name="site_title" id="site_title_inp"
                                            class="form-control shadow-none" value="Example Site Title" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">About Us</label>
                                        <textarea name="site_about" id="site_about_inp" class="form-control shadow-none"
                                            rows="6"
                                            required>We are a fictional company dedicated to providing the best service to our customers. Our mission is to deliver quality and excellence.</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">CANCEL</button>
                                    <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- MISSION AND VISION SECTION -->
                <div class="card border-0 shadow-sm mb-4">
                    <div id="general" class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Mission & Vision Settings</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#general-m">
                                <i class="bi bi-pencil-square"></i> Edit
                            </button>
                        </div>
                        <h6 class="card-subtitle mb-1 fw-bold">Mission</h6>
                        <p class="card-text" id="vision"> To provide exceptional veterinary</p>
                        <h6 class="card-subtitle mb-1 fw-bold">Vision</h6>
                        <p class="card-text" id="mission"> To provide exceptional veterinary</p>
                    </div>
                </div>

                <!-- MISSION & VISION MODAL -->

                <div class="modal fade" id="general-m" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title">Mission & Vision</h1>
                            </div>
                            <form action="./inc/editMission.php" method="post">
                                <div class="modal-body">
                                    <!-- Mission Section -->
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Mission</label>
                                        <textarea name="mission" id="mission-inp" class="form-control shadow-none"
                                            rows="6" required>
                            To provide exceptional veterinary care through personalized treatment, advanced medical practices, and a caring approach.
                        </textarea>
                                    </div>

                                    <!-- Vision Section -->
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Vision</label>
                                        <textarea name="vision" id="vision-inp" class="form-control shadow-none"
                                            rows="6" required>
                            Ensuring the well-being and quality of life for every pet and peace of mind for every pet owner.
                        </textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">CANCEL</button>
                                    <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>





                <!-- CLINIC SPECIFICATION SECTION -->
                <div class="card border-0 shadow-sm mb-4">
                    <div id="clinic-specify" class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Clinic Specification Settings</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#clinic-specify-modal">
                                <i class="bi bi-pencil-square"></i> Edit
                            </button>
                        </div>
                        <h6 class="card-subtitle mb-1 fw-bold">Clinic Specify</h6>
                        <p class="card-text" id="clinic_specify">The clinic only accepts Dogs and Cats services</p>
                    </div>
                </div>

                <!-- CLINIC SPECIFICATION MODAL -->
                <div class="modal fade" id="clinic-specify-modal" data-bs-backdrop="static" data-bs-keyboard="true"
                    tabindex="-1" aria-labelledby="clinicSpecifyModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title">Clinic Specification</h1>
                            </div>
                            <form action="./inc/editClinicSpecify.php" method="post">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Clinic Services Specification</label>
                                        <textarea name="clinic_specify" id="clinic-specify"
                                            class="form-control shadow-none" rows="6" required>
                            The clinic only accepts Dogs and Cats services.
                        </textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">CANCEL</button>
                                    <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- TERMS AND CONDITIONS SECTION -->
                <div class="card border-0 shadow-sm mb-4">
                    <div id="terms-conditions" class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Terms and Conditions</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#terms-conditions-modal">
                                <i class="bi bi-pencil-square"></i> Edit
                            </button>
                        </div>
                        <h6 class="card-subtitle mb-1 fw-bold">Current Terms</h6>
                        <p class="card-text" id="terms_text">
                            Customers must arrive 15 minutes before their scheduled appointment. Payment for services is
                            required immediately after the session.
                        </p>
                    </div>
                </div>

                <!-- TERMS AND CONDITIONS MODAL -->
                <div class="modal fade" id="terms-conditions-modal" data-bs-backdrop="static" data-bs-keyboard="true"
                    tabindex="-1" aria-labelledby="termsConditionsModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title">Edit Terms and Conditions</h1>
                            </div>
                            <form action="./inc/editTerms.php" method="post">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Terms and Conditions</label>
                                        <textarea name="terms_conditions" id="terms-conditions-text"
                                            class="form-control shadow-none" rows="6" required>
Customers must arrive 15 minutes before their scheduled appointment. Payment for services is required immediately after the session.
                        </textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">CANCEL</button>
                                    <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- CLINIC APPOINTMENT MODAL -->
                <div class="modal fade" id="clinic-appointment-modal" data-bs-backdrop="static" data-bs-keyboard="true"
                    tabindex="-1" aria-labelledby="clinicAppointmentModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title">Edit Appointments Per Day</h1>
                            </div>
                            <form action="./inc/editClinicAppointment.php" method="post">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Maximum haha Per Day</label>
                                        <input type="number" name="max_appointments" id="hello"
                                            class="form-control shadow-none" min="1" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">CANCEL</button>
                                    <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- CLINIC APPOINTMENT SETTINGS SECTION -->
                <div class="card border-0 shadow-sm mb-4">
                    <div id="clinic-appointment" class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Appointment Settings</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#clinic-appointment-modal">
                                <i class="bi bi-pencil-square"></i> Edit
                            </button>
                        </div>
                        <h6 class="card-subtitle mb-1 fw-bold">Maximum Appointments Per Day</h6>
                        <p class="card-text" id="max_appointments">20</p>
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
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#contacts-s">
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
                                    <p class="card-text" id="gmap">
                                        https://maps.google.com/?q=123+Example+Street,+Sample+City</p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold"> Contact Number</h6>
                                    <p class="card-text">
                                        <i class="bi bi-chat-left-text-fill"></i> <span id="pn1">Hello! You can reach us
                                            at +123456789</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Social Links</h6>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-facebook me-1"></i><span
                                            id="fb">https://facebook.com/example</span>
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">iFrame</h6>
                                    <iframe src="https://www.google.com/maps/embed?..." width="600" height="450"
                                        style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CONTACTS MODAL -->
                <div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                    <input type="text" name="address" id="address_inp"
                                                        class="form-control shadow-none"
                                                        value="123 Example Street, Sample City, SC 12345" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Google Map Link</label>
                                                    <textarea name="gmap_link" id="gmap_outp"
                                                        class="form-control shadow-none" rows="6"
                                                        required>https://maps.google.com/?q=123+Example+Street,+Sample+City</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Google Map Embed HTML</label>
                                                    <textarea name="gmap" id="gmap_inp" class="form-control shadow-none"
                                                        rows="6"
                                                        required>https://maps.google.com/?q=123+Example+Street,+Sample+City</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Contact Number </label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i
                                                                class="bi bi-chat-left-text-fill"></i></span>
                                                        <input type="text" name="pn1" id="pn1_inp"
                                                            class="form-control shadow-none" value="+123456789"
                                                            required>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Social Links</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i
                                                                class="bi bi-facebook"></i></span>
                                                        <input type="text" name="fb" id="fb_inp"
                                                            class="form-control shadow-none"
                                                            value="https://facebook.com/example" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">CANCEL</button>
                                    <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- TEAM MANAGEMENT SECTION -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Team Management</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#teamModal">
                                <i class="bi bi-pencil-square"></i> Add
                            </button>
                        </div>

                        <div class="row" id="team-data">
                            <!-- Team members will be dynamically populated here -->
                            <div class="row" id="teamContainer">
                                <!-- Team members will be dynamically injected here -->
                            </div>
                        </div>

                        <!-- TEAM MANAGEMENT MODAL -->
                        <div class="modal fade" id="teamModal" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="teamModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="teamModalLabel">Add Team Member</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="./inc/addTeam.php" method="post" enctype="multipart/form-data"
                                        id="teamForm">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="member_name_inp" class="form-label fw-bold">Name</label>
                                                <input type="text" name="member_name" id="member_name_inp"
                                                    class="form-control shadow-none" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="member_position_inp"
                                                    class="form-label fw-bold">Position</label>
                                                <input type="text" name="member_position" id="member_position_inp"
                                                    class="form-control shadow-none" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="member_picture_inp"
                                                    class="form-label fw-bold">Picture</label>
                                                <input type="file" name="member_picture" id="member_picture_inp"
                                                    accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary"
                                                form="teamForm">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Bootstrap JS -->
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
                        <script
                            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



                    </div>
                </div>
            </div>
            <script>

document.getElementById('applySettings').addEventListener('click', () => {
            const fontSelect = document.getElementById('fontSelect').value;
            const fontSizeSelect = document.getElementById('fontSizeSelect').value;

            const editor = document.getElementById('editor');
            editor.style.fontFamily = fontSelect;
            editor.style.fontSize = fontSizeSelect;

            // Close modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('settingsModal'));
            modal.hide();
        });
                function toggleAvailability(element, memberId) {
                    var isAvailable = $(element).is(':checked') ? 'true' : 'false';
                    $.ajax({
                        url: './inc/toggleAvailability.php',
                        type: 'POST',
                        data: { id: memberId, is_available: isAvailable },
                        success: function (response) {
                            console.log("Response:", response);
                            const data = JSON.parse(response);
                            if (data.success) {
                                alert(data.message);
                            } else {
                                alert(data.message);
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error("Error updating availability:", error);
                        }
                    });
                }

                function deleteMember(memberId) {
                    if (confirm("Are you sure you want to delete this member?")) {
                        $.ajax({
                            url: './inc/deleteMember.php',
                            type: 'POST',
                            data: { id: memberId },
                            success: function (response) {
                                alert('Member deleted');
                                location.reload();
                            },
                            error: function (xhr, status, error) {
                                console.error("Error deleting member:", error);
                            }
                        });
                    }
                }
                $(document).ready(function () {
                    function fetchCmsData() {
                        $.ajax({
                            type: 'GET',
                            url: './inc/getCMS.php',
                            dataType: 'json',
                            success: function (response) {
                                var cms_title = response[0].title;
                                var cms_about = response[0].about;
                                var cms_mission = response[0].mission;
                                var cms_vision = response[0].vision;
                                var cms_max = response[0].max_appointment;
                                var cms_logo = response[0].logo;
                                $('#cms-logo').attr('src', `./inc/uploads/${cms_logo}`);
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
                                                <h6 class="card-subtitle mb-1 fw-bold">  Contact Number</h6>
                                                <p class="card-text">
                                                    <i class="bi bi-chat-left-text-fill"></i> <span id="pn1">Hello! You can reach us at ${response[0].viber}</span>
                                                </p>
                                            </div>
                                                                                        <div class="mb-4">
                                              
                                                <p class="card-text">
                                                   
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
                                    $('#vision').text(cms_vision);
                                    $('#mission').text(cms_mission);
                                    $('#max_appointments').text(cms_max);
                                    var intMax = parseInt(cms_max);
                                    $('#hello').val(cms_max);
                                }
                                $(document).on('click', '.edit-btn-general', function () {
                                    $('#site_title_inp').val(cms_title);
                                    $('#site_about_inp').val(cms_about);
                                    $('#vision-inp').val(cms_vision);
                                    $('#mission-inp').val(cms_mission);
                                });
                                $(document).on('click', '.btn-edit-contact', function () {
                                    $('#address_inp').val(response[0].address);
                                    $('#pn1_inp').val(response[0].viber);
                                    $('#gmap_inp').val(response[0].map);
                                    $('#fb_inp').val(response[0].social);
                                    $('#gmap_outp').val(response[0].link_address);
                                });
                            },
                            error: function (xhr, status, error) {
                                console.error('Error fetching CMS data:', error);
                            }
                        });
                    }
                    fetchCmsData();
                    $.ajax({
                        url: './inc/fetchTeam.php',
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            var teamContainer = $('#teamContainer');
                            teamContainer.empty();
                            data.forEach(function (member) {
                                var availabilityStatus = member.is_available ? 'Available' : 'Not Available';
                                var availabilityChecked = member.is_available ? 'checked' : '';
                                var teamCard = `
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="./inc/uploads/${member.picture}" class="card-img-top" alt="${member.name}">
                            <div class="card-body">
                                <h6 class="card-title">${member.name}</h6>
                                <p class="card-text">${member.position}</p>
                                <span class="availability-status">${availabilityStatus}</span>
                                <div class="form-check form-switch"> 
                                    <input class="form-check-input" type="checkbox" role="switch" ${member.availability == 1 ? 'checked' : ''} onchange="toggleAvailability(this, ${member.team_id})">
                                    <label class="form-check-label">Available</label>
                                </div>
                                <span class="delete-btn" onclick="deleteMember(${member.team_id})">Delete</span>
                            </div>
                        </div>
                    </div>`;
                                teamContainer.append(teamCard);
                            });
                        },
                        error: function (xhr, status, error) {
                            console.error("Error fetching team data:", error);
                        }
                    });
                });
            </script>

</body>

</html>
<?php 
require('inc/essentials.php'); 
adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - BOOKING</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <h3 class="mb-4">SERVICE BOOKING</h3>

            <!-- Service Booking List -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="text-end mb-3">
                        <!-- Trigger Modal for Service -->
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-service-booking">
                            <i class="bi bi-plus-square"></i> Add
                        </button>
                    </div>

                    <div class="table-responsive-lg" style="height: 450px; overflow-y: scroll;">
                        <table class="table table-hover border" style="width: 100%;">
                            <thead class="sticky-top">
                                <tr class="bg-dark text-light">
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Slot</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="booking-data">
                                <!-- Example row with values (1, Vaccination, 5) -->
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Vaccination</td>
                                    <td>5</td>
                                    <td>Pending</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-gray bi bi-image-fill"></button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            <!-- Service Booking Modal -->
            <div class="modal fade" id="add-service-booking" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form id="add_service_booking_form" autocomplete="off">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="serviceModalLabel">Add Service Booking</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Name</label>
                                        <input type="text" name="name" class="form-control shadow-none" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Slot</label>
                                        <input type="number" name="slot" class="form-control shadow-none" required>
                                    </div>

                                    <!-- Offers Section with Checkboxes -->
                                    <div class="col-12 mb-3">
                                        <label class="form-label fw-bold">Offers</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="offers[]" value="Nail Clippings" id="nail-clippings">
                                                    <label class="form-check-label" for="nail-clippings">Nail Clippings</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="offers[]" value="Rabies Vaccine" id="rabies-vaccine">
                                                    <label class="form-check-label" for="rabies-vaccine">Rabies Vaccine</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="offers[]" value="Tooth Brushing" id="tooth-brushing">
                                                    <label class="form-check-label" for="tooth-brushing">Tooth Brushing</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="offers[]" value="Vaccination" id="vaccination">
                                                    <label class="form-check-label" for="vaccination">Vaccination</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="offers[]" value="General Wellness" id="general-wellness">
                                                    <label class="form-check-label" for="general-wellness">General Wellness</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Service Section with Checkboxes -->
                                    <div class="col-12 mb-3">
                                        <label class="form-label fw-bold">Service</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="service[]" value="Groom" id="groom-service">
                                                    <label class="form-check-label" for="groom-service">Groom</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="service[]" value="Checkup" id="checkup-service">
                                                    <label class="form-check-label" for="checkup-service">Checkup</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="service[]" value="Vaccine" id="vaccine-service">
                                                    <label class="form-check-label" for="vaccine-service">Vaccine</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="service[]" value="Dental" id="dental-service">
                                                    <label class="form-check-label" for="dental-service">Dental</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- New Description Field -->
                                    <div class="col-12 mb-3">
                                        <label class="form-label fw-bold">Description</label>
                                        <textarea name="description" class="form-control shadow-none" rows="3" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" onclick="resetForm()" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
                                <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function resetForm() {
        document.getElementById('add_service_booking_form').reset();
    }
</script>

<?php require('inc/scripts.php'); ?>
<script src="scripts/settings

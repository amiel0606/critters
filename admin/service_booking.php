<?php 
// require('inc/essentials.php'); 
// adminLogin();
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
                                <!-- Example row with values -->
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Vaccination</td>
                                    <td>5</td>
                                    <td>Pending</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning bi bi-pencil-fill" data-bs-toggle="modal" data-bs-target="#edit-service-booking"></button> <!-- Edit Button -->
                                        <button class="btn btn-sm btn-gray bi bi-image-fill" data-bs-toggle="modal" data-bs-target="#booking-image" onclick="loadBookingImages(1, 'Vaccination')"></button> <!-- Image Button -->
                                        <button class="btn btn-sm btn-danger bi bi-trash3"></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            <!-- Add Service Booking Modal -->
            <div class="modal fade" id="add-service-booking" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form id="./inc/addBooking.php" autocomplete="off" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="serviceModalLabel">Add Service Booking</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Name</label>
                                        <input type="text" name="bookingName" class="form-control shadow-none" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Slot</label>
                                        <input type="number" name="slot" class="form-control shadow-none" required>
                                    </div>



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

            <!-- Edit Service Booking Modal -->
            <div class="modal fade" id="edit-service-booking" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="editServiceModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form id="edit_service_booking_form" autocomplete="off">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editServiceModalLabel">Edit Service Booking</h1>
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
                                            <!-- Additional checkboxes -->
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
                                            <!-- Additional checkboxes -->
                                        </div>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label class="form-label fw-bold">Description</label>
                                        <textarea name="description" class="form-control shadow-none" rows="3" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" onclick="resetForm()" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
                                <button type="submit" class="btn custom-bg text-white shadow-none">SAVE CHANGES</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


             <!-- Manage booking images modal -->

             <div class="modal fade" id="booking-image" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="booking-name"></h1> <!-- Booking name will be dynamically loaded -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="border-bottom border-3 pb-3 mb-3">
                            <form id="add_image_form">
                                <label class="form-label fw-bold">Add Image</label>
                                <input type="file" name="image" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none mb-3" required>
                                <button type="submit" class="btn custom-bg text-white shadow-none">ADD</button>
                                <input type="hidden" name="booking_id" id="booking_id">
                            </form>
                        </div>
                        <div class="table-responsive-lg" style="height: 350px; overflow-y: scroll;">
                            <table class="table table-hover border" style="width: 100%;">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light sticky-top">
                                        <th scope="col" width="60%">Image</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody id="booking-image-data">
                                    <!-- Dynamic image rows -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function resetForm() {
        document.getElementById('add_service_booking_form').reset();
    }
    $(document).ready(function() {
        $('#add_service_booking_form').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
        });
    });
    $(document).ready(function() {
    $('form').submit(function(event) {
        event.preventDefault();
        var formData = {
            bookingName: $('input[name="bookingName"]').val(),
            slot: $('input[name="slot"]').val(),
            description: $('textarea[name="description"]').val()
        };

        $.ajax({
            type: 'POST',
            url: './inc/addBooking.php',
            data: formData,
            dataType: 'json',
            encode: true
        })
        .done(function(data) {
            console.log(data);
            if (data.status === 'success') {
                alert('Booking added successfully');
                $('form')[0].reset();
            } else {
                alert('Error: ' + data.message);
            }
        });
    });
});

</script>

<?php require('inc/scripts.php'); ?>

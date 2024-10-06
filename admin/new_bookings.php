

<?php 
require('inc/essentials.php'); 
adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - New Bookings</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <h3 class="mb-4">New Bookings</h3>

            <!-- Service Booking List -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="text-end mb-3">
                        <!-- Trigger Modal for Service -->
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-service-booking">
                            <i class="bi bi-plus-square"></i> Add
                        </button> 
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover border">
                            <thead class="sticky-top">
                                <tr class="bg-dark text-light">
                                    <th scope="col">#</th>
                                    <th scope="col">User Details</th>
                                    <th scope="col">Bookins Details</th>
                                    <th scope="col">Action</th>
                                </tr>-
                            </thead>
                            <tbody id="users-data">

                            </tbody>
                        </table>
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
</script>

<?php require('inc/scripts.php'); ?>
<script src="scripts/users.js

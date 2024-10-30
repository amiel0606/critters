<?php 
//  require('inc/essentials.php'); 
//  adminLogin();
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
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-4">New Bookings</h4>
                <!-- Search Bar -->
                <div class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search by pet or owner" aria-label="Search">
                    <button class="btn btn-outline-primary me-2" type="submit">Search</button>

                    <!-- Sorting Dropdown -->
                    <select class="form-select" id="sortBookings" onchange="fetchSortedAppointments()">
                        <option value="thisWeek">This Week</option>
                        <option value="lastWeek">Last Week</option>
                        <option value="lastMonth">Last Month</option>
                    </select>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Pet's Name</th>
                            <th>Pet's Type</th>
                            <th>Owner's Name</th>
                            <th>Breed</th>
                            <th>Service</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="appointments">
                        <!-- Data will be appended here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
// Function to fetch and display appointments based on selected sorting criteria
function fetchSortedAppointments() {
    const sortCriteria = $('#sortBookings').val(); // Get the selected sorting value (thisWeek, lastWeek, lastMonth)
    
    $.ajax({
        type: "GET",
        url: "inc/getAppointments.php",
        data: { sort: sortCriteria }, // Pass sorting criteria to the PHP script
        dataType: "json",
        success: function(data) {
            var tableBody = $("#appointments");
            tableBody.empty(); // Clear existing rows

            // Populate the table with new sorted data
            $.each(data, function(index, appointment) {
                tableBody.append("<tr>");
                tableBody.append("<td>" + appointment.appointment_id + "</td>");
                tableBody.append("<td>" + appointment.petName + "</td>");
                tableBody.append("<td>" + appointment.ownerName + "</td>");
                tableBody.append("<td>" + appointment.petType + "</td>");
                tableBody.append("<td>" + appointment.name + "</td>");
                tableBody.append("<td>" + appointment.booking_date + "</td>");
                tableBody.append("<td>");
                tableBody.append("<button class='btn btn-danger btn-sm'>Cancel Booking</button>");
                tableBody.append("<button class='btn btn-success btn-sm'>Completed</button>");
                tableBody.append("<button class='btn btn-warning btn-sm'>Reschedule</button>"); // Reschedule button
                tableBody.append("</td>");
                tableBody.append("</tr>");
            });
        }
    });
}

// Fetch the appointments initially sorted by 'thisWeek'
$(document).ready(function() {
    fetchSortedAppointments();
});
</script>

<?php require('inc/scripts.php'); ?>
</body>
</html>

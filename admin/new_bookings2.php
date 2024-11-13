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

                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Owner's Name</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>

                    </tr>

                    </tbody>

                    <tbody id="appointments">
                        <!-- Data will be appended here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
function fetchSortedAppointments() {
    const sortCriteria = $('#sortBookings').val(); 
    $.ajax({
        type: "GET",
        url: "inc/getAppointments.php",
        data: { sort: sortCriteria }, 
        dataType: "json",
        success: function(data) {
            var tableBody = $("#appointments");
            tableBody.empty(); 
            $.each(data, function(index, appointment) {
                tableBody.append("<tr>");
                tableBody.append("<td>" + appointment.appointment_id + "</td>");
                tableBody.append("<td>" + appointment.ownerName + "</td>");
                tableBody.append("<td>" + appointment.service_name + "</td>");
                tableBody.append("<td>" + appointment.booking_date + "</td>");
                if (appointment.status === "Completed") {
                    tableBody.append("<td>Completed</td>"); 
                } else {
                    tableBody.append("<button class='btn btn-success btn-sm complete-btn' data-id='" + appointment.appointment_id + "'>Completed</button>");
                }
                tableBody.append("</tr>");
            });
            $('.complete-btn').on('click', function() {
                const appointmentId = $(this).data('id'); 
                updateAppointmentStatus(appointmentId);
            });
        }
    });
}

function updateAppointmentStatus(appointmentId) {
    $.ajax({
        type: "POST",
        url: "./inc/updateAppointmentStatus.php", 
        data: { id: appointmentId, status: 'Completed' }, 
        dataType: "json",
        success: function(response) {
            if (response.success) {
                alert("Appointment marked as completed.");
                fetchSortedAppointments();
            } else {
                alert("Failed to update appointment status: " + (response.error || "Unknown error"));
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Error occurred while updating appointment status: " + textStatus + " - " + errorThrown);
        }
    });
}

$(document).ready(function() {
    fetchSortedAppointments();
});
</script>

</body>
</html>

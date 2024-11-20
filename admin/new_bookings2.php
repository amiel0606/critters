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
                    <select class="form-select" id="sortBookings">
                        <option value="thisWeek">Tommorow</option>
                        <option value="lastWeek">Next Week</option>
                        <option value="lastMonth">Next Month</option>
                    </select>

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
    <tbody id="appointments">
      <!-- Example Data Row -->
      <tr>
        <td>1</td>
        <td>John Doe</td>
        <td>Vaccination</td>
        <td>2024-11-25</td>
        <td>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#emailReminderModal">
            Email Reminder
          </button>
        </td>
      </tr>
      <!-- Additional rows will be appended dynamically here -->
    </tbody>
  </table>
</div>

<!-- Modal for Email Reminder -->
<div class="modal fade" id="emailReminderModal" tabindex="-1" aria-labelledby="emailReminderModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="emailReminderModalLabel">Send Email Reminder</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to send an email reminder for this appointment?</p>
        <div class="text-start">
          <p><strong>Owner's Name:</strong> <span id="modalOwnerName"></span></p>
          <p><strong>Service:</strong> <span id="modalService"></span></p>
          <p><strong>Date:</strong> <span id="modalDate"></span></p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success" id="sendEmailReminderButton">Send Reminder</button>
      </div>
    </div>
  </div>
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
                    tableBody.append("<button class='btn btn-primary btn-sm complete-btn' data-id='" + appointment.appointment_id + "'>Email Reminder</button>");
                    tableBody.append("<button class='btn btn-success btn-sm complete-btn' data-id='" + appointment.appointment_id + "'>Completed</button>");
                    tableBody.append("<button class='btn btn-warning btn-sm complete-btn' data-id='" + appointment.appointment_id + "'>Resched</button>");
                    tableBody.append("<button class='btn btn-danger btn-sm complete-btn' data-id='" + appointment.appointment_id + "'>Cancel</button>");
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

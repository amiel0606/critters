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
            <input id="searchAppointments" class="form-control me-2" type="search" placeholder="Search by pet or owner"
              aria-label="Search">
            <select class="form-select" id="sortBookings">
              <option value="all" selected>All Records</option>
              <option value="thisWeek">This Week</option>
              <option value="nextWeek">Next Week</option>
              <option value="nextMonth">Next Month</option>
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
            </tbody>
          </table>
        </div>

        <!-- Modal for Email Reminder -->
        <div class="modal fade" id="emailReminderModal" tabindex="-1" aria-labelledby="emailReminderModalLabel"
          aria-hidden="true">
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
    $(document).ready(function () {
      function fetchSortedAppointments() {
        const sortCriteria = $('#sortBookings').val();
        const searchTerm = $('#searchAppointments').val();
        $.ajax({
          type: "GET",
          url: "inc/getAppointments.php",
          data: {
            sort: sortCriteria,
            search: searchTerm
          },
          dataType: "json",
          success: function (data) {
            const tableBody = $("#appointments");
            tableBody.empty();

            if (data.length === 0) {
              tableBody.append('<tr><td colspan="5" class="text-center">No results found</td></tr>');
              return;
            }

            $.each(data, function (index, appointment) {
              const rowHTML = `
                        <tr>
                            <td>${appointment.appointment_id}</td>
                            <td>${appointment.ownerName}</td>
                            <td>${appointment.service_name}</td>
                            <td>${appointment.booking_date}</td>
                            <td>
                                ${appointment.status === "Completed"
                  ? "Completed"
                  : `
                                    <button class="btn btn-primary btn-sm btn-remind" data-id="${appointment.appointment_id}">Email Reminder</button>
                                    <button class="btn btn-warning btn-sm complete-btn" data-id="${appointment.appointment_id}">SMS Reminder</button>
                                    <button class="btn btn-success btn-sm complete-btn" data-id="${appointment.appointment_id}">Complete</button>
                                    <button class="btn btn-danger btn-sm btn-cancel" data-id="${appointment.appointment_id}">Cancel</button>
                                `}
                            </td>
                        </tr>
                    `;
              tableBody.append(rowHTML);
            });

            $('.complete-btn').on('click', function () {
              const appointmentId = $(this).data('id');
              updateAppointmentStatus(appointmentId);
            });
          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.error("Error fetching appointments:", textStatus, errorThrown);
          }
        });
      }

      function updateAppointmentStatus(appointmentId) {
        $.ajax({
          type: "POST",
          url: "./inc/updateAppointmentStatus.php",
          data: { id: appointmentId, status: 'Completed' },
          dataType: "json",
          success: function (response) {
            if (response.success) {
              alert("Appointment marked as completed.");
              fetchSortedAppointments();
            } else {
              alert("Failed to update appointment status: " + (response.error || "Unknown error"));
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {
            alert("Error occurred while updating appointment status: " + textStatus + " - " + errorThrown);
          }
        });
      }
      $(document).on('click', '.btn-remind', function () {
        const appointmentId = $(this).data('id');
        $.ajax({
          type: "POST",
          url: "./inc/sendReminder.php", 
          data: { id: appointmentId },
          dataType: "json",
          success: function (response) {
            if (response.status) {
              alert("Reminder email sent successfully!");
            } else {
              alert("Failed to send reminder: " + (response.error || "Unknown error"));
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {
            alert("Error occurred while sending reminder: " + textStatus + " - " + errorThrown);
          }
        });
      });
      $(document).on('click', '.btn-cancel', function () {
        const appointmentId = $(this).data('id');
        $.ajax({
          type: "POST",
          url: "http://localhost/critters/inc/cancelBooking.php", 
          data: { appointmentId: appointmentId, type: 'admin' },
          dataType: "json",
          success: function (response) {
            if (response.status) {
              alert("Appointment Cancelled Successfully!");
              fetchSortedAppointments();
            } else {
              alert("Failed to send reminder: " + (response.error || "Unknown error"));
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {
            alert("Error occurred while sending reminder: " + textStatus + " - " + errorThrown);
          }
        });
      });


      $('#sortBookings').on('change', fetchSortedAppointments);
      $('#searchAppointments').on('input', fetchSortedAppointments);
      fetchSortedAppointments();
    });


  </script>

</body>

</html>
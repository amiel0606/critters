<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Booking History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php require('inc/links.php');?>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .profile-container {
            background-color: #e9ecef;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }
        .profile-header {
            background-color: #cc0000;
            padding: 10px;
            color: white;
        }
        .profile-section {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .save-btn {
            background-color: #28a745;
            color: white;
        }
        .booking-history-table {
            margin-top: 20px;
        }
        .booking-history-table th, .booking-history-table td {
            text-align: center;
            vertical-align: middle;
        }
        .delete-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .delete-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
<?php
  session_start();
  require('inc/header.php');
  ?>
   
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                        Client's Name
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        <li><a class="dropdown-item" href="Show_history.php">Show Booking</a></li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="profile-container">
            <h2>Booking History</h2>

            <!-- Booking History Section -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Owner's Name</th>
                            <th>Service</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="booking-data" >
                        <tr>
                            <td>1</td>
                            <td>Sample</td>
                            <td>Category</td>
                            <td>Grooming</td>
                            <td>10-29-2024</td>

                            <td>
                                <button class="btn btn-warning">Cancel Booking</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function() {
    $.ajax({
        url: './inc/getAppointments.php',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            var tableBody = $("#booking-data");
            tableBody.empty(); 

            if (response.length > 0) {
                $.each(response, function(index, appointment) {
                    var rowHTML = `
                        <tr>
                            <td>${appointment.appointment_id}</td>
                            <td>${appointment.ownerName}</td>
                            <td>${appointment.service}</td>
                            <td>${appointment.categories}</td>
                            <td>${appointment.booking_date}</td>
                            <td>
                                <button class="btn btn-warning" data-id="${appointment.appointment_id}">Cancel Booking</button>
                            </td>
                        </tr>
                    `;
                    tableBody.append(rowHTML);
                });
            } else {
                tableBody.append('<tr><td colspan="7">No appointments found.</td></tr>');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("Error fetching appointments: ", textStatus, errorThrown);
        }
    });
    $(document).on('click', '.btn-warning', function() {
    const appointmentId = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: './inc/cancelBooking.php',
            data: { appointmentId: appointmentId },
            success: function(response) {
                alert('Booking cancelled successfully!');
                window.location.reload();
            },
            error: function(xhr, status, error) {
                alert('Error cancelling booking:', error);
            }
        });
    });
});
</script>
</body>
</html>

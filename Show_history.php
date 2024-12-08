<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Booking History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php require('inc/links.php'); ?>
    <style>
        body {
            background-image: linear-gradient(to right, #ff9f9f, #ff66b2);
        }

        .profile-container {
            background-color: #FDD9E5;
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

        .booking-history-table th,
        .booking-history-table td {
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

        .cancel-btn {
            background-color: #ffc107;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .cancel-btn:hover {
            background-color: #e0a800;
        }

        .review-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .review-btn:hover {
            background-color: #0056b3;
        }

        .completed {
            color: green;
            font-weight: bold;
        }

        .pending {
            color: orange;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    require('inc/header.php');
    ?>
    <div class="container main-container">

        </nav>

        <div class="container">
            <div class="profile-container">
                <h2>Booking History</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Owner's Name</th>
                                <th>Service</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Endorsed By</th> <!-- New Column -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="booking-data">
                            <tr>
                                <td>1</td>
                                <td>Sample</td>
                                <td>Category</td>
                                <td>Grooming</td>
                                <td>10-29-2024</td>
                                <td class="completed">Completed</td>
                                <td>John Doe</td> <!-- Example Endorsed By -->
                                <td>
                                    <button class="btn btn-warning cancel-btn">Cancel Booking</button>
                                    <button class="btn btn-primary review-btn" data-bs-toggle="modal" data-bs-target="#reviewModal">Add Review</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Buddy</td>
                                <td>John Doe</td>
                                <td>Cat</td>
                                <td>Boarding</td>
                                <td>10-15-2024</td>
                                <td>Jane Smith</td> <!-- Example Endorsed By -->
                                <td class="pending">Pending</td>
                                <td>
                                    <button class="btn btn-warning cancel-btn">Cancel Booking</button>
                                </td>
                            </tr>
                        </tbody>


                    </table>
                </div>
            </div>
        </div>

        <!-- Review Modal -->
        <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reviewModalLabel">Customer Reviews</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="userId" value="<?php echo $_SESSION['id']; ?>">
                        <!-- Hidden input for user ID -->

                        <div class="review-form-container">
                            <div class="review-form">
                                <div class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                                    <div class="container-fluid flex-lg-column align-items-stretch">
                                        <h4 class="mt-0">Review Options</h4>
                                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#filterDropdown" aria-controls="navbarNav"
                                            aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>
                                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-1"
                                            id="filterDropdown">
                                            <div class="border bg-light p-3 rounded mb-3">
                                                <h5 class="mb-3" style="font-size: 22px;">Submit a Review</h5>
                                                <input type="text" name="appointment-id" id="appointment-id">
                                                <textarea id="reviewText" class="form-control mb-3" rows="5"
                                                    placeholder="Write your review here..."></textarea>
                                                <div class="rating mb-3">
                                                    <label for="rating" class="form-label">Rating:</label>
                                                    <select id="rating" class="form-select w-auto">
                                                        <option value="5">5 Stars</option>
                                                        <option value="4">4 Stars</option>
                                                        <option value="3">3 Stars</option>
                                                        <option value="2">2 Stars</option>
                                                        <option value="1">1 Star</option>
                                                    </select>
                                                </div>
                                                <button id="submitReview" class="btn btn-primary mt-3">Submit
                                                    Review</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                        console.log(response);

                        tableBody.empty();
                        if (response.length > 0) {
                            $.each(response, function(index, appointment) {
                                // Check if 'endorsed_by' is empty and set to 'N/A' if so
                                var endorsedBy = appointment.endorsed_by ? appointment.endorsed_by : 'N/A';

                                if (appointment.status === 'Active') {
                                    var rowHTML = `
            <tr>
                <td>${appointment.appointment_id}</td>
                <td>${appointment.ownerName}</td>
                <td>${appointment.service_name}</td>
                <td>${appointment.category_name}</td>
                <td>${appointment.booking_date}</td>
                <td>${appointment.status}</td>
                <td>${endorsedBy}</td> <!-- Use the 'endorsedBy' variable here -->
                <td>
                    <button class="btn btn-warning" data-id="${appointment.appointment_id}">Cancel Booking</button>
                </td>
            </tr>
        `;
                                    tableBody.append(rowHTML);
                                } else if (appointment.status === 'Completed') {
                                    var rowHTML = `
            <tr>
                <td>${appointment.appointment_id}</td>
                <td>${appointment.ownerName}</td>
                <td>${appointment.service_name}</td>
                <td>${appointment.category_name}</td>
                <td>${appointment.booking_date}</td>
                <td>${appointment.status}</td>
                <td>${endorsedBy}</td> <!-- Use the 'endorsedBy' variable here -->
                <td>
                    <button class="btn-review-modal btn btn-primary review-btn" data-bs-toggle="modal" data-id="${appointment.appointment_id}" data-bs-target="#reviewModal">Add Review</button>
                </td>
            </tr>
        `;
                                    tableBody.append(rowHTML);
                                } else if (appointment.status === 'Reviewed') {
                                    var rowHTML = `
            <tr>
                <td>${appointment.appointment_id}</td>
                <td>${appointment.ownerName}</td>
                <td>${appointment.service_name}</td>
                <td>${appointment.category_name}</td>
                <td>${appointment.booking_date}</td>
                <td>${appointment.status}</td>
                <td>Completed</td>
            </tr>
        `;
                                    tableBody.append(rowHTML);
                                }
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
                        data: {
                            appointmentId: appointmentId,
                            type: 'user'
                        },
                        success: function(response) {
                            alert('Booking cancelled successfully!');
                            window.location.reload();
                        },
                        error: function(xhr, status, error) {
                            alert('Error cancelling booking:', error);
                        }
                    });
                });
                $(document).on('click', '.btn-review-modal', function() {
                    const appointmentId = $(this).data('id');
                    $('#appointment-id').val(appointmentId);
                });
                $('#submitReview').on('click', function() {
                    const reviewText = $('#reviewText').val();
                    const rating = $('#rating').val();
                    const userId = $('#userId').val();
                    const appointmentId = $('#appointment-id').val();
                    if (!reviewText || !rating || !appointmentId) {
                        alert("Please fill in all fields.");
                        return;
                    }
                    $.ajax({
                        type: "POST",
                        url: "./inc/addReview.php",
                        data: {
                            review: reviewText,
                            rate: rating,
                            user_id: userId,
                            appointment_id: appointmentId
                        },
                        success: function(response) {
                            alert("Review submitted successfully!");
                            $('#reviewModal').modal('hide');
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.log("Error submitting review: ", error);
                            alert("There was an error submitting your review. Please try again.");
                        }
                    });
                });
            });
        </script>
</body>

</html>
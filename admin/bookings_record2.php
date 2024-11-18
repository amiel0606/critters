<?php
// require('inc/essentials.php'); 
// adminLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Previous Bookings</title>

    <!-- Include Bootstrap 5 and other necessary CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php require('inc/links.php'); ?>
</head>

<body class="bg-light">

    <!-- Include header -->
    <?php require('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="mb-0">Previous Bookings</h4>
                    <!-- Search Bar -->
                    <input class="form-control me-2" id="search-history" type="search" placeholder="Search by pet or owner"
                        aria-label="Search">
                    <select class="form-select" id="sortBookings">
                        <option value="thisWeek">This Week</option>
                        <option value="lastWeek">Last Week</option>
                        <option value="lastMonth">Last Month</option>
                    </select>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Pet's Name</th>
                                <th>Owner's Name</th>
                                <th>Breed</th>
                                <th>Service</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="appointmentTable">
                            <tr>

                            </tr>
                            <!-- You can add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and other necessary scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <?php require('inc/scripts.php'); ?>
    <script>
        $(document).ready(function () {
            function fetchHistory() {
                const searchTerm = $('#search-history').val();
                const sortOption = $('#sortHistory').val();

                $.ajax({
                    url: './inc/getHistory.php',
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        search: searchTerm,
                        sort: sortOption
                    },
                    success: function (data) {
                        $('#appointmentTable').empty(); 
                        $.each(data, function (index, appointment) {
                            var dataHTML = `
                        <tr>
                            <td>${appointment.appointment_id}</td>
                            <td>${appointment.petName}</td>
                            <td>${appointment.ownerName}</td>
                            <td>${appointment.breed}</td>
                            <td>${appointment.service_name}</td>
                            <td>${appointment.booking_date}</td>
                            <td>
                                <button data-id="${appointment.appointment_id}" class="btn btn-danger btn-sm">Delete Booking</button>
                            </td>
                        </tr>
                    `;
                            $('#appointmentTable').append(dataHTML);
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error("Error fetching history:", error);
                    }
                });
            }
            $('#search-history').on('input', fetchHistory);
            $('#sortBookings').on('change', fetchHistory);
            fetchHistory();
        });
    </script>

</body>

</html>
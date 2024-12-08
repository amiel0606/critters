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
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="Search">Search</label>
                        <input type="text" id="search-history" class="form-control"
                            placeholder="Search by Pet or Owner Name">
                    </div>
                    <div class="col-md-6">
                        <label for="dateFilter" class="form-label">Select Date</label>
                        <input type="date" id="dateFilter" class="form-control" />
                    </div>

                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Appointment ID</th>
                            <th>Pet Name</th>
                            <th>Owner Name</th>
                            <th>Breed</th>
                            <th>Service</th>
                            <th>Endorsed To</th>
                            <th>Booking Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="appointmentTable">
                        <!-- Fetched data will be appended here -->
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
                        console.log(data);
                        
                        $('#appointmentTable').empty(); 
                        if (data.length === 0) {
                            $('#appointmentTable').append('<tr><td colspan="7" class="text-center">No results found</td></tr>');
                            return;
                        }

                        $.each(data, function (index, appointment) {
                            const dataHTML = `
                    <tr>
                        <td>${appointment.appointment_id}</td>
                        <td>${appointment.petName}</td>
                        <td>${appointment.ownerName}</td>
                        <td>${appointment.breed}</td>
                        <td>${appointment.service_name}</td>
                        <td>${appointment.endorsed_to}</td>
                        <td>${appointment.booking_date}</td>
                        <td>
                            <button data-id="${appointment.appointment_id}" class="btn btn-danger btn-sm">Delete</button>
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
            $('#sortHistory').on('change', fetchHistory);
            fetchHistory();
        });
    </script>

</body>

</html>
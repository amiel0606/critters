<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php'); ?>

    <title>Customer Information</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
}

.card-header {
    background-color: #333;
    color: white;
    font-weight: bold;
}

.card-body {
    background-color: #fff;
    padding: 20px;
}

table {
    margin-top: 20px;
}

th {
    text-align: left;
}

th, td {
    vertical-align: middle;
}

.badge {
    font-size: 14px;
}

</style>
<body>
<?php require('inc/header.php'); ?>

    <div class="container mt-4">
        <div class="card mb-4">
            <div class="card-header">
                <h4 class="card-title">Customer Information</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <strong>Name:</strong> John Doe
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Email:</strong> johndoe@example.com
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Contact No:</strong> +1234567890
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Total Pets:</strong> 2
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h4 class="card-title">Customer Pets</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Pet Name</th>
                            <th>Breed</th>
                            <th>Age</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Fluffy</td>
                            <td>Golden Retriever</td>
                            <td>4 Years</td>
                        </tr>
                        <tr>
                            <td>Whiskers</td>
                            <td>Siamese</td>
                            <td>2 Years</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h4 class="card-title">Booking History</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Date</th>
                            <th>Service</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#1001</td>
                            <td>2024-10-15</td>
                            <td>Checkup</td>
                            <td><span class="badge bg-success">Completed</span></td>
                        </tr>
                        <tr>
                            <td>#1002</td>
                            <td>2024-11-05</td>
                            <td>Vaccination</td>
                            <td><span class="badge bg-success">Completed</span></td>
                        </tr>
                        <tr>
                            <td>#1003</td>
                            <td>2024-11-20</td>
                            <td>Grooming</td>
                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>

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
            <h4 class="mb-4">New Bookings</h4>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Pet's Name</th>
                            <th>Owner's Name</th>
                            <th>Breed</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Sample</td>
                            <td>Sample</td>
                            <td>Dog</td>
                            <td>10-29-2004</td>
                            <td>
                                <button class="btn btn-success btn-sm">Accept Booking</button>
                                <button class="btn btn-danger btn-sm">Cancel Booking</button>
                            </td>
                        </tr>
                        <!-- You can add more rows as needed -->
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                <h5>Accept Booking</h5>
                <form action="./inc/acceptBooking.php" method="post">
                    <div class="mb-3">
                        <label for="patient_number" class="form-label">Patient Number</label>
                        <input type="text" class="form-control" id="patient_number" name="patient_number" required>
                        <div class="form-text">Note: Accept Booking ...</div>
                    </div>
                    <button type="submit" class="btn custom-bg text-white">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require('inc/scripts.php'); ?>
</body>
</html>

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
              <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search by pet or owner" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>
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
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Sample</td>
                            <td>Sample</td>
                            <td>Dog</td>
                            <td>Grooming</td>
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

            
        </div>
    </div>
</div>

<?php require('inc/scripts.php'); ?>
</body>
</html>

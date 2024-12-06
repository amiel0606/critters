<?php 
//  require('inc/essentials.php'); 
//  adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - User</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-4">Pets</h3>
            <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search pet" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
</form>
</div>

            <!-- Service Booking List -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="text-end mb-3">
                        <!-- Trigger Modal for Service -->
                        <!--<button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-service-booking">
                            <i class="bi bi-plus-square"></i> Add
                        </button> -->
                    </div>

                    <div class="table-responsive">
                <table class="table table-hover border" style="min-width: 1300px;">
                    <thead class="sticky-top">
                        <tr class="bg-dark text-light">
                            <th scope="col">#</th>
                            <th scope="col">Pet Name</th>
                            <th scope="col">Pet Type</th>
                            <th scope="col">Breed</th>
                            <th scope="col">Birth Date</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="users_data">
                        <!-- Example row (you will generate these dynamically with data) -->
                        <tr>
                            <td>1</td>
                            <td>Aso</td>
                            <td>Dog</td>
                            <td>Bulldog</td>
                            <td>12/25/2021</td>
                            <td>Male</td>
                            <td>
                                <button class="btn btn-danger btn-sm" onclick="deleteUser(1)">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
</div>

                </div>
            </div>

 
           
        </div>
    </div>
</div>

<?php require('inc/scripts.php'); ?>
<script src="scripts/users.js

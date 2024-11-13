<?php 
// require('inc/essentials.php'); 
// adminLogin();
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

                <!-- Pets Section -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3>Pets</h3>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search pet" aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </form>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
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
                                <tbody id="pets_data">
                                    <!-- Sample pet data row (dynamic data can replace this) -->
                                    <tr>
                                        <td>1</td>
                                        <td>Aso</td>
                                        <td>Dog</td>
                                        <td>Bulldog</td>
                                        <td>12/25/2021</td>
                                        <td>Male</td>
                                        <td>
                                            <button class="btn btn-danger btn-sm" onclick="deletePet(1)">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Accounts Section -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3>User Account</h3>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search by owner" aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </form>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover border" style="min-width: 1300px;">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Name</th>
                                    </tr>
                                </thead>
                                <tbody id="users_data">
                                    <!-- User data will be populated here dynamically -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                
            </div>
        </div>
    </div>

    <?php require('inc/scripts.php'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Script to Fetch User Data -->
    <script>
        $(document).ready(function() {
            // Fetch user data for "Accounts" section
            $.ajax({
                url: './inc/getUsers.php', // Path to PHP script for fetching user data
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#users_data').empty(); // Clear any existing data
                    data.forEach(function(user, index) {
                        $('#users_data').append(`
                            <tr>
                                <td>${index + 1}</td>
                                <td>${user.username}</td>
                                <td>${user.firstName} ${user.lastName}</td>
                            </tr>
                        `);
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching user data:', error);
                }
            });
        });
    </script>

</body>
</html>

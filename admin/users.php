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
                    <h3 class="mb-4">User</h3>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search by owner"
                            aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </form>
                </div>

                <!-- Service Booking List -->
                <div class="card border-0 shadow-sm mb-4">
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
                                        <th scope="col">Username</th>
                                        <th scope="col">Name</th>
                                    </tr>
                                </thead>
                                <tbody id="users_data">
                                    <tr>
                                        <td>1</td>
                                        <td>John Doe</td>
                                        <td>johndoe@example.com</td>
                                        <td>Active</td>
                                        <td>2024-10-12</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    
                    </>
                </div>
            </div>
        </div>
    </div>
    <?php require('inc/scripts.php'); ?>
    <script>
$(document).ready(function() {
    // Fetch user data
    $.ajax({
        url: './inc/getUsers.php', 
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            console.log(data);
            
            $('#users_data').empty();
            data.forEach(function(user, index) {
                $('#users_data').append(`
                    <tr>
                        <td>${user.id}</td>
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
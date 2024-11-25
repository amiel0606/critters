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
                    <h3>User & Pets Account</h3>
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
                                        <th scope="col">Username</th>
                                        <th scope="col">Owner Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody  id="users_data" >
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Accounts Section -->

                <!-- Admin Section -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3>Admin Account</h3>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search by owner"
                            aria-label="Search">
                    </form>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAdminModal">Add
                        Admin</button>
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
                                        <th scope="col">Password</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="admin-data" >
                                <tr>
                                    <td>1</td>
                                    <td>admin123</td>
                                    <td>John Doe</td>
                                    <td>Password</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning me-2" data-bs-toggle="modal" data-bs-target="#editAdminModal">
                                            Edit
                                        </button>
                                        <button class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Add Admin Modal -->
                <div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="addAdminModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addAdminModalLabel">Add Admin</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="./inc/addAdmin.php" method="POST" id="addAdminForm">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" id="username"
                                            placeholder="Enter username">
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">First name</label>
                                        <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Enter first name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Last name</label>
                                        <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Enter last name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="accountType" class="form-label">Account Type</label>
                                        <select class="form-select" name="accountType" id="accountType">
                                            <option value="Admin">Admin</option>
                                            <option value="Secretary">Secretary</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pass" class="form-label">Password</label>
                                        <input type="password" name="pass" class="form-control" id="pass" placeholder="Enter Password">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Customer Information Modal -->
<div class="modal fade" id="customerInfoModal" tabindex="-1" aria-labelledby="customerInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customerInfoModalLabel">Customer Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Customer Information -->
                <div class="container mt-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="card-title">Customer Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <strong>Name:</strong> <span id="customer-name">John Doe</span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Email:</strong> <span id="customer-email">johndoe@example.com</span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Contact No:</strong> <span id="customer-contact">+1234567890</span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Total Pets:</strong> <span id="customer-pets">2</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Customer Pets Section -->
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
                                <tbody id="pet-list">
                                    <!-- Example Pet Data -->
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

                    <!-- Booking History Section -->
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
                                <tbody id="booking-history">
                                    <!-- Example Booking Data -->
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


    <?php require('inc/scripts.php'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Script to Fetch User Data -->
    <script>
        
        function acceptUser(id) {
            alert('User with ID ' + id + ' accepted!');
        }
        $(document).ready(function () {
            $.ajax({
                url: './inc/getUsers.php',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    $('#users_data').empty();
                    data.forEach(function (user, index) {
                        $('#users_data').append(`
                            <tr>
                                <td>${user.id}</td>
                                <td>${user.username}</td>
                                <td>${user.firstName} ${user.lastName}</td>
                                <td>${user.action}</td>
                                  <td>
                                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#customerInfoModal" onclick="showCustomerInfo('John Doe', 'johndoe@example.com', '+1234567890', 2, 'Fluffy, Golden Retriever, 4 Years; Whiskers, Siamese, 2 Years', '#1001, 2024-10-15, Checkup, Completed; #1002, 2024-11-05, Vaccination, Completed')">View</button>


                                    
                                </td>
                            </tr>
                        `);
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching user data:', error);
                }
            });
            
            $.ajax({
                url: './inc/getAdmin.php',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#admin-data').empty();
                    data.forEach(function (admin, index) {
                        $('#admin-data').append(`
                            <tr>
                                <td>${admin.id}</td>
                                <td>${admin.username}</td>
                                <td>${admin.firstName} ${admin.lastName}</td>
                                <td>
                                    <button class="btn btn-warning">Edit</button>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        `);
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching user data:', error);
                }
            });
        });
    </script>

</body>

</html>
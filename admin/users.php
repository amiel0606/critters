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
                                        <th scope="col">Pet Name</th>
                                        <th scope="col">Pet Type</th>
                                        <th scope="col">Breed</th>
                                        <th scope="col">Birth Date</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Unique</th>
                                    </tr>
                                </thead>
                                <tbody id="pets_data">
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
                <tbody>
                    <!-- Example Row -->
                    <tr>
                        <th scope="row">1</th>
                        <td>john_doe</td>
                        <td>John Doe</td>
                        <td>12345</td>
                        <td>
                            <button class="btn btn-success" onclick="acceptUser(1)">Accept</button>
                            <button class="btn btn-danger" onclick="acceptUser(1)">Decline</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>jane_smith</td>
                        <td>Jane Smith</td>
                        <td>123345</td>
                        <td>
                            <button class="btn btn-success" onclick="acceptUser(2)">Accept</button>
                            <button class="btn btn-danger" onclick="acceptUser(1)">Decline</button>
                        </td>
                    </tr>
                    <!-- More rows can be added here -->
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
         function acceptUser(id) {
        // Example function to handle the "Accept" button click.
        // This can be replaced with your actual logic, e.g., sending data to a server.
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
                                
                                
                            </tr>
                        `);
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching user data:', error);
                }
            });
            $.ajax({
                url: './inc/getAllPets.php',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    $('#pets_data').empty();
                    if (data.length === 0) {
                        $('#pets_data').append(`
                            <tr>
                                <td>NO DATA YET</td>
                            </tr>
                        `);
                    } else {
                        data.forEach(function (pet, index) {
                            $('#pets_data').append(`
                            <tr>
                                <td>${pet.id}</td>
                                <td>${pet.firstName} ${pet.lastName}</td>
                                <td>${pet.petName}</td>
                                <td>${pet.petType}</td>
                                <td>${pet.breed}</td>
                                <td>${pet.birth_date}</td>
                                <td>${pet.gender}</td>
                                
                            </tr>
                        `);
                        });
                        $('.btn-delete').click(function(){

                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching user data:', error);
                }
            });
        });
    </script>

</body>

</html>
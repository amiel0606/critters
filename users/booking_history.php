<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Booking History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .profile-container {
            background-color: #e9ecef;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }
        .profile-header {
            background-color: #cc0000;
            padding: 10px;
            color: white;
        }
        .profile-section {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .save-btn {
            background-color: #28a745;
            color: white;
        }
        .booking-history-table {
            margin-top: 20px;
        }
        .booking-history-table th, .booking-history-table td {
            text-align: center;
            vertical-align: middle;
        }
        .delete-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .delete-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #cc0000;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color: white;">Critters Agrivet</a>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color: white;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color: white;">Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color: white;">Bookings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color: white;">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color: white;">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                        Client's Name
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        <li><a class="dropdown-item" href="pet_profile.php">Pet Profile</a></li>
                        <li><a class="dropdown-item" href="booking_history.php">Booking History</a></li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="profile-container">
            <h2>Booking History</h2>

            <!-- Booking History Section -->
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
                                <button class="delete-btn">Delete</button>
                            </td>
                        </tr>
                        <!-- You can add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

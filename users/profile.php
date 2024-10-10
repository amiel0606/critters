<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
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
            background-color: #d63384;
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
            <h2>Profile</h2>

            <!-- Basic Information Section -->
            <div class="profile-section">
                <h4>Basic Information</h4>
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="ownerName" class="form-label">Owner's Name</label>
                            <input type="text" class="form-control" id="ownerName" placeholder="Owner's Name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="petName" class="form-label">Pet's Name</label>
                            <input type="text" class="form-control" id="petName" placeholder="Pet's Name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="birthdate" class="form-label">Birthdate</label>
                            <input type="date" class="form-control" id="birthdate">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <input type="text" class="form-control" id="gender" placeholder="Gender">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="Address">
                        </div>
                    </div>
                    <button type="submit" class="btn save-btn">Save Changes</button>
                </form>
            </div>

            <!-- Profile Picture and Change Password Section -->
            <div class="row">
                <div class="col-md-6">
                    <div class="profile-section">
                        <h4>Picture</h4>
                        <form>
                            <div class="mb-3">
                                <label for="profilePicture" class="form-label">New Picture</label>
                                <input class="form-control" type="file" id="profilePicture">
                            </div>
                            <button type="submit" class="btn save-btn">Save Changes</button>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="profile-section">
                        <h4>Change Password</h4>
                        <form>
                            <div class="mb-3">
                                <label for="newPassword" class="form-label">New Password</label>
                                <input type="password" class="form-control" id="newPassword" placeholder="New Password">
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password">
                            </div>
                            <button type="submit" class="btn save-btn">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

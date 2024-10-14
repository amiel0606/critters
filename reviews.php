<?php
session_start();
require('inc/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Critter Agrivet - Customer Reviews</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php require('inc/links.php'); ?>
    <style>
       .review-form {
    padding: 100px; /* Increased padding for a bigger appearance */
    border-radius: 20px; /* Adjusted rounded corners for a more modern look */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Enhanced shadow for depth */
    max-width: 800px; /* Increased the maximum width of the review form */
    margin: 0 auto; /* Center the review form */
}

    </style>
</head>
<body class="bg-light">

<div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">Customer Reviews</h2>
    <div class="h-line bg-dark"></div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-lg-0 d-flex justify-content-center">
            <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                <div class="container-fluid flex-lg-column align-items-stretch">
                    <h4 class="mt-2">Review Options</h4>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                        <div class="border bg-light p-3 rounded mb-3 review-form">
                            <h5 class="mb-3" style="font-size: 22px;">Submit a Review</h5> <!-- Increased font size -->
                            <textarea class="form-control mb-3" rows="5" placeholder="Write your review here..."></textarea> <!-- Increased row count -->
                            <div class="rating mb-3">
                                <label for="rating" class="form-label">Rating:</label>
                                <select id="rating" class="form-select w-auto">
                                    <option value="5">5 Stars</option>
                                    <option value="4">4 Stars</option>
                                    <option value="3">3 Stars</option>
                                    <option value="2">2 Stars</option>
                                    <option value="1">1 Star</option>
                                </select>
                            </div>
                            <button class="btn btn-primary mt-3">Submit Review</button> <!-- Changed to blue -->
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-lg-9 col-md-12 px-4">
            <!-- Removed the Recent Reviews section -->
        </div>
    </div>
</div>

<footer class="text-center py-3 bg-light text-dark">
    <div class="social-icons mb-2">
        <a href="#" class="text-dark"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="text-dark"><i class="fab fa-instagram"></i></a>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
</body>
</html>

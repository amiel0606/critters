<?php
session_start();
require('inc/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php require('inc/links.php'); ?>
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }
        .product-gallery-container {
            padding: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .product-card {
            transition: transform 0.3s ease;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            width: 100%;
        }
        .product-card:hover {
            transform: translateY(-10px);
        }
        .product-image {
            object-fit: cover;
            height: 200px;
        }
        .navbar {
            width: 100%;
        }
    </style>
</head>
<body class="bg-light">

<div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">Product Gallery</h2>
    <div class="h-line bg-dark"></div>
</div>

<div class="product-gallery-container">
    <div id="product-gallery" class="row row-cols-1 row-cols-md-3 g-4">

    </div>
</div>

 <?php require('inc/footer.php');?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

<script>
function createProductCard(product) {
    return `
        <div class="col"> <!-- Ensure three equal-width columns in a row, add margin for spacing -->
            <div class="card product-card h-100 text-center"> <!-- Center align content -->
                <img src="./admin/inc/uploads/${product.image}" class="card-img-top product-image mx-auto" alt="${product.name}" style="width: 300px; height: 200px; object-fit: cover;"> <!-- Center image, set image size -->
                <div class="card-body d-flex flex-column justify-content-between"> <!-- Flexbox for proper alignment -->
                    <h5 class="card-title">${product.name}</h5>
                    <p class="card-text text-danger">${product.price}</p> <!-- Ensure price is red -->
                    <p class="card-text">${product.description}</p>
                </div>
            </div>
        </div>
    `;
}

const gallery = document.getElementById('product-gallery');

$.ajax({
    type: "GET",
    url: './admin/inc/getProducts.php',
    dataType: 'json',
    success: function(data) {
        if (data.length === 0) {
            gallery.innerHTML = '<div class="text-center">No Products yet</div>';
        } else {
            data.forEach(product => {
                gallery.innerHTML += createProductCard(product);
            });
        }
    },
    error: function(xhr, status, error) {
        console.error('Error:', error);
    }
});

</script>

</body>
</html>
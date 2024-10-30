<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php require('inc/links.php');?>
    <style>
        body {
            background-color: #f7f7f7;
        }
        .product-card {
            transition:  0.3s ease;
            max-width: 300px;
            margin: 0 auto;
            border-top: 4px solid var(--dark); 
        }
        .product-card:hover {
            transform: scale(1.03); 
            transition: all 0.3s;
            border-top-color: var(--teal);
        }
        .product-image {
            object-fit: cover;
            height: 200px;
        }
        .h-line {
            width: 100px;
            height: 3px;
            margin: 0 auto;
        }
    </style>
</head>
<body class="bg-light">
<?php
        session_start();
        require('inc/header.php');
    ?>

    <!-- Header Section -->
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Product Gallery</h2> 
        <div class="h-line bg-dark"></div> <!-- Horizontal line below title -->
        <p class="text-center mt-3">
            Explore our range of high-quality products designed to solve various problems and meet your needs.
        </p>
    </div>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="product-gallery">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
$(document).ready(function() {
    $.ajax({
        url: './admin/inc/getProducts.php', 
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            const gallery = $('#product-gallery');
            data.forEach(product => {
                const productCard = createProductCard(product);
                gallery.append(productCard); 
            });
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });

    function createProductCard(product) {
        return `
            <div class="col">
                <div class="card product-card h-100 shadow bg-white rounded p-4">
                    <img src="./admin/inc/uploads/${product.image}" class="card-img-top product-image" alt="${product.name}">
                    <div class="card-body text-center">
                        <h5 class="card-title">${product.name}</h5>
                        <p class="card-text text-danger">${product.price}</p>
                        <p class="card-text">${product.description}</p>
                    </div>
                </div>
            </div>
        `;
    }
});
    </script>
 <?php require('inc/footer.php');?>

</body>
</html>
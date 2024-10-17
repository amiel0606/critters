<?php 
//  require('inc/essentials.php'); 
//  adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Product</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4">
            <h4 class="mb-4">Product Management</h4>

            <!-- Add Category Modal -->
            <div class="modal fade" id="product-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="./inc/addProduct.php" method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="product_name_inp" class="form-label">Product Name</label>
                                    <input type="text" name="name" id="product_name_inp" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" name="description" id="description" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" name="price" id="price" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Upload Image</label>
                                    <input type="file" name="image" id="image" accept="image/png, image/jpeg" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Product List -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title m-0">Product</h5>
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#product-s">
                            <i class="bi bi-plus-square"></i> Add Product
                        </button>
                    </div>
                    <div class="table-responsive-md" style="height: 300px; overflow-y: auto;">
                        <table class="table table-hover border">
                            <thead class="bg-dark text-light sticky-top">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="product-table">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>



<?php require('inc/scripts.php'); ?>
<script src="scripts/settings.js"></script>
<script>
$(document).ready(function() {
    $.ajax({
        type: "GET",
        url: "./inc/getProducts.php",
        dataType: "json",
        success: function(data) {
            let html = '';
            $.each(data, function(index, value) {
                html += `<tr>
                            <td>${value.product_id}</td>
                            <td><img src="./inc/uploads/${value.image}" width="50" height="50"></td>
                            <td>${value.name}</td>
                            <td>${value.description}</td>
                            <td>${value.price}</td>
                            <td>
                                <button data-id="${value.product_id}" class="btn-edit-product btn btn-primary">Edit</button>
                                <button data-id="${value.product_id}" class="btn-delete-product btn btn-danger">Delete</button>
                            </td>
                          </tr>`;
            });
            $('#product-table').html(html);
            $(document).on('click', '.btn-delete-product', function() {
                var prod_ID = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: "./inc/deleteProduct.php",
                    data: { id: prod_ID  },
                    success: function() {
                        window.location.reload();
                    }
                });
            });
        }
    });
});
</script>
</body>
</html>

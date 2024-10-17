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
        <form id="productForm" action="./inc/addProduct.php" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-body">
                    <input type="hidden" name="product_id" id="product_id">
                    <div class="mb-3">
                        <label for="product_name_inp" class="form-label">Product Name</label>
                        <input type="text" name="offer_name" id="product_name_inp" class="form-control" required>
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
            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#product-s" id="addProductBtn">
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
                <tbody id="productList">
                    <!-- Products will be listed here -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    let products = [
        { id: 1, name: 'Product 1', description: 'Description 1', price: '100', image: 'https://via.placeholder.com/40' },
        { id: 2, name: 'Product 2', description: 'Description 2', price: '150', image: 'https://via.placeholder.com/40' }
    ];

    function renderProducts() {
        const productList = document.getElementById('productList');
        productList.innerHTML = '';
        products.forEach((product, index) => {
            const productRow = `
                <tr>
                    <th scope="row">${index + 1}</th>
                    <td><img src="${product.image}" alt="${product.name}" width="40"></td>
                    <td>${product.name}</td>
                    <td>${product.description}</td>
                    <td>${product.price}</td>
                    <td>
                        <button class="btn btn-sm btn-primary" onclick="editProduct(${product.id})">Edit</button>
                        <button class="btn btn-sm btn-danger" onclick="deleteProduct(${product.id})">Delete</button>
                    </td>
                </tr>
            `;
            productList.innerHTML += productRow;
        });
    }

    function editProduct(id) {
        const product = products.find(p => p.id === id);
        document.getElementById('product_id').value = product.id;
        document.getElementById('product_name_inp').value = product.name;
        document.getElementById('description').value = product.description;
        document.getElementById('price').value = product.price;

        const productModal = new bootstrap.Modal(document.getElementById('product-s'));
        productModal.show();
    }

    function deleteProduct(id) {
        products = products.filter(p => p.id !== id);
        renderProducts();
    }

    document.getElementById('addProductBtn').addEventListener('click', () => {
        document.getElementById('productForm').reset();
        document.getElementById('product_id').value = '';
    });

    document.getElementById('productForm').addEventListener('submit', (event) => {
        event.preventDefault();
        const id = document.getElementById('product_id').value;
        const name = document.getElementById('product_name_inp').value;
        const description = document.getElementById('description').value;
        const price = document.getElementById('price').value;

        if (id) {
            // Edit product
            const product = products.find(p => p.id == id);
            product.name = name;
            product.description = description;
            product.price = price;
        } else {
            // Add new product
            const newProduct = {
                id: products.length + 1,
                name,
                description,
                price,
                image: 'https://via.placeholder.com/40'
            };
            products.push(newProduct);
        }
        renderProducts();
        const productModal = bootstrap.Modal.getInstance(document.getElementById('product-s'));
        productModal.hide();
    });

    renderProducts();
</script>



<?php require('inc/scripts.php'); ?>
<script src="scripts/settings.js"></script>

</body>
</html>

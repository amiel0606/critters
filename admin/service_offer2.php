<?php 
//  require('inc/essentials.php'); 
//  adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Service</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4">
            <h4 class="mb-4">Service & Category Management</h4>

            <!-- Add Category Modal -->
            <div class="modal fade" id="service-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="./inc/addService.php" method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                         
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="service_name_inp" class="form-label">Category Name</label>
                                    <input type="text" name="offer_name" id="service_name_inp" class="form-control" required>
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

            <!-- Service List -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title m-0">Services</h5>
                        <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#offer-s">
                            <i class="bi bi-plus-square"></i> Add Service
                        </button>
                    </div>
                    <div class="table-responsive-md" style="height: 300px; overflow-y: auto;">
                        <table class="table table-hover border">
                            <thead class="bg-dark text-light sticky-top">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="offers">
                                <tr>
                                    <td>1</td>
                                    <td><img src="images/features/syringe.png" width="50" height="50"></td>
                                    <td>Vaccine</td>
                                    <td>
                                        <select name="service" id="vaccine" class="form-select">
                                            <option value="4in1">4in1</option>
                                            <option value="saab">Saab</option>
                                            <option value="mercedes">Mercedes</option>
                                            <option value="audi">Audi</option>
                                        </select>
                                    </td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                    <td>$100</td>
                                    <td>
                                        <button class="btn btn-sm btn-danger rounded-pill">Delete</button>
                                        <button class="btn btn-sm btn-primary rounded-pill">Edit</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Category Management Section -->
            <div class="content">

    
    <!-- Category Table -->
    <div class="category-section">
        <h6>Vaccine</h6>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Service Name</th>
                        <th>Category Name</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Vaccine</td>
                        <td>Anti-Rabies</td>
                        <td>120</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <button class="btn btn-sm btn-primary">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <!-- You can add more rows here as needed -->
                </tbody>
            </table>
        </div>
        <!-- Add New Category Form -->
        <form method="POST" action="category.php" class="d-flex mt-3">
            <input type="text" name="new_category_name" placeholder="Add New Category" class="form-control me-2" required>
            <input type="number" name="new_category_price" placeholder="Add Price" class="form-control me-2" required>
            <button type="submit" class="btn btn-success">Add Category</button>
        </form>

        <h4>Laboratory</h4>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Service Name</th>
                        <th>Category Name</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Laboratory</td>
                        <td>Blood Test</td>
                        <td>120</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <button class="btn btn-sm btn-primary">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <!-- You can add more rows here as needed -->
                </tbody>
            </table>
        </div>

        <!-- Add New Category Form -->
        <form method="POST" action="category.php" class="d-flex mt-3">
            <input type="text" name="new_category_name" placeholder="Add New Category" class="form-control me-2" required>
            <input type="number" name="new_category_price" placeholder="Add Price" class="form-control me-2" required>
            <button type="submit" class="btn btn-success">Add Category</button>
        </form>
    </div>
</div>

        </div>
    </div>
</div>

<script>
    function resetForm() {
        document.getElementById('offer_s_form').reset();
    }

    $(document).ready(function() {
        // Fetch Offers
        $.ajax({
            type: "GET",
            url: "./inc/getOffers.php",
            dataType: "json",
            success: function(data) {
                var html = "";
                $.each(data, function(index, offer) {
                    html += "<tr>";
                    html += "<td>" + offer.offer_id + "</td>";
                    html += "<td>" + offer.offer_name + "</td>";
                    html += "<td><button class='btn btn-sm btn-danger delete-btn' data-id='" + offer.offer_id + "'>Delete</button></td>";
                    html += "</tr>";
                });
                $("#service-data").html(html);
            }
        });

        // Fetch Services
        $.ajax({
            type: "GET",
            url: "./inc/getService.php",
            dataType: "json",
            success: function(data) {
                var html = "";
                $.each(data, function(index, row) {
                    html += "<tr>";
                    html += "<td>" + row.service_id + "</td>";
                    html += "<td><img src='./inc/uploads/" + row.service_image + "' height='50' width='50'></td>";
                    html += "<td>" + row.service_name + "</td>";
                    html += "<td>" + row.service_description + "</td>";
                    html += "<td><button class='btn btn-sm btn-danger delete-btn' data-id='" + row.service_id + "'>Delete</button></td>";
                    html += "</tr>";
                });
                $("#offers").html(html);
            }
        });

        // Delete Offer
        $(document).on("click", ".delete-btn", function() {
            var id = $(this).data("id");
            $.ajax({
                type: "POST",
                url: "./inc/delete_offer.php",
                data: { id: id },
                success: function() {
                    window.location.reload();
                }
            });
        });
    });
</script>

<?php require('inc/scripts.php'); ?>
<script src="scripts/settings.js"></script>

</body>
</html>

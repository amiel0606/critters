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
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" name="description" id="description" class="form-control" required>
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

            <!-- Add Service Modal -->
            <div class="modal fade" id="service-modal" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="./inc/addService.php" method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="service_name" class="form-label">Service Name</label>
                                    <input type="text" name="service_name" id="service_name" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="service_description" class="form-label">Description</label>
                                    <input type="text" name="service_description" id="service_description" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="service_price" class="form-label">Price</label>
                                    <input type="number" name="service_price" id="service_price" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="service_image" class="form-label">Upload Image</label>
                                    <input type="file" name="service_image" id="service_image" accept="image/png, image/jpeg" class="form-control">
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
                        <h5 class="card-title m-0">Categories</h5>
                        <div class="dropdown me-2">
                            <button class="btn btn-dark dropdown-toggle shadow-none btn-sm" type="button" id="dropdownAddButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownAddButton" style="z-index: 1050;">
                                <li>
                                    <button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#service-s">
                                        <i class="bi bi-plus-square"></i> Add Category
                                    </button>
                                </li>
                                <li>
                                    <button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#service-modal">
                                        <i class="bi bi-plus-square"></i> Add Service
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle shadow-none btn-sm" type="button" id="dropdownManageButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-gear"></i> Categories
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownManageButton" style="z-index: 1050;">
                                <li>
                                    <button class="dropdown-item" type="button">
                                        <i class="bi bi-check-circle"></i> Vaccination
                                    </button>
                                </li>
                                <li>
                                    <button class="dropdown-item" type="button">
                                        <i class="bi bi-check-circle"></i> Grooming
                                    </button>
                                </li>
                                <li>
                                    <button class="dropdown-item" type="button">
                                        <i class="bi bi-check-circle"></i> Other Vet Services
                                    </button>
                                </li>
                            </ul>
                        </div>
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
                                    <th scope="col">Appointment</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="services">
                                <!-- Example Service Entry -->
                                <tr>
                                    <th scope="row">1</th>
                                    <td><img src="path/to/icon.png" alt="Service Icon" width="30"></td>
                                    <td>Vaccination</td>
                                    <td>General vaccination for pets</td>
                                    <td>$50</td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="appointmentSwitch1" checked>
                                            <label class="form-check-label" for="appointmentSwitch1">Yes</label>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                </tr>
                                <!-- More service entries can be added dynamically here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        $.ajax({
        type: "GET",
        url: "./inc/getServices.php",
        dataType: "json",
        success: function(data) {
            var html = "";
            $.each(data, function(index, row) {
            html += "<tr>";
            html += "<td>" + row.service_id + "</td>";
            html += "<td><img src='./inc/uploads/" + row.service_image + "' height='50' width='50'></td>";
            html += "<td>" + row.service_name + "</td>";
            html += "<td>" + row.service_description + "</td>";
            html += "<td>" + row.service_price + "</td>";
            html += "<td><button class='btn btn-sm btn-danger delete-btn' data-id='" + row.service_id + "'>Delete</button> <button class='btn btn-sm btn-success add-btn' data-id='" + row.service_id + "'>Add Service</button></td>";
            html += "</tr>";

            const categorySection = $("<div class='category-section'></div>");
            const categoryHeader = $("<h6>" + row.service_name + "</h6>");
            const categoryTableContainer = $("<div class='table-responsive'></div>");
            const categoryTable = $("<table class='table table-bordered table-striped'></table>");
            const categoryTableHead = $("<thead><tr><th>Service Name</th><th>Category Name</th><th>Price</th><th>Action</th></tr></thead>");
            const categoryTableBody = $("<tbody class='categories'></tbody>");
            categoryTable.append(categoryTableHead);
            categoryTable.append(categoryTableBody);
            categoryTableContainer.append(categoryTable);
            categorySection.append(categoryHeader);
            categorySection.append(categoryTableContainer);

            const addCategoryForm = $("<form method='POST' action='./inc/addCategory.php' class='d-flex mt-3'></form>");
            const categoryNameInput = $("<input type='text' name='category' placeholder='Add New Category' class='form-control me-2' required>");
            const categoryParent = $("<input type='hidden' name='parent' value='" + row.service_id + "' readonly>");
            const categoryPriceInput = $("<input type='number' name='price' placeholder='Add Price' class='form-control me-2' required>");
            const addCategoryButton = $("<button type='submit' class='btn btn-success'>Add Category</button>");
            addCategoryForm.append(categoryNameInput);
            addCategoryForm.append(categoryParent);
            addCategoryForm.append(categoryPriceInput);
            addCategoryForm.append(addCategoryButton);
            categorySection.append(addCategoryForm);

            $("#category-containers").append(categorySection);

            $.ajax({
            type: "POST",
            url: "./inc/getCategories.php",
            data: { service_id: row.service_id },
            dataType: "json",
            success: function(categories) {
                $.each(categories, function(index, category) {
                    const categoryRow = $("<tr></tr>");
                    const serviceNameCell = $("<td>" + row.service_name + "</td>");
                    const categoryNameCell = $("<td>" + category.category_name + "</td>");
                    const categoryPriceCell = $("<td>" + category.category_price + "</td>");
                    const actionCell = $("<td><div class='d-flex justify-content-around'>" +
                    "<button class='edit-categ btn btn-sm btn-primary' data-id='" + category.category_id + "'>Edit</button>" +
                    "<button class='delete-categ btn btn-sm btn-danger delete-button' data-id='" + category.category_id + "'>Delete</button>" +
                    "</div></td>");
                    categoryRow.append(serviceNameCell);
                    categoryRow.append(categoryNameCell);
                    categoryRow.append(categoryPriceCell);
                    categoryRow.append(actionCell);
                    categoryTableBody.append(categoryRow);
                });
                }
            });
            });
            $("#services").html(html);
        }
        });

        $(document).on("click", ".delete-categ", function() {
            var id = $(this).data("id");
            $.ajax({
                type: "POST",
                url: "./inc/deleteCategory.php",
                data: { id: id },
                success: function() {
                    window.location.reload();
                }
            });
        });
        
        $(document).on("click", ".delete-btn", function() {
            var id = $(this).data("id");
            $.ajax({
                type: "POST",
                url: "./inc/deleteService.php",
                data: { id: id },
                success: function() {
                    window.location.reload();
                }
            });
        });

        $(document).on('click', '.save-categ', function() {
            const categoryId = $(this).data('id');
            const row = $(this).closest('tr');
            const categoryName = row.find('td:eq(1) input').val();
            const categoryPrice = row.find('td:eq(2) input').val();
            $.ajax({
                type: "POST",
                url: "./inc/updateCategory.php",
                data: {
                    id: categoryId,
                    category_name: categoryName,
                    category_price: categoryPrice
                },
                success: function(response) {
                    console.log('Category updated successfully:', response);

                    row.find('td:eq(1)').text(categoryName);
                    row.find('td:eq(2)').text(categoryPrice);

                    $(this).text('Edit').removeClass('save-categ').addClass('edit-categ');
                },
                error: function(error) {
                    console.error('Error updating category:', error);
                }
            });
        });

        $(document).on('click', '.edit-categ', function() {
            const categoryId = $(this).data('id');
            const row = $(this).closest('tr');

            const categoryName = row.find('td:eq(1)').text();
            const categoryPrice = row.find('td:eq(2)').text();

            row.find('td:eq(1)').html("<input type='text' class='form-control form-control-sm' value='" + categoryName + "'>");
            row.find('td:eq(2)').html("<input type='number' class='form-control form-control-sm' value='" + categoryPrice + "'>");

            $(this).text('Save').removeClass('edit-categ').addClass('save-categ');
        });

    });
</script>

<?php require('inc/scripts.php'); ?>
<script src="scripts/settings.js"></script>

</body>
</html>

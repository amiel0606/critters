<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Service</title>
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <style>
        .card-img-top {
            height: 300px;
            object-fit: cover;
        }
        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
        }
        .card-text {
            font-size: 1rem;
        }
        #service-container {
            margin-top: 20px;
        }
        .position-text {
            font-size: 1rem;
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-light">
<?php require('inc/header.php'); ?>
<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4">
            <h4 class="mb-4">Service & Category Management</h4>

            <!-- Add Service Modal -->
            <div class="modal fade" id="add-service-modal" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form id="addServiceForm" method="post" enctype="multipart/form-data" action="./inc/addService.php" >
                        <input type="hidden" name="idCategory" id="idCategory">
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
                                <button name="submit" type="submit" class="btn btn-primary">Add Service</button>
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

                        <!-- Dynamic Dropdown Section -->
                        <div class="dropdown me-2">
                            <label for="categoryDropdown">Select a category:</label>
                            <select id="categoryDropdown" class="form-control">
                                <option value="vaccination">Vaccination</option>
                                <option value="grooming">Grooming</option>
                                <option value="vet_services">Other Vet Services</option>
                            </select>

                            <!-- Input and Button to Add Word -->
                            <div class="mt-3">
                                <input type="text" id="newCategoryInput" class="form-control" placeholder="Add new category">
                                <button type="button" class="add-category-btn btn btn-primary mt-2" >Add Category</button>
                            </div>
                        </div>

                        <!-- Button to Add New Service -->
                        <button class="modal-service-btn btn btn-success" data-bs-toggle="modal" data-bs-target="#add-service-modal">Add Service</button>
                    </div>

                    <div id="container-hehe">

                    </div>
                    <!-- Service Display Area -->

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
 $(document).ready(function() {
    function loadCategories() {
    $.ajax({
        url: './inc/getCategories.php', 
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            $('#categoryDropdown').empty(); 
            
            $('#categoryDropdown').append($('<option>', {
                value: '',
                text: 'Please select a category',
                disabled: true,
                selected: true
            }));
            
            if (data.length === 0) {
                $('#categoryDropdown').append($('<option>', {
                    value: '',
                    text: 'No categories yet'
                }));
            } else {
                $.each(data, function(index, category) {
                    $('#categoryDropdown').append($('<option>', {
                        value: category.category_id,
                        text: category.category_name 
                    }));
                });
            }
            $('#categoryDropdown').change(function() {
                var selectedCategoryID = $(this).val(); 
                $('.btn-success').attr('data-categoryID', selectedCategoryID); 
                $.ajax({
                    url: 'inc/fetchServices.php', 
                    type: 'POST', 
                    data: { category_id: selectedCategoryID }, 
                    success: function(response) {
                        console.log(response);
                        if (typeof response === 'string') {
                            try {
                                response = JSON.parse(response);
                            } catch (e) {
                                console.error('JSON parsing error:', e);
                                console.error('Response received:', response);
                                return;
                            }
                        }
                        $('#container-hehe').empty();
                        response.forEach(function(service) {
                            var serviceCard = `
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img src="./inc/uploads/${service.image}" class="card-img-top" alt="${service.name}">
                                        <div class="card-body">
                                            <h5 class="card-title">${service.name}</h5>
                                            <p class="card-text">${service.description}</p>
                                            <p class="position-text">Price: P${service.price}</p>
                                                <div class="form-check form-switch">
                                                    <input class="toggle-service form-check-input" data-id="${service.id}" type="checkbox" role="switch" id="appointmentSwitch${service.id}" ${service.visibility === 'true' ? 'checked' : ''}>
                                                    <label class="form-check-label" for="appointmentSwitch${service.id}">Appointment Required</label>
                                                </div>
                                            <button class="btn btn-warning btn-sm" data-id="${service.id}">Edit</button>
                                            <button class="hello-haha btn btn-danger btn-sm" data-id="${service.id}">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            `;
                            $('#container-hehe').append(serviceCard);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX request failed:', error);
                    }
                });
            });
        },
        error: function(xhr, status, error) {
            console.error('Error loading categories:', error);
        }
    });
}
    loadCategories();
    $('.add-category-btn').click(function() {
        var newCategory = $('#newCategoryInput').val();
        if (newCategory) {
            $.ajax({
                url: './inc/addCategory.php', 
                type: 'POST',
                data: { category_name: newCategory },
                success: function(response) {
                    $('#newCategoryInput').val('');
                    loadCategories(); 
                },
                error: function(xhr, status, error) {
                    console.error('Error adding category:', error);
                }
            });
        } else {
            alert('Please enter a category name.');
        }
    });
    $('.modal-service-btn').click(function () {
        var categoryID = $(this).attr('data-categoryID');
        $('#idCategory').val(categoryID);
    });
    $(document).on('change', '.toggle-service', function() {
        var serviceId = $(this).data('id');
        var isVisible = $(this).is(':checked') ? 'true' : 'false';
        $.ajax({
            url: './inc/updateService.php',
            type: 'POST',
            data: {
                service_id: serviceId,
                visible: isVisible
            },
            success: function(response) {
                console.log("Success");
            },
            error: function(xhr, status, error) {
                alert('Update failed:', error); 
                window.location.reload();
            }
        });
    });
    $(document).on('click', '.hello-haha', function() {
        const serviceId = $(this).data('id'); 
        if (confirm('Are you sure you want to delete this service and its associated categories?')) {
            $.ajax({
                url: './inc/deleteService.php',
                type: 'POST',
                data: { id: serviceId },
                success: function(response) {
                    const result = JSON.parse(response);
                    alert(result.message); 
                    if (result.success) {
                        loadCategories();
                        window.location.reload();
                    }
                },
                error: function() {
                    alert('An error occurred while deleting the service.');
                }
            });
        }
    });
});
</script>
</body>
</html>

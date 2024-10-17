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
                    <form id="addServiceForm">
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
                                <button type="submit" class="btn btn-primary">Add Service</button>
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
                                <button type="button" class="btn btn-primary mt-2" onclick="addCategory()">Add Category</button>
                            </div>
                        </div>

                        <!-- Button to Add New Service -->
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add-service-modal">Add Service</button>
                    </div>

                    <!-- Service Display Area -->
                    <div id="service-container" class="row">
                        <!-- Example Services for Vaccination -->
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img src="example_rabies_image.jpg" class="card-img-top" alt="Rabies Vaccination">
                                <div class="card-body">
                                    <h5 class="card-title">Rabies Vaccination</h5>
                                    <p class="card-text">Provides protection against rabies with a single shot.</p>
                                    <p class="position-text">Price: P50</p>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="appointmentSwitchExample1" checked>
                                        <label class="form-check-label" for="appointmentSwitchExample1">Appointment Required</label>
                                    </div>
                                    <button class="btn btn-warning btn-sm" onclick="showEditServiceModal('vaccination', 0)">Edit</button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteService('vaccination', 0)">Delete</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img src="example_dhp_image.jpg" class="card-img-top" alt="DHP Vaccination">
                                <div class="card-body">
                                    <h5 class="card-title">DHP Vaccination</h5>
                                    <p class="card-text">Prevents canine distemper, hepatitis, and parvovirus.</p>
                                    <p class="position-text">Price: P80</p>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="appointmentSwitchExample2" checked>
                                        <label class="form-check-label" for="appointmentSwitchExample2">Appointment Required</label>
                                    </div>
                                    <button class="btn btn-warning btn-sm" onclick="showEditServiceModal('vaccination', 1)">Edit</button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteService('vaccination', 1)">Delete</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img src="example_flu_image.jpg" class="card-img-top" alt="Flu Vaccination">
                                <div class="card-body">
                                    <h5 class="card-title">Flu Vaccination</h5>
                                    <p class="card-text">Annual flu vaccination for dogs.</p>
                                    <p class="position-text">Price: P60</p>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="appointmentSwitchExample3" checked>
                                        <label class="form-check-label" for="appointmentSwitchExample3">Appointment Required</label>
                                    </div>
                                    <button class="btn btn-warning btn-sm" onclick="showEditServiceModal('vaccination', 2)">Edit</button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteService('vaccination', 2)">Delete</button>
                                </div>
                            </div>
                        </div>

                        <!-- Example Services for Grooming -->
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img src="example_bath_image.jpg" class="card-img-top" alt="Basic Bath">
                                <div class="card-body">
                                    <h5 class="card-title">Basic Bath</h5>
                                    <p class="card-text">A simple, thorough bath with pet-friendly shampoo.</p>
                                    <p class="position-text">Price: ₱ 30</p>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="appointmentSwitchExample4">
                                        <label class="form-check-label" for="appointmentSwitchExample4">Appointment Required</label>
                                    </div>
                                    <button class="btn btn-warning btn-sm" onclick="showEditServiceModal('grooming', 0)">Edit</button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteService('grooming', 0)">Delete</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img src="example_trim_image.jpg" class="card-img-top" alt="Nail Trim">
                                <div class="card-body">
                                    <h5 class="card-title">Nail Trim</h5>
                                    <p class="card-text">Keep your pet's nails healthy and trimmed.</p>
                                    <p class="position-text">Price: P15</p>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="appointmentSwitchExample5">
                                        <label class="form-check-label" for="appointmentSwitchExample5">Appointment Required</label>
                                    </div>
                                    <button class="btn btn-warning btn-sm" onclick="showEditServiceModal('grooming', 1)">Edit</button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteService('grooming', 1)">Delete</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img src="example_style_image.jpg" class="card-img-top" alt="Styling">
                                <div class="card-body">
                                    <h5 class="card-title">Styling</h5>
                                    <p class="card-text">Full grooming and styling for pets.</p>
                                    <p class="position-text">Price: P100</p>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="appointmentSwitchExample6" checked>
                                        <label class="form-check-label" for="appointmentSwitchExample6">Appointment Required</label>
                                    </div>
                                    <button class="btn btn-warning btn-sm" onclick="showEditServiceModal('grooming', 2)">Edit</button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteService('grooming', 2)">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const services = {
        vaccination: [
            {
                name: 'Rabies Vaccination',
                description: 'Provides protection against rabies with a single shot.',
                price: 50,
                image: 'example_rabies_image.jpg',
                appointment: true,
            },
            {
                name: 'DHP Vaccination',
                description: 'Prevents canine distemper, hepatitis, and parvovirus.',
                price: 80,
                image: 'example_dhp_image.jpg',
                appointment: true,
            },
            {
                name: 'Flu Vaccination',
                description: 'Annual flu vaccination for dogs.',
                price: 60,
                image: 'example_flu_image.jpg',
                appointment: true,
            },
        ],
        grooming: [
            {
                name: 'Basic Bath',
                description: 'A simple, thorough bath with pet-friendly shampoo.',
                price: 30,
                image: 'example_bath_image.jpg',
                appointment: false,
            },
            {
                name: 'Nail Trim',
                description: 'Keep your pet\'s nails healthy and trimmed.',
                price: 15,
                image: 'example_trim_image.jpg',
                appointment: false,
            },
            {
                name: 'Styling',
                description: 'Full grooming and styling for pets.',
                price: 100,
                image: 'example_style_image.jpg',
                appointment: true,
            },
        ],
        vet_services: [],
    };

    $(document).ready(function() {
        // Initial display
        displayServices('vaccination');

        // Change category
        $('#categoryDropdown').change(function() {
            const category = $(this).val();
            displayServices(category);
        });

        // Add service functionality
        $('#addServiceForm').submit(function(e) {
            e.preventDefault();
            const category = $('#categoryDropdown').val();
            const newService = {
                name: $('#service_name').val(),
                description: $('#service_description').val(),
                price: $('#service_price').val(),
                image: $('#service_image').val().split('\\').pop(), // Extract filename only
                appointment: true, // Default appointment required
            };

            // Append the new service to the category's services array
            services[category].push(newService);
            displayServices(category); // Refresh service display
            $('#add-service-modal').modal('hide'); // Hide modal
            this.reset(); // Reset the form
        });
    });

    function displayServices(category) {
        var serviceContainer = $('#service-container');
        serviceContainer.empty(); // Clear previous services
        $('#service-container').prev('h5').remove(); // Remove the previous title if exists
        $('#service-container').before(`<h5 class="mb-4">Services for ${category.charAt(0).toUpperCase() + category.slice(1)}</h5>`);

        services[category].forEach((service, index) => {
            var serviceCard = `
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="${service.image}" class="card-img-top" alt="${service.name}">
                        <div class="card-body">
                            <h5 class="card-title">${service.name}</h5>
                            <p class="card-text">${service.description}</p>
                            <p class="position-text">Price: ${service.price === "Varies" ? service.price : 'P' + service.price}</p>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="appointmentSwitch${index}" ${service.appointment ? 'checked' : ''}>
                                <label class="form-check-label" for="appointmentSwitch${index}">Appointment Required</label>
                            </div>
                            <button class="btn btn-warning btn-sm" onclick="showEditServiceModal('${category}', ${index})">Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="deleteService('${category}', ${index})">Delete</button>
                        </div>
                    </div>
                </div>
            `;
            serviceContainer.append(serviceCard);
        });
    }

    function showEditServiceModal(category, index) {
        // Edit functionality here
        alert('Edit functionality is not implemented yet for ' + services[category][index].name);
    }

    function deleteService(category, index) {
        services[category].splice(index, 1); // Remove service
        displayServices(category); // Refresh display
    }

    function addCategory() {
        var newCategory = $('#newCategoryInput').val().trim();
        if (newCategory) {
            services[newCategory] = []; // Initialize empty array for new category
            $('#categoryDropdown').append(`<option value="${newCategory}">${newCategory.charAt(0).toUpperCase() + newCategory.slice(1)}</option>`);
            $('#newCategoryInput').val(''); // Clear input field
        } else {
            alert('Please enter a valid category name.');
        }
    }
</script>
</body>
</html>

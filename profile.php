<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Profile</title>
    <?php require('inc/links.php'); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/profile.css">
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
            background-color: #cc0000;
            padding: 15px;
            color: white;
        }

        .profile-section {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            position: relative;
        }

        .save-btn {
            background-color: #28a745;
            color: white;
        }

        .add-pet-btn {
            background-color: #007bff;
            color: white;
            margin-bottom: 20px;
        }

        .delete-pet-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    require('inc/header.php');
    ?>

    <div class="container">
        <div class="profile-container">
            <h2>Pet Profile Management</h2>

            <!-- Owner Information Section -->
            <div class="profile-section">
    <h4>Owner Information</h4>
    <div class="row">
        <!-- Owner's Name -->
        <div class="col-md-4 mb-3">
            <label for="ownerName" class="form-label" style="font-weight: bold;">Owner's Name</label>
            <p id="ownerName"><?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName'] ?></p>
        </div>

        <!-- Owner's Email -->
        <div class="col-md-4 mb-3">
            <label for="ownerEmail" class="form-label" style="font-weight: bold;">Owner's Email</label>
            <p id="ownerEmail"><?php echo $_SESSION['username'] ?></p>
        </div>

        <!-- Total Pets -->
        <div class="col-md-4 mb-3">
            <label for="totalPets" class="form-label" style="font-weight: bold;">Total Pets</label>
            <p id="totalPets">5</p>
        </div>
    </div>
</div>


            <!-- Pet Section (Multiple Pets) -->
            <div id="pets-container">
                <div class="profile-section pet-entry">
                    <h4>Pet Information</h4>
                    <form action="./inc/addPet.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $_SESSION['id'] ?>" name="owner_id">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="img" class="form-label">Add image</label>
                                <input type="file" class="form-control" name="img">
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="petName" class="form-label">Pet's Name</label>
                                <input type="text" class="form-control" name="petName" placeholder="Pet's Name"
                                    required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="petType" class="form-label">Pet Type</label>
                                <select class="form-control" name="petType" required>
                                    <option value="" disabled selected>Select Pet Type</option>
                                    <option value="Cat">Cat</option>
                                    <option value="Dog">Dog</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="breed" class="form-label">Breed</label>
                                <input type="text" class="form-control" name="breed" placeholder="Breed" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="birthdate" class="form-label">Birthdate</label>
                                <input type="date" class="form-control" name="birthdate" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select" name="gender" required>
                                    <option value="" selected disabled>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="color" class="form-label">Color</label>
                                <input type="text" class="form-control" name="color" placeholder="Color" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="unique" class="form-label">Unique</label>
                                <input type="text" class="form-control" name="unique" placeholder="Unique" required>
                            </div>

                        </div>
                        <button type="submit" class="btn save-btn" name="submit">Add Pet</button>
                    </form>
                </div>
            </div>
            <h4 id="petInfo">Pet Information</h4>
            <div id="pet-list">

            </div>
            <div class="modal fade" id="editPetModal" tabindex="-1" aria-labelledby="editPetModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPetModalLabel">Edit Pet Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editPetForm" action="./inc/editPet.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="pet_id" id="pet_id">
                    <div class="mb-3">
                        <label for="petName" class="form-label">Pet Name</label>
                        <input type="text" class="form-control" id="petName" name="pet_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="petType" class="form-label">Pet Type</label>
                        <input type="text" class="form-control" id="petType" name="pet_type" required>
                    </div>
                    <div class="mb-3">
                        <label for="breed" class="form-label">Breed</label>
                        <input type="text" class="form-control" id="breed" name="breed" required>
                    </div>
                    <div class="mb-3">
                        <label for="birthdate" class="form-label">Birthdate</label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <input type="text" class="form-control" id="gender" name="gender" required>
                    </div>
                    <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <input type="text" class="form-control" id="color" name="color" required>
                    </div>
                    <div class="mb-3">
                        <label for="uniqueness" class="form-label">Uniqueness</label>
                        <input type="text" class="form-control" id="uniqueness" name="uniqueness" required>
                    </div>
                    <div class="mb-3">
                        <label for="petImage" class="form-label">Pet Image</label>
                        <input type="file" class="form-control" id="petImage" name="pet_image">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
       $(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "./inc/getPets.php",
        data: { owner_id: "<?php echo $_SESSION['id'] ?>" },
        dataType: "json",
        success: function (response) {
            var petsListContainer = $("<div>").appendTo("#pet-list");
            if (response.length > 0) {
                $.each(response, function (index, pet) {
                    var petHTML = `
                    <div id="pets-container">
                        <div class="profile-section pet-entry d-flex align-items-start mb-3">
                            <div class="pet-image me-3">
                                <img src="./inc/uploads/${pet.img}" alt="Pet Image" class="img-fluid rounded" style="max-width: 350px; max-height: 350px; object-fit: cover;">
                                <p class="mt-2 fw-bold text-center">${pet.name}</p>
                            </div>
                            <div class="pet-details flex-grow-1">
                                <div class="row text-center">
                                    <div class="col-md-6 mb-2">
                                        <label for="petType" class="form-label">Pet Type</label>
                                        <p class="h5">${pet.type}</p>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="breed" class="form-label">Breed</label>
                                        <p class="h5">${pet.breed}</p>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="birthdate" class="form-label">Birthdate</label>
                                        <p class="h5">${pet.birthdate}</p>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="gender" class="form-label">Gender</label>
                                        <p class="h5">${pet.gender}</p>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="color" class="form-label">Color</label>
                                        <p class="h5">${pet.color}</p>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="unique" class="form-label">Uniqueness</label>
                                        <p class="h5">${pet.uniqueness}</p>
                                    </div>
                                </div>
                            </div>
                            <button type="button" data-id="${pet.id}" class="btn btn-danger delete-pet-btn">Delete Pet</button>
                            <div class="edit-btnss" style="margin-top: 50px;">
                                <button type="button" data-id="${pet.id}" class="btn btn-primary edit-pet-btn" data-bs-toggle="modal" data-bs-target="#editPetModal">Edit Pet</button>
                            </div>
                        </div>
                    </div>
                    `;
                    petsListContainer.append(petHTML);
                });
            } else {
                $("#petInfo").html('No Pet Added yet');
            }
        }
    });

    // Open the modal with the pet's current data
    $(document).on("click", ".edit-pet-btn", function () {
        var petId = $(this).data('id');

        // Fetch the pet data (you could modify this to get data from an API)
        $.ajax({
            type: "POST",
            url: "./inc/getPetDetails.php",
            data: { pet_id: petId },
            dataType: "json",
            success: function (pet) {
                // Populate the modal fields with the pet data
                $("#pet_id").val(pet.id);
                $("#petName").val(pet.name);
                $("#petType").val(pet.type);
                $("#breed").val(pet.breed);
                $("#birthdate").val(pet.birthdate);
                $("#gender").val(pet.gender);
                $("#color").val(pet.color);
                $("#uniqueness").val(pet.uniqueness);
            }
        });
    });

    // Handle form submission to save changes
    $("#editPetForm").on("submit", function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "./inc/editPet.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function () {
                alert("Pet details updated successfully!");
                window.location.reload();
            }
        });
    });

    // Delete pet functionality
    $(document).on("click", ".delete-pet-btn", function () {
        var petId = $(this).data('id');
        $.ajax({
            type: "POST",
            url: "./inc/deletePet.php",
            data: { petID: petId },
            success: function () {
                alert("Pet deleted successfully!");
                window.location.reload();
            }
        });
    });
});
    </script>
</body>

</html>
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
            background-image: linear-gradient(to right, #EE9CA7, #FFDDE1);
        }
        /* View History Button */
.view-history-btn {
    background: linear-gradient(135deg, #e7aad7, #f79cce);
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 8px;
    font-weight: bold;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    transition: transform 0.2s, box-shadow 0.3s;
}

.view-history-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
}

/* Modal Header */
.modal-header {
    background: linear-gradient(135deg, #f79cce, #f4a6c4);
    color: white;
    border-bottom: 4px solid #e7aad7;
}

/* Modal Header Close Button */
.modal-header .btn-close {
    filter: invert(1);
}

/* Modal Body */
.modal-body {
    background-color: #fef0f5;
    font-family: 'Arial', sans-serif;
    padding: 25px;
    border-radius: 10px;
    font-size: 1.2em;
    line-height: 1.7;
}

/* Modal Footer */
.modal-footer {
    background-color: #fce4e8;
    padding: 15px;
    text-align: center;
}

.modal-footer .btn {
    background: linear-gradient(135deg, #e7aad7, #f79cce);
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 8px;
    font-weight: bold;
    transition: transform 0.2s, box-shadow 0.3s;
}

.modal-footer .btn:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
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

        .profile-container {
            background-color: #FFD0DF;
        }

        .profile-section {
            background-color: #FFE5EC;
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
                    <!-- Owner's Contact -->
                    <div class="col-md-4 mb-3">
                        <label for="contactNumber" class="form-label" style="font-weight: bold;">Contact No.</label>
                        <p id="contactNumber">5</p>
                    </div>

                    <!-- Total Pets -->
                    <div class="col-md-4 mb-3">
                        <label for="totalPets" class="form-label" style="font-weight: bold;">Total Pets</label>
                        <p id="totalPets">5</p>
                    </div>
                </div>
            </div>

            <!-- Button to trigger the Add Pet Modal -->
            <button type="button" class="btn add-pet-btn" data-bs-toggle="modal" data-bs-target="#addPetModal">
                Add Pet
            </button>
            <!-- Edit Pet Modal -->
            <div class="modal fade" id="editPetModal" tabindex="-1" aria-labelledby="editPetModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editPetModalLabel">Edit Pet Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editPetForm">
                                <input type="hidden" id="petID-edit" name="pet_id">
                                <!-- Add this line to store the pet ID -->
                                <div class="mb-3">
                                    <label for="pet-name-edit" class="form-label">Pet Name</label>
                                    <input type="text" class="form-control" id="pet-name-edit" name="pet_name" value="">
                                </div>
                                <div class="mb-3">
                                    <label for="pet-type-edit" class="form-label">Pet Type</label>
                                    <input type="text" class="form-control" id="pet-type-edit" name="pet_type" value="">
                                </div>
                                <div class="mb-3">
                                    <label for="pet-breed-edit" class="form-label">Breed</label>
                                    <input type="text" class="form-control" id="pet-breed-edit" name="breed" value="">
                                </div>
                                <div class="mb-3">
                                    <label for="pet-birthdate-edit" class="form-label">Birthdate</label>
                                    <input type="date" class="form-control" id="pet-birthdate-edit" name="birthdate"
                                        value="">
                                </div>
                                <div class="mb-3">
                                    <label for="pet-gender-edit" class="form-label">Gender</label>
                                    <select class="form-select" id="pet-gender-edit" name="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="pet-color-edit" class="form-label">Color</label>
                                    <input type="text" class="form-control" id="pet-color-edit" name="color" value="">
                                </div>
                                <div class="mb-3">
                                    <label for="pet-uniqueness-edit" class="form-label">Uniqueness</label>
                                    <textarea class="form-control" id="pet-uniqueness-edit" name="uniqueness"
                                        rows="3"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pet Section (Multiple Pets) -->
            <div id="pets-container">
                <h4 id="petInfo">Pet Information</h4>
                <div id="pet-list">
                    <select id="petDropdown" class="form-select mb-3">
                        <option value="" disabled selected>Select a Pet</option>
                        <!-- Options for pets will be dynamically populated here -->
                    </select>
                </div>
                <!-- New container for displaying pet details -->
                <div id="petDetails" class="mt-3">
                    <!-- Selected pet details will be displayed here -->
                </div>
            </div>

            <!-- Add Pet Modal -->
            <div class="modal fade" id="addPetModal" tabindex="-1" aria-labelledby="addPetModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addPetModalLabel">Add Pet Information</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
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
                                        <input type="text" class="form-control" name="breed" placeholder="Breed"
                                            required>
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
                                        <input type="text" class="form-control" name="color" placeholder="Color"
                                            required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="unique" class="form-label">Unique</label>
                                        <input type="text" class="form-control" name="unique" placeholder="Unique"
                                            required>
                                    </div>
                                </div>
                                <button type="submit" class="btn save-btn" name="submit">Add Pet</button>
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
//             $(document).on('click', '.view-history-btn', function() {
//     const petId = $(this).data('id');
    
//     $.ajax({
//         url: './inc/getPetHistory.php',
//         method: 'POST',
//         dataType: 'json',
//         data: { petId: petId },
//         success: function(response) {
//             if (response.success) {
//                 // Clear any previous history in the table
//                 $('#history-table-body').empty();

//                 // Populate the table with the new history data
//                 const historyHtml = response.history.map(appointment => `
//                     <tr>
//                         <td>${appointment.booking_date}</td>
//                         <td>${appointment.service}</td>
//                         <td>${appointment.service_provider}</td>
//                     </tr>
//                 `).join('');

//                 $('#history-table-body').html(historyHtml);
//                 $('#viewHistoryModal').modal('show');
//             } else {
//                 console.error('No history found for this pet.');
//             }
//         },
//         error: function(xhr, status, error) {
//             console.error('Error fetching pet history:', error);
//         }
//     });
// });

            $.ajax({
                type: "POST",
                url: "./inc/getPets.php",
                data: { owner_id: "<?php echo $_SESSION['id'] ?>" },
                dataType: "json",
                success: function (response) {
                    var petDropdown = $("#petDropdown");
                    petDropdown.empty().append('<option value="" disabled selected>Select a Pet</option>');
                    $('#totalPets').text(response.length);
                    if (response.length > 0) {
                        $.each(response, function (index, pet) {
                            petDropdown.append(`<option value="${pet.id}">${pet.name}</option>`);
                        });
                    } else {
                        $("#petInfo").html('No Pet Added yet');
                    }

                    petDropdown.on('change', function () {
                        var selectedPetId = $(this).val();
                        var selectedPet = response.find(pet => pet.id === selectedPetId);

                        if (selectedPet) {
                            var petHTML = `
                    <div class="profile-section pet-entry d-flex align-items-start mb-3">
                        <div class="pet-image me-3">
                            <img src="./inc/uploads/${selectedPet.img}" alt="Pet Image" class="img-fluid rounded" style="max-width: 350px; max-height: 350px; object-fit: cover;">
                            <p class="mt-2 fw-bold text-center">${selectedPet.name}</p>
                        </div>
                        <div class="pet-details flex-grow-1">
                            <div class="row text-center">
                                <div class="col-md-6 mb-2">
                                    <label for="petType" class="form-label">Pet Type</label>
                                    <p class="h5">${selectedPet.type}</p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="breed" class="form-label">Breed</label>
                                    <p class="h5">${selectedPet.breed}</p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="birthdate" class="form-label">Birthdate</label>
                                    <p class="h5">${selectedPet.birthdate}</p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="gender" class="form-label">Gender</label>
                                    <p class="h5">${selectedPet.gender}</p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="color" class="form-label">Color</label>
                                    <p class="h5">${selectedPet.color}</p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="unique" class="form-label">Uniqueness</label>
                                    <p class="h5">${selectedPet.uniqueness}</p>
                                </div>
                            </div>
                        </div>
                        <button type="button" data-id="${selectedPet.id}" class="btn btn-danger delete-pet-btn">Delete Pet</button>
                        <div class="edit-btnss" style="margin-top: 50px;">
                            <button type="button" data-id="${selectedPet.id}" class="btn btn-primary edit-pet-btn"  data-bs-toggle="modal" data-bs-target="#editPetModal">Edit Pet</button>
                        <div class="mt-2">
                            <button type="button" data-id="${selectedPet.id}" class="btn-view btn btn-info view-history-btn" data-bs-toggle="modal" data-bs-target="#viewHistoryModal">
                                <i class="bi bi-clock-history me-2"></i> View History
                            </button>
                        </div>

                `;

                            $("#petDetails").html(petHTML);
                        } else {
                            $("#petDetails").html('');
                            $("#petInfo").html('No Pet Selected');
                        }
                    });
                }
            });

            $(document).on("click", ".edit-pet-btn", function () {
                var petId = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: "./inc/getPetDetails.php",
                    data: { pet_id: petId },
                    dataType: "json",
                    success: function (pet) {
                        $("#petID-edit").val(pet.id);
                        $("#pet-name-edit").val(pet.petName);
                        $("#pet-type-edit").val(pet.petType);
                        $("#pet-breed-edit").val(pet.breed);
                        $("#pet-birthdate-edit").val(pet.birth_date);
                        $("#pet-gender-edit").val(pet.gender);
                        $("#pet-color-edit").val(pet.color);
                        $("#pet-uniqueness-edit").val(pet.uniqueness);
                    }
                });
            });

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
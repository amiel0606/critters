<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Profile</title>
    <?php require('inc/links.php');?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
                        <div class="col-md-6 mb-3">
                            <label for="ownerName" class="form-label">Owner's Name</label>
                            <p id="ownerName"><?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName'] ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ownerEmail" class="form-label">Owner's Email</label>
                            <p id="ownerEmail"><?php echo $_SESSION['username'] ?></p>
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
                                <input type="file" class="form-control" name="img" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="petName" class="form-label">Pet's Name</label>
                                <input type="text" class="form-control" name="petName" placeholder="Pet's Name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="petType" class="form-label">Pet Type</label>
                                <input type="text" class="form-control" name="petType" placeholder="Pet Type" required>
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
                        </div>
                        <button type="submit" class="btn save-btn" name="submit">Add Pet</button>
                    </form>
                </div>
            </div>                    
            <h4 id="petInfo">Pet Information</h4>
            <div id="pet-list"></div>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
$(document).ready(function() {
    $.ajax({
    type: "POST",
    url: "./inc/getPets.php",
    data: { owner_id: "<?php echo $_SESSION['id'] ?>" },
    dataType: "json",
    success: function(response) {
        var petsListContainer = $("<div>").appendTo("#pet-list");
            if (response.length > 0) {
                $.each(response, function(index, pet) {
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
                                                <p class="h5">${pet.type}</p> <!-- Make the text larger -->
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label for="breed" class="form-label">Breed</label>
                                                <p class="h5">${pet.breed}</p> <!-- Make the text larger -->
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label for="birthdate" class="form-label">Birthdate</label>
                                                <p class="h5">${pet.birthdate}</p> <!-- Make the text larger -->
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label for="gender" class="form-label">Gender</label>
                                                <p class="h5">${pet.gender}</p> <!-- Make the text larger -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" data-id="${pet.id}" class="btn btn-danger delete-pet-btn">Delete Pet</button>
                            </div>
                    `;
                    petsListContainer.append(petHTML);
                });
            } else {
                $("#petInfo").html('No Pet Added yet');
            }
    }
});

    $(document).on("click", ".delete-pet-btn", function() {
        var petId = $(this).data('id');
        var petName = $("#petName").val();
        $.ajax({
            type: "POST",
            url: "./inc/deletePet.php",
            data: { petID : petId },
            success: function() {
                alert(`Pet ${petName} deleted successfully!`);
                window.location.reload();
            }
        });
    });
});

</script>
</body>
</html>
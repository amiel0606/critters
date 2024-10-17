<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Profile</title>
    <?php require('inc/links.php');?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php require('inc/links.php');?>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .main-container {
            background-color: #e9ecef;
            padding: 30px;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .profile-section {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            position: relative;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .profile-section h4 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .pet-info-container {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .pet-info {
            flex: 1;
        }
        .pet-info p {
            margin-bottom: 10px;
            font-weight: bold;
        }
        .pet-info-value {
            font-weight: normal;
            margin-left: 5px;
        }
        .delete-pet-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            font-size: 0.9rem;
            cursor: pointer;
        }
        .delete-pet-btn:hover {
            background-color: #b02a37;
        }
        .add-pet-btn {
            background-color: #007bff;
            color: white;
            margin-bottom: 20px;
            display: block;
            margin-top: 20px;
            width: 100%;
            text-align: center;
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

                <!-- Pet Information Section -->
                <div id="pets-container">
                    <div class="profile-section pet-entry">
                        <h4>Pet Information</h4>
                        <div class="pet-info-container">
                            <div class="pet-image" style="flex: 1; margin-right: 20px;">
                                <img src="path_to_image/pet-image.jpg" alt="Pet Image" class="img-fluid" style="border-radius: 10px; max-width: 150px;">
                            </div>
                            <div class="pet-info" style="flex: 2;">
                                <p>Pet's Name: <span class="pet-info-value">Doggy</span></p>
                                <p>Breed: <span class="pet-info-value">Askal</span></p>
                                <p>Gender: <span class="pet-info-value">Male</span></p>
                            </div>
                            <div class="pet-info" style="flex: 2;">
                                <p>Pet Type: <span class="pet-info-value">Dog</span></p>
                                <p>Birthdate: <span class="pet-info-value">2022-05-05</span></p>
                            </div>
                        </div>
                        <button type="button" class="delete-pet-btn">Delete Pet</button>
                    </div>
                </div>
            </div>  
            <!-- Adding Pet -->
            <div class="col-md-6">
                <div id="pets-container">
                    <div class="profile-section pet-entry">
                        <h4>Add Pet</h4>
                        <form>
                            <div class="row mb-3">
                            <div class="col-md-6">
                                    <label for="pet_image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="pet_image" placeholder="Pet's Image">
                                </div>
                                <div class="col-md-6">
                                    <label for="pet-name" class="form-label">Pet's Name</label>
                                    <input type="text" class="form-control" id="pet-name" placeholder="Pet's Name">
                                </div>
                                <div class="col-md-6">
                                    <label for="pet-type" class="form-label">Pet Type</label>
                                    <input type="text" class="form-control" id="pet-type" placeholder="Pet Type">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="breed" class="form-label">Breed</label>
                                    <input type="text" class="form-control" id="breed" placeholder="Breed">
                                </div>
                                <div class="col-md-6">
                                    <label for="birthdate" class="form-label">Birthdate</label>
                                    <input type="date" class="form-control" id="birthdate" placeholder="dd/mm/yyyy">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select" id="gender">
                                        <option selected>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                             <button id="add-pet-btn" class="btn btn-primary add-pet-btn">Add Pet</button>
                        </form>
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
            </div>                    
            <h4 id="petInfo">Pet Information</h4>
            <div id="pet-list"></div>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('add-pet-btn').addEventListener('click', function() {
            var petsContainer = document.getElementById('pets-container');
            var newPetEntry = document.createElement('div');
            newPetEntry.classList.add('profile-section', 'pet-entry');

            newPetEntry.innerHTML = `
                <h4>Pet Information</h4>
                <div class="pet-info-container">
                    <div class="pet-info">
                        <p>Pet's Name: <span class="pet-info-value">New Pet</span></p>
                        <p>Breed: <span class="pet-info-value">Unknown</span></p>
                        <p>Gender: <span class="pet-info-value">Unknown</span></p>
                    </div>
                    <div class="pet-info">
                        <p>Pet Type: <span class="pet-info-value">Unknown</span></p>
                        <p>Birthdate: <span class="pet-info-value">Unknown</span></p>
                    </div>
                </div>
                <button type="button" class="delete-pet-btn">Delete Pet</button>
            `;
            petsContainer.appendChild(newPetEntry);
            addDeleteFunctionality(newPetEntry);
        });
        function addDeleteFunctionality(petEntry) {
            var deleteBtn = petEntry.querySelector('.delete-pet-btn');
            deleteBtn.addEventListener('click', function() {
                petEntry.remove();
            });
        }
        document.querySelectorAll('.pet-entry').forEach(function(petEntry) {
            addDeleteFunctionality(petEntry);
        });
    </script>
</body>
</html>

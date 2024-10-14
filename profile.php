<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Profile</title>
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
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="ownerName" class="form-label">Owner's Name</label>
                            <input type="text" class="form-control" id="ownerName" placeholder="Owner's Name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ownerEmail" class="form-label">Owner's Email</label>
                            <input type="email" class="form-control" id="ownerEmail" placeholder="Owner's Email">
                        </div>
                    </div>
                </form>
            </div>

            <!-- Pet Section (Multiple Pets) -->
            <div id="pets-container">
                <div class="profile-section pet-entry">
                    <h4>Pet Information</h4>
                    <form>
                        <div class="row">
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
                        <button type="button" class="btn delete-pet-btn">Delete Pet</button>
                    </form>
                </div>
            </div>

            <!-- Add More Pets Button -->
            <button type="button" class="btn add-pet-btn" id="add-pet-btn">Add Another Pet</button>
            
            <!-- Save Changes Button -->
            <button type="submit" class="btn save-btn">Save All Pets</button>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Function to dynamically add more pet forms
        document.getElementById('add-pet-btn').addEventListener('click', function() {
            var petsContainer = document.getElementById('pets-container');

            // Create a new pet form section
            var newPetEntry = document.createElement('div');
            newPetEntry.classList.add('profile-section', 'pet-entry');

            newPetEntry.innerHTML = `
                <h4>Pet Information</h4>
                <form>
                    <div class="row">
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
                    <button type="button" class="btn delete-pet-btn">Delete Pet</button>
                </form>
            `;

            // Append the new pet form to the pets container
            petsContainer.appendChild(newPetEntry);

            // Add delete functionality to the newly added pet
            addDeleteFunctionality(newPetEntry);
        });

        // Function to handle deleting a pet form
        function addDeleteFunctionality(petEntry) {
            var deleteBtn = petEntry.querySelector('.delete-pet-btn');
            deleteBtn.addEventListener('click', function() {
                petEntry.remove();
            });
        }

        // Initially add delete functionality to the first pet form
        document.querySelectorAll('.pet-entry').forEach(function(petEntry) {
            addDeleteFunctionality(petEntry);
        });
    </script>
</body>
</html>

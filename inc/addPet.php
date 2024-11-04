<?php
require_once 'functions.php';
require_once '../admin/inc/dbCon.php';

if (isset($_POST["submit"])) {
    $owner_id = $_POST["owner_id"];
    $petName = $_POST["petName"];
    $petType = $_POST["petType"];
    $breed = $_POST["breed"];
    $birthdate = $_POST["birthdate"];
    $gender = $_POST["gender"];

    // Call createPet function with the uploaded file
    if (createPet($conn, $owner_id, $petName, $petType, $breed, $birthdate, $gender, $_FILES['img'])) {
        echo "
        <script>
            alert('Added Pet Successfully!');
            window.location.href = '../profile.php?error=none';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Image upload failed. Please try again.');
            window.location.href = '../profile.php?error=uploadFailed';
        </script>
        ";
    }
    exit();
}
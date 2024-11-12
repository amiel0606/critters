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
    $color = $_POST["color"];
    $unique = $_POST["unique"];
    $file = $_FILES['img'];

    if (!empty($file['name'])) {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            echo "<script>
                    alert('File upload error. Please try again.');
                    window.location.href = '../profile.php?error=fileUploadError';
                  </script>";
            exit();
        }
    }
    if (createPet($conn, $owner_id, $petName, $petType, $breed, $birthdate, $gender, $color, $unique, $file)) {
        echo "<script>
                alert('Added Pet Successfully!');
                window.location.href = '../profile.php?error=none';
              </script>";
    } else {
        echo "<script>
                alert('Image upload failed. Please try again.');
                window.location.href = '../profile.php?error=uploadFailed';
              </script>";
    }
    exit();
}
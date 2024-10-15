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

    createPet($conn, $owner_id, $petName, $petType, $breed, $birthdate, $gender);
    echo "
    <script>
        alert('Added Pet Successfully!');
        window.location.href = '../profile.php?error=none';
    </script>
    ";
    exit();
}
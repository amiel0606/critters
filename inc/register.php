<?php
if (isset($_POST["submit"])) {
    $Fname = $_POST["Fname"];
    $Lname = $_POST["Lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $ConfPassword = $_POST["ConfPassword"];

    require_once 'functions.php';
    require_once '../admin/inc/dbCon.php';

    $errorMessage = "";

    if (emptyInputSignup($Fname, $Lname, $email, $password) !== false) {
        $errorMessage = "EmptyInput";
    } elseif (passMatch($password, $ConfPassword) !== false) {
        $errorMessage = "PassNotMatching";
    } elseif (InvalidUser($email) !== false) {
        $errorMessage = "InvalidUsername";
    } elseif (userExist($conn, $email) !== false) {
        $errorMessage = "UsernameTaken";
    } else {
        createUser($conn, $email, $Lname, $Fname, $password);
        $errorMessage = "none";
    }

    header("location: ../landingpage.php?error=$errorMessage");
    exit();
} else {
    header("location: ../landingpage.php");
    exit();
}
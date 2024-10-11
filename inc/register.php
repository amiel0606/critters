<?php
if (isset($_POST["submit"])) {
    $Fname = $_POST["Fname"];
    $Lname = $_POST["Lname"];
    $petType = $_POST["petType"];
    $UserName = $_POST["email"];
    $password = $_POST["password"];
    $petName = $_POST["petName"];

    require_once 'functions.php';
    require_once '../admin/inc/dbCon.php';

    $errorMessage = "";

    if (emptyInputSignup($Fname,$Lname,$petType,$UserName,$password) !== false) {
        $errorMessage = "EmptyInput";
    } elseif (passMatch($password,$_POST["ConfPassword"]) !==false) {
        $errorMessage = "PassNotMatching";
    } elseif (InvalidUser  ($UserName) !== false) {
        $errorMessage = "InvalidUsername";
    } elseif (userExist($conn,$UserName) !== false) {
        $errorMessage = "UsernameTaken";
    } else {
        createUser($conn,$UserName,$Lname,$Fname,$petType,$petName,$password);
        $errorMessage = "none";
    }

    header("location: ../landingpage.php?error=$errorMessage");
    exit();
} else {
    header("location: ../landingpage.php");
    exit();
}
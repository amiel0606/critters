<?php

if (isset($_POST["submit"])) {
    $uName = $_POST["email"];
    $pwd = $_POST["password"];

    require_once('functions.php');
    require_once('../admin/inc/dbCon.php');

    if (emptyInputLogin($uName,$pwd) !== false) {
        header("location: ../landingpage.php?error=EmptyInput");
        exit();
    }

    loginUser($conn, $uName, $pwd);
}
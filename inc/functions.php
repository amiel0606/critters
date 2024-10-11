<?php
function emptyInputSignup($Fname,$Lname,$petType,$UserName,$password) {
    if (empty($Fname) || empty($Lname) || empty($petType) || empty($UserName) || empty($password)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function InvalidUser ($UserName) {
    if (!filter_var($UserName, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function passMatch($password,$ConfPassword) {
    if ($password != $ConfPassword) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function userExist($conn,$UserName) {
    $sql = "SELECT * FROM tbl_users WHERE username = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../landing.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $UserName);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $UserName, $Lname, $Fname, $petType, $petName, $password) {
    mysqli_begin_transaction($conn);

    try {
        $sql = "INSERT INTO tbl_users(username, password, petType, petName, firstName, lastName) VALUES(?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            throw new Exception("Failed to prepare statement");
        }

        $hashedPass = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssssss", $UserName, $hashedPass, $petType, $petName, $Fname, $Lname);
        mysqli_stmt_execute($stmt);
        $userId = mysqli_stmt_insert_id($stmt); 
        mysqli_stmt_close($stmt);

        $sql2 = "INSERT INTO tbl_pets(owner_ID, petType, petName) VALUES(?, ?, ?)";
        $stmt2 = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt2, $sql2)) {
            throw new Exception("Failed to prepare statement");
        }

        mysqli_stmt_bind_param($stmt2, "iss", $userId, $petType, $petName);
        mysqli_stmt_execute($stmt2);
        mysqli_stmt_close($stmt2);

        mysqli_commit($conn);
        header("location: ../landingpage.php?error=none");
        exit();
    } catch (Exception $e) {
        mysqli_rollback($conn);
        header("location: ../landingpage.php?stmtFailed");
        exit();
    }
}

function emptyInputLogin($uName,$pwd) {
    if (empty($uName) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $uName, $pwd) {
    $UserExists = userExist($conn,$uName);

    if ($UserExists == false) {
        header("location: ../landing.php?error=WrongLogin");
        exit();
    }
    $pwdHashed = $UserExists["password"];
    $checkPass = password_verify($pwd, $pwdHashed);

    if ($checkPass === false) {
        header("location: ../landing.php?error=WrongLogin");
        exit();
    }
    else if ($checkPass === true) {
        session_start();
        $_SESSION["id"] = $UserExists["id"]; 
        $_SESSION["username"] = $UserExists["username"];
        $_SESSION["firstName"] = $UserExists["firstName"];
        $_SESSION["lastName"] = $UserExists["lastName"];
        header("Location: ../landingpage.php?login=success"); 

    }
}
<?php
function emptyInputSignup($Fname, $Lname, $email, $password)
{
    if (empty($Fname) || empty($Lname) || empty($email) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function InvalidUser($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function passMatch($password, $ConfPassword)
{
    if ($password != $ConfPassword) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function userExist($conn, $email)
{
    $sql = "SELECT * FROM tbl_users WHERE username = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../landing.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $email, $Lname, $Fname, $password, $contact)
{
    mysqli_begin_transaction($conn);

    try {
        $sql = "INSERT INTO tbl_users(username, password, firstName, lastName, contact) VALUES(?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            throw new Exception("Failed to prepare statement");
        }

        $hashedPass = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "sssss", $email, $hashedPass, $Fname, $Lname, $contact);
        mysqli_stmt_execute($stmt);
        $userId = mysqli_insert_id($conn); // Corrected function to fetch inserted ID
        mysqli_stmt_close($stmt);

        mysqli_commit($conn);
        header("location: ../landingpage.php?error=none");
        exit();
    } catch (Exception $e) {
        mysqli_rollback($conn);
        header("location: ../landingpage.php?stmtFailed");
        exit();
    }
}


function createPet($conn, $owner_id, $petName, $petType, $breed, $birthdate, $gender, $color, $unique, $file)
{
    $defaultImage = '';
    if (empty($file['name'])) {
        if ($petType === 'Cat') {
            $defaultImage = 'cat.png';
        } elseif ($petType === 'Dog') {
            $defaultImage = 'dog.png';
        }
    } else {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($file['type'], $allowedTypes) || $file['size'] > 5000000) { // Limit size to 5MB
            return false;
        }
        $targetDir = "uploads/";
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $imgName = uniqid('', true) . '.' . $fileExtension;
        $targetFilePath = $targetDir . $imgName;
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            $defaultImage = $imgName;
        } else {
            return false;
        }
    }

    $sql = "INSERT INTO tbl_pets(owner_ID, petName, petType, breed, birth_date, gender, color, uniqueness, img) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "issssssss", $owner_id, $petName, $petType, $breed, $birthdate, $gender, $color, $unique, $defaultImage);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}
function emptyInputLogin($uName, $pwd)
{
    if (empty($uName) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $uName, $pwd)
{
    $UserExists = userExist($conn, $uName);

    if ($UserExists == false) {
        header("location: ../landingpage.php?error=WrongLogin");
        exit();
    }
    $pwdHashed = $UserExists["password"];
    $checkPass = password_verify($pwd, $pwdHashed);

    if ($checkPass === false) {
        header("location: ../landingpage.php?error=WrongLogin");
        exit();
    } else if ($checkPass === true) {
        session_start();
        $_SESSION["id"] = $UserExists["id"];
        $_SESSION["username"] = $UserExists["username"];
        $_SESSION["firstName"] = $UserExists["firstName"];
        $_SESSION["lastName"] = $UserExists["lastName"];

        header("Location: ../landingpage.php?login=success");

    }
}
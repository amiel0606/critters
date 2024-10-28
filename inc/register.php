<?php
session_start();

if (isset($_POST["submit"])) {
    $Fname = $_POST["Fname"];
    $Lname = $_POST["Lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $ConfPassword = $_POST["ConfPassword"];
    $inputOtp = $_POST["otp"] ?? null; // Get OTP from the form if present

    require_once 'functions.php';
    require_once '../admin/inc/dbCon.php';

    $errorMessage = "";

    // Check OTP if it is set
    if ($inputOtp !== null) {
        if (!verifyOtp($inputOtp)) {
            $errorMessage = "Invalid or expired OTP.";
        }
    }

    // Proceed with registration if OTP is valid
    if (empty($errorMessage)) {
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
    }

    header("location: ../landingpage.php?error=$errorMessage");
    exit();
} else {
    header("location: ../landingpage.php");
    exit();
}

// Function to verify OTP
function verifyOtp($inputOtp) {
    // Check if OTP and expiry exist in the session
    if (isset($_SESSION['otp']) && isset($_SESSION['otp_expiry'])) {
        // Check if the OTP is still valid
        if (time() < $_SESSION['otp_expiry']) {
            // Compare the input OTP with the stored OTP
            if ($inputOtp == $_SESSION['otp']) {
                // OTP is valid
                unset($_SESSION['otp']); // Clear OTP from session
                unset($_SESSION['otp_expiry']); // Clear expiry from session
                return true;
            }
        } else {
            // OTP has expired
            return false; // OTP expired
        }
    }
    return false; // OTP does not exist
}
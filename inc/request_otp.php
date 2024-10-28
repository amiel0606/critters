<?php
session_start();

require $_SERVER['DOCUMENT_ROOT'] . '/critters/vendor/autoload.php'; // Ensure the path is correct

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendOtp($email) {
    $otp = rand(100000, 999999);
    $_SESSION['otp'] = $otp;
    $_SESSION['otp_expiry'] = time() + 300; // 5 minutes expiry

    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'critters.agrivet@gmail.com'; // Your Gmail address
        $mail->Password = 'amielpogi'; // Your Gmail password or app password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->SMTPDebug = 2; // 0 = off (for production use); 1 = client messages; 2 = client and server messages
        // Recipients
        $mail->setFrom('critters.agrivet@gmail.com', 'Critters');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Your OTP Code';
        $mail->Body = "Your OTP code is: <strong>$otp</strong>"; // Enhanced formatting

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Mail error: " . $mail->ErrorInfo); // Log the PHPMailer error
        return false;
    }
}


// Handle AJAX request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input = json_decode(file_get_contents("php://input"), true);
    $email = filter_var($input['email'], FILTER_VALIDATE_EMAIL);

    if ($email) {
        if (sendOtp($email)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to send OTP.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid email address.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
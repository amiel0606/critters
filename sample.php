<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Load Composer's autoloader

function generateOTP($length = 6) {
    return rand(100000, 999999); // Generates a random 6-digit OTP
}

function sendOTP($email, $otp) {
    $mail = new PHPMailer(true);
    
    try {
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                   
        $mail->SMTPAuth   = true;                                  
        $mail->Username   = 'agrivetcritters@gmail.com';           
        $mail->Password   = 'fvqfnllbbdwltgsw';               
        $mail->SMTPSecure = 'ssl';     
        $mail->Port       = 465;                                   

        $mail->setFrom('agrivetcritters@gmail.com', 'Critters Agrivet');
        $mail->addAddress($email);                                 

        $mail->isHTML(true);                                      
        $mail->Subject = 'Your OTP Code';
        $mail->Body    = "Your OTP code is <b>$otp</b>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    $otp = generateOTP();
    
    $_SESSION['otp'] = $otp;

    if (sendOTP($email, $otp)) {
        echo "OTP sent to your email.";
    } else {
        echo "Failed to send OTP.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Generation</title>
</head>
<body>
    <form method="post">
        <label for="email">Enter your email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Send OTP</button>
    </form>
</body>
</html>
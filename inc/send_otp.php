<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; 

function generateOTP($length = 6) {
    unset($_SESSION['otp']);
    return rand(100000, 999999); 
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

        $mail->setFrom('agrivetcritters@gmail.com', 'Critters Aggrivet');
        $mail->addAddress($email);                                 

        $mail->isHTML(true);                                      
        $mail->Subject = 'Your OTP Code';
        $mail->Body    = "Your OTP code is <b>$otp</b>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $otp = generateOTP();
    
    $_SESSION['otp'] = $otp;

    if (sendOTP($email, $otp)) {
        echo json_encode(['success' => true, 'message' => 'OTP sent to your email.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to send OTP.']);
    }
}
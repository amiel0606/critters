<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php'; 
include_once './dbCon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $appointmentId = isset($_POST['id']) ? intval($_POST['id']) : 0;

    if ($appointmentId > 0) {
        $sql = "SELECT st.*, u.firstName, u.username, s.service_name, s.service_id
                FROM tbl_setappointment st
                INNER JOIN tbl_users u ON st.owner_id = u.id
                INNER JOIN tbl_services s ON st.booking_id = s.service_id
                WHERE st.appointment_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $appointmentId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $appointment = $result->fetch_assoc();
            $email = $appointment['username'];
            $username = $appointment['firstName'];
            $serviceName = $appointment['service_name'];
            $bookingDate = $appointment['booking_date'];
            $bookingTime = $appointment['time'];

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
                $mail->addAddress($email, $username);

                $mail->isHTML(true);
$mail->Subject = 'Appointment Reminder';
$mail->Body = "
    <div style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
        <div style='max-width: 600px; margin: 0 auto; border: 1px solid #ddd; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1);'>
            <div style='background-color: #ff6f61; color: white; padding: 16px; text-align: center;'>
                <h2 style='margin: 0; font-size: 24px;'>Appointment Reminder</h2>
            </div>
            <div style='padding: 24px; background-color: #f9f9f9;'>
                <p style='margin: 0 0 16px;'>Dear <strong>$username</strong>,</p>
                <p style='margin: 0 0 16px;'>This is a friendly reminder for your upcoming appointment:</p>
                <ul style='list-style-type: none; padding: 0; margin: 0;'>
                    <li style='margin-bottom: 8px;'>
                        <strong>Service:</strong> $serviceName
                    </li>
                    <li style='margin-bottom: 8px;'>
                        <strong>Date:</strong> $bookingDate
                    </li>
                    <li style='margin-bottom: 8px;'>
                        <strong>Time:</strong> $bookingTime
                    </li>
                </ul>
                <p style='margin: 16px 0;'>We look forward to serving you!</p>
                <p style='margin: 0;'>Best regards,</p>
                <p style='margin: 0;'><strong>Critters Agrivet Dasmariñas</strong></p>
            </div>
            <div style='background-color: #ff6f61; color: white; padding: 12px; text-align: center; font-size: 12px;'>
                &copy; 2024 Critters Agrivet Dasmariñas. All rights reserved.
            </div>
        </div>
    </div>
";


                $mail->send();

                echo json_encode(['status' => true]);
            } catch (Exception $e) {
                echo json_encode(['status' => false, 'error' => $mail->ErrorInfo]);
            }
        } else {
            echo json_encode(['status' => false, 'error' => 'Appointment not found']);
        }

        $stmt->close();
    } else {
        echo json_encode(['status' => false, 'error' => 'Invalid appointment ID']);
    }
} else {
    echo json_encode(['status' => false, 'error' => 'Invalid request method']);
}

$conn->close();
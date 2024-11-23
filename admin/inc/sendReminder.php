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
                    <p>Dear $username,</p>
                    <p>This is a friendly reminder for your appointment:</p>
                    <ul>
                        <li><strong>Service:</strong> $serviceName</li>
                        <li><strong>Date:</strong> $bookingDate</li>
                        <li><strong>Time:</strong> $bookingTime</li>
                    </ul>
                    <p>We look forward to serving you!</p>
                    <p>Best regards,<br>Critters Agrivet Dasmariñas</p>
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
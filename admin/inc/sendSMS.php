<?php
include_once './dbCon.php'; 
require '../../vendor/autoload.php'; 
include_once './dbCon.php';
use Vonage\Client;
use Vonage\Client\Credentials\Basic;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $appointmentId = isset($_POST['id']) ? intval($_POST['id']) : 0;

    if ($appointmentId > 0) {
        $sql = "SELECT st.*, u.firstName, u.username, u.contact, s.service_name, s.service_id
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
            $username = $appointment['firstName'];
            $serviceName = $appointment['service_name'];
            $bookingDate = $appointment['booking_date'];
            $bookingTime = $appointment['time'];
            $phoneNumber = $appointment['contact'];

            $smsMessage = "Hello $username, this is a reminder for your appointment:\n" .
                          "Service: $serviceName\n" .
                          "Date: $bookingDate\n" .
                          "Time: $bookingTime\n" .
                          "Thank you!";

            $basic = new Basic('086f4c72', 'OUey7NDBrr57MbNm'); 
            $client = new Client($basic);

            try {
                $response = $client->sms()->send(
                    new \Vonage\SMS\Message\SMS($phoneNumber, 'CrittersAgriVet', $smsMessage)
                );

                $message = $response->current();

                if ($message->getStatus() == 0) {
                    echo json_encode(['status' => true, 'message' => 'SMS sent successfully']);
                } else {
                    echo json_encode(['status' => false, 'error' => 'SMS failed: ' . $message->getErrorText()]);
                }
            } catch (Exception $e) {
                echo json_encode(['status' => false, 'error' => $e->getMessage()]);
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

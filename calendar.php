<?php
// require('inc/essentials.php'); 
// adminLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Appointment Calendar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php require('inc/links.php'); ?>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.0/index.global.min.css" rel="stylesheet">

    <style>
        .card {
            padding: 40px; 
            border-radius: 20px; 
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            max-width: 1200px; 
            margin: 0 auto;
        }

        #calendar {
            max-width: 100%;
            margin: 30px auto;
        }

        
        .card-body {
            background-color: #f8f9fa;
        }

        
        button.fc-button {
            background-color: #007bff; 
            color: white;
            border: none;
            padding: 10px;
            margin: 5px;
        }

        button.fc-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body class="bg-light">
<?php
session_start();

if (!isset($_SESSION["id"])) {
    header('Location: landingpage.php?login=notLoggedIn');
    exit;
}

$customerAppointments = [
    [
        'title' => 'Grooming - Bella',
        'start' => '2024-10-15T09:00:00',
    ],

];

require('inc/header.php'); ?>

<div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">Appointment Calendar</h2>
    <div class="h-line bg-dark"></div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 p-4 overflow-hidden">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="text-center py-3 bg-light text-dark">
    <div class="social-icons mb-2">
        <a href="#" class="text-dark"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="text-dark"><i class="fab fa-instagram"></i></a>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.0/index.global.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth', // Month view
            events: <?php echo json_encode($customerAppointments); ?>
        });

        calendar.render();
    });
</script>
</body>

</html>

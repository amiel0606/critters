<?php 
//  require('inc/essentials.php'); 
//  adminLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Appointment Calendar</title>

    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php require('inc/links.php'); ?>
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.0/index.global.min.css" rel="stylesheet">

    <style>
        #calendar {
            max-width: 100%;
            margin: 30px auto;
        }
    </style>
</head>

<body class="bg-light">

    <?php require('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h4 class="mb-4">Appointment Calendar</h4>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <!-- FullCalendar -->
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.0/index.global.min.js"></script>

    <script>
document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth', 
        events: function(fetchInfo, successCallback, failureCallback) {
            $.ajax({
                url: './inc/getAllAppointments.php',
                method: 'POST',
                success: function(data) {
                    var appointments = JSON.parse(data);
                    var events = appointments.map(appointment => ({
                        title: appointment.title,
                        start: appointment.start,
                        description: appointment.name,
                        ownerName: appointment.ownerName,
                        time: appointment.time
                    }));
                    successCallback(events); 
                },
                error: function() {
                    failureCallback([]); 
                }
            });
        }
    });
    
    calendar.render();
});
    </script>
</body>

</html>

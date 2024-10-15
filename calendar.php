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

    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php require('inc/links.php'); ?>
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.0/index.global.min.css" rel="stylesheet">

    <style>
        /* Custom styles to adjust the calendar layout */
        .card {
            padding: 40px; /* Increased padding for consistency with the review form */
            border-radius: 20px; /* Similar rounded corners */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Enhanced shadow for depth */
            max-width: 1200px; /* Center and contain the layout */
            margin: 0 auto;
        }

        #calendar {
            max-width: 100%;
            margin: 30px auto;
        }

        /* Calendar container */
        .card-body {
            background-color: #f8f9fa;
        }

        /* Similar styling to buttons */
        button.fc-button {
            background-color: #007bff; /* Primary color for buttons */
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
                        <!-- FullCalendar -->
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

    <!-- Bootstrap and FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.0/index.global.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth', // Month view
                events: [
                    // 10 appointments for 2024-10-15
                    {
                        title: 'Grooming - Bella',
                        start: '2024-10-15T09:00:00'
                    },
                    {
                        title: 'Vaccination - Max',
                        start: '2024-10-15T10:00:00'
                    },
                    {
                        title: 'Checkup - Charlie',
                        start: '2024-10-15T11:00:00'
                    },
                    {
                        title: 'Surgery - Daisy',
                        start: '2024-10-15T12:00:00'
                    },
                    {
                        title: 'Teeth Cleaning - Lucy',
                        start: '2024-10-15T13:00:00'
                    },
                    {
                        title: 'Grooming - Milo',
                        start: '2024-10-15T14:00:00'
                    },
                    {
                        title: 'Vaccination - Buddy',
                        start: '2024-10-15T15:00:00'
                    },
                    {
                        title: 'Checkup - Rocky',
                        start: '2024-10-15T16:00:00'
                    },
                    {
                        title: 'Surgery - Lola',
                        start: '2024-10-15T17:00:00'
                    },
                    {
                        title: 'Teeth Cleaning - Jack',
                        start: '2024-10-15T18:00:00'
                    },
                    // 10 appointments for 2024-10-16
                    {
                        title: 'Grooming - Bella',
                        start: '2024-10-16T09:00:00'
                    },
                    {
                        title: 'Vaccination - Max',
                        start: '2024-10-16T10:00:00'
                    },
                    {
                        title: 'Checkup - Charlie',
                        start: '2024-10-16T11:00:00'
                    },
                    {
                        title: 'Surgery - Daisy',
                        start: '2024-10-16T12:00:00'
                    },
                    {
                        title: 'Teeth Cleaning - Lucy',
                        start: '2024-10-16T13:00:00'
                    },
                    {
                        title: 'Grooming - Milo',
                        start: '2024-10-16T14:00:00'
                    },
                    {
                        title: 'Vaccination - Buddy',
                        start: '2024-10-16T15:00:00'
                    },
                    {
                        title: 'Checkup - Rocky',
                        start: '2024-10-16T16:00:00'
                    },
                    {
                        title: 'Surgery - Lola',
                        start: '2024-10-16T17:00:00'
                    },
                    {
                        title: 'Teeth Cleaning - Jack',
                        start: '2024-10-16T18:00:00'
                    }
                ]
            });

            calendar.render();
        });
    </script>
</body>

</html>

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
        /* Custom styles to adjust the calendar layout */
        #calendar {
            max-width: 90%;
            margin: 30px auto;
        }
    </style>
</head>

<body class="bg-light">
    <?php require('inc/header.php'); ?>

    <!-- Calendar content -->
    <div class="container p-5">
        <h4>Appointment Calendar</h4>

        <!-- FullCalendar -->
        <div id="calendar"></div>
    </div>

    <!-- Bootstrap and FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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

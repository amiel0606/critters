<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Appointment Calendar</title>

    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.0/index.global.min.css" rel="stylesheet">

    <style>
        /* Custom styles to adjust the calendar layout */
        #calendar {
            max-width: 100%;
            margin: 20px auto;
        }
        .sidebar {
            background-color: #343a40;
            min-height: 100vh;
        }
        .sidebar h5 {
            color: white;
            padding: 15px;
        }
        .sidebar ul {
            list-style: none;
            padding-left: 0;
        }
        .sidebar ul li a {
            color: white;
            padding: 10px;
            display: block;
            text-decoration: none;
        }
        .sidebar ul li a:hover {
            background-color: #495057;
            text-decoration: none;
        }
    </style>
</head>
<body class="bg-light">

<!-- Sidebar -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 sidebar">
            <h5>Admin Panel</h5>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">New Bookings</a></li>
                <li><a href="#">Manage Services</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">Calendar</a></li>
            </ul>
        </div>

        <!-- Calendar content -->
        <div class="col-lg-10 p-4">
            <h4>Appointment Calendar</h4>
            
            <!-- FullCalendar -->
            <div id="calendar"></div>
        </div>
    </div>
</div>

<!-- Bootstrap and FullCalendar JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.0/index.global.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',  // Month view
            events: [
                // Sample events
                {
                    title: 'Grooming - Bella',
                    start: '2024-10-15T10:00:00'
                },
                {
                    title: 'Vaccination - Max',
                    start: '2024-10-16T13:00:00'
                },
                {
                    title: 'Checkup - Charlie',
                    start: '2024-10-18T09:00:00'
                }
            ]
        });

        calendar.render();
    });
</script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Analytics</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <?php require('./inc/links.php'); ?>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f4f6f9;
      color: #333;
    }

    .dashboard-container {
      max-width: 1200px;
      margin: 40px auto;
      padding: 30px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .card {
      border-radius: 10px;
      transition: transform 0.3s ease-in-out;
    }

    .card:hover {
      transform: scale(1.05);
    }

    .card-body {
      padding: 25px;
    }

    .card-title {
      font-weight: 500;
      font-size: 1.2rem;
    }

    .card-text {
      font-size: 2rem;
      font-weight: bold;
    }

    .charts-row {
      display: flex;
      justify-content: space-between;
      gap: 20px;
      margin-top: 30px;
    }

    .chart-box {
      flex: 1;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .chart-container {
      width: 100%;
      height: 300px;
      /* Smaller size */
      margin-top: 20px;
    }

    .side-content {
      display: flex;
      gap: 30px;
      margin-top: 40px;
    }

    .table-responsive {
      flex: 1;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    select.form-select {
      margin-top: 20px;
      font-size: 1rem;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .table th {
      background-color: #007bff;
      color: white;
      text-align: center;
    }

    .table tbody tr:hover {
      background-color: #f1f1f1;
    }

    .btn {
      border-radius: 8px;
      padding: 6px 14px;
      font-size: 0.9rem;
    }

    .btn-success:hover,
    .btn-danger:hover {
      transform: scale(1.05);
    }

    .stat-card {
      background-color: #007bff;
      color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .stat-card .card-body {
      padding: 20px;
    }

    .stat-card .card-title {
      font-size: 1.1rem;
      font-weight: 500;
    }

    .stat-card .card-text {
      font-size: 2rem;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <?php require('inc/header.php'); ?>

  <div class="dashboard-container">
    <h1 class="mb-4">Admin Dashboard</h1>

    <!-- Stats Row -->
    <div class="row">
      <!-- Total Clients Card -->
      <div class="col-md-4 mb-4">
        <div class="card stat-card text-center">
          <div class="card-body">
            <h5 class="card-title">Total Clients</h5>
            <p id="totalClients" class="card-text">0</p>
          </div>
        </div>
      </div>

      <!-- Total Employees Card -->
      <div class="col-md-4 mb-4">
        <div class="card stat-card text-center">
          <div class="card-body">
            <h5 class="card-title">Total Employees</h5>
            <p id="totalEmployees" class="card-text">0</p>
          </div>
        </div>
      </div>

      <!-- Total Appointments Card -->
      <div class="col-md-4 mb-4">
        <div class="card stat-card text-center">
          <div class="card-body">
            <h5 class="card-title">Total Appointments</h5>
            <p id="totalAppointments" class="card-text">0</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Month Selector -->
    <div class="mb-4">
      <label for="monthSelector" class="form-label">Select Month:</label>
      <select id="monthSelector" class="form-select">
        <option value="" selected>Select a month</option>
        <option value="1">January</option>
        <option value="2">February</option>
        <option value="3">March</option>
        <option value="4">April</option>
        <option value="5">May</option>
        <option value="6">June</option>
        <option value="7">July</option>
        <option value="8">August</option>
        <option value="9">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
      </select>
    </div>

    <!-- Analytics Charts Row -->
    <div class="charts-row">
      <!-- Most Booked Services Chart -->
      <div class="chart-box">
        <h4>Most Booked Services</h4>
        <div id="messageContainer"></div>
        <canvas id="serviceChart" width="400" height="400"></canvas>
      </div>

      <!-- Service Booking Overview -->
      <div class="table-responsive">
        <h4>Service Booking Overview</h4>
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th scope="col">Service</th>
              <th scope="col">Bookings</th>
            </tr>
          </thead>
          <tbody id="bookingTableBody"></tbody>
        </table>
      </div>
    </div>

    <!-- Appointment Overview -->
    <div class="table-responsive mt-4">
      <h4>Appointment Overview</h4>
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Pet Name</th>
            <th scope="col">Pet Type</th>
            <th scope="col">Service</th>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody style="text-align: center;" id="appointmentTableBody"></tbody>
      </table>
    </div>
  </div>

  <script>
    $(document).ready(function () {
      function updateAppointmentStatus(appointmentId) {
        $.ajax({
          type: "POST",
          url: "./inc/updateAppointmentStatus.php",
          data: { id: appointmentId, status: 'Completed' },
          dataType: "json",
          success: function (response) {
            if (response.success) {
              alert("Appointment marked as completed.");
              fetchSortedAppointments();
            } else {
              alert("Failed to update appointment status: " + (response.error || "Unknown error"));
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {
            alert("Error occurred while updating appointment status: " + textStatus + " - " + errorThrown);
          }
        });
      }
      let serviceChart;
      const messageContainer = $('#messageContainer');
      const bookingTableBody = $('#bookingTableBody');

      function fetchTopServices(month) {
        $.ajax({
          type: "GET",
          url: "./inc/getTopServices.php",
          data: { month: month },
          dataType: "json",
          success: function (response) {
            console.log(response);
            messageContainer.text('');
            bookingTableBody.empty();

            if (response.length === 0) {
              messageContainer.text("No bookings this month").css("color", "red");
              bookingTableBody.append(`
                          <tr>
                              <td>No Bookings This month</td>
                              <td>0</td>
                          </tr>
                      `);
              if (serviceChart) {
                serviceChart.destroy();
              }
              return;
            } else {
              response.forEach(service => {
                bookingTableBody.append(`
                          <tr>
                              <td>${service.service_name}</td>
                              <td>${service.total_bookings}</td>
                          </tr>
                      `);
              });
            }


            const labels = response.map(service => service.service_name);
            const data = response.map(service => service.total_bookings);
            const ctx = document.getElementById('serviceChart').getContext('2d');

            if (serviceChart) {
              serviceChart.destroy();
            }

            serviceChart = new Chart(ctx, {
              type: 'pie',
              data: {
                labels: labels,
                datasets: [{
                  label: 'Top 3 Most Booked Services',
                  data: data,
                  backgroundColor: [
                    '#007bff',
                    '#28a745',
                    '#ffc107'
                  ],
                  borderColor: '#fff',
                  borderWidth: 1
                }]
              },
              options: {
                responsive: true,
                plugins: {
                  legend: {
                    position: 'top',
                  },
                  tooltip: {
                    callbacks: {
                      label: function (tooltipItem) {
                        return tooltipItem.label + ': ' + tooltipItem.raw + ' bookings';
                      }
                    }
                  }
                }
              }
            });
          },
          error: function (xhr, status, error) {
            console.log("Error fetching top services: ", error);
          }
        });
      }

      $('#monthSelector').change(function () {
        const selectedMonth = $(this).val();
        if (selectedMonth) {
          fetchTopServices(selectedMonth);
        }
      });
      function fetchSortedAppointments() {
        $.ajax({
          url: './inc/getAllAppointments.php',
          method: 'GET',
          dataType: 'json',
          success: function (data) {
            console.log(data);
            
            if (data.length > 0) {
              $.each(data, function (index, appointment) {
                var appointmentElement = `
            <td>${appointment.id}</td>
            <td>${appointment.ownerName}</td>
            <td>${appointment.petName}</td>
            <td>${appointment.petType}</td>
            <td>${appointment.title}</td>
            <td>${appointment.date}</td>
            <td>${appointment.time}</td>
            <td>
              <button class='btn btn-success btn-sm complete-btn' data-id="${appointment.id}">Complete</button>
            </td>
        `;
                $('#appointmentTableBody').append(appointmentElement);
                $('.complete-btn').on('click', function () {
                  const appointmentId = $(this).data('id');
                  updateAppointmentStatus(appointmentId);
                });
              });
            } else {
              var appointmentElement = `
                <td colspan="8">No pending appointment for today.</td> 
              `;
              $('#appointmentTableBody').append(appointmentElement);
            }
          },
          error: function (xhr, status, error) {
            console.error("Error fetching appointments:", error);
            $('#appointmentTableBody').append('<p>An error occurred while fetching appointments.</p>');
          }
        });
      }
      fetchTopServices($('#monthSelector').val());
      fetchSortedAppointments();
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Analytics</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <?php require('./inc/links.php'); ?>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }

    .dashboard-container {
      max-width: 900px;
      margin: 0 auto;
      padding: 20px;
    }

    .chart-container {
      width: 100%;
      height: 400px;
      margin-top: 20px;
    }

    .charts-row {
      display: flex;
      justify-content: space-around;
      gap: 20px;
    }

    .chart-box {
      flex: 1;
      text-align: center;
    }
  </style>
</head>

<body>
  <?php require('inc/header.php'); ?>
  <div class="dashboard-container">
    <h1 class="mb-4">Admin Dashboard</h1>

    <!-- Month Selector -->
    <div class="mb-4">
      <label for="monthSelector" class="form-label">Select Month:</label>
      <select id="monthSelector" class="form-select">
        <option value="" selected>Select a month</option> <!-- Default option -->
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
        <canvas id="serviceChart" class="chart-container"></canvas>
      </div>

      <!-- Month with Most Patients Chart -->
      <!-- <div id="mostPatientsMessageContainer" class="chart-box">
        <h4>Month with the Most Patients</h4>
        <div id="mostPatientsMessageContainer" style="color: red;"></div> 
        <canvas id="mostPatientsChart" class="chart-container"></canvas>
      </div>
    </div> -->

      <!-- Service Ranking Table -->
      <div class="table-responsive mt-4">
        <h4>Service Booking Overview</h4>
        <table class="table table-bordered table-hover">
          <thead class="table-light">
            <tr>
              <th scope="col">Service</th>
              <th scope="col">Bookings</th>
            </tr>
          </thead>
          <tbody id="bookingTableBody"></tbody>
        </table>
      </div>
    </div>
    <div class="table-responsive mt-4">
      <h4>Appointment Overview</h4>
      <table class="table table-bordered table-hover">
        <thead class="table-light">
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
        <tbody id="appointmentTableBody">
          <tr>
            <td>1</td>
            <td>John Doe</td>
            <td>Max</td>
            <td>Dog</td>
            <td>Grooming</td>
            <td>2024-11-15</td>
            <td>10:30 AM</td>
            <td>
              <button class="btn btn-success btn-sm">Complete</button>
              <button class="btn btn-danger btn-sm">Delete</button>
            </td>
          </tr>
        </tbody>

    </div>


    <script>
      $(document).ready(function () {
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
        fetchTopServices($('#monthSelector').val());

        function fetchSortedAppointments() {
          $.ajax({
            type: "GET",
            url: "inc/getAppointments.php",
            dataType: "json",
            success: function (data) {
              var tableBody = $("#appointmentTableBody");
              tableBody.empty();
              $.each(data, function (index, appointment) {
                tableBody.append("<tr>");
                tableBody.append("<td>" + appointment.appointment_id + "</td>");
                tableBody.append("<td>" + appointment.ownerName + "</td>");
                tableBody.append("<td>" + appointment.petName + "</td>");
                tableBody.append("<td>" + appointment.petType + "</td>");
                tableBody.append("<td>" + appointment.service_name + "</td>");
                tableBody.append("<td>" + appointment.booking_date + "</td>");
                tableBody.append("<td>" + appointment.time + "</td>");
                if (appointment.status === "Completed") {
                  tableBody.append("<td>Completed</td>");
                } else {
                  tableBody.append("<button class='btn btn-success btn-sm complete-btn' data-id='" + appointment.appointment_id + "'>Completed</button>");
                }
                tableBody.append("</tr>");
              });
              $('.complete-btn').on('click', function () {
                const appointmentId = $(this).data('id');
                updateAppointmentStatus(appointmentId);
              });
            }
          });
        }

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
        fetchSortedAppointments();
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
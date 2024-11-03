<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Analytics</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <?php require('inc/links.php'); ?>
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
    <select id="monthSelector" class="form-select" onchange="updateAnalytics()">
      <option value="0" selected>January</option>
      <option value="1">February</option>
      <option value="2">March</option>
      <option value="3">April</option>
      <option value="4">May</option>
      <option value="5">June</option>
      <option value="6">July</option>
      <option value="7">August</option>
      <option value="8">September</option>
      <option value="9">October</option>
      <option value="10">November</option>
      <option value="11">December</option>
    </select>
  </div>

  <!-- Analytics Charts Row -->
  <div class="charts-row">
    <!-- Most Booked Services Chart -->
    <div class="chart-box">
      <h4>Most Booked Services</h4>
      <canvas id="serviceChart" class="chart-container"></canvas>
    </div>

    <!-- Month with Most Patients Chart -->
    <div class="chart-box">
      <h4>Month with the Most Patients</h4>
      <canvas id="mostPatientsChart" class="chart-container"></canvas>
    </div>
  </div>

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

<script>
  // Sample data for monthly bookings
  const serviceData = {
    labels: ['Groom', 'Deworming', 'Checkup'],
    monthlyBookings: [
      [120, 150, 80],  // January
      [130, 160, 90],  // February
      [140, 170, 100], // March
      [150, 180, 110], // April
      [160, 190, 120], // May
      [170, 200, 130], // June
      [180, 210, 140], // July
      [190, 220, 150], // August
      [200, 230, 160], // September
      [210, 240, 170], // October
      [220, 250, 180], // November
      [230, 260, 190]  // December
    ],
    monthNames: [
      "January", "February", "March", "April", "May", "June",
      "July", "August", "September", "October", "November", "December"
    ]
  };

  // Initialize Pie Chart for Most Booked Services
  const serviceCtx = document.getElementById('serviceChart').getContext('2d');
  let serviceChart = new Chart(serviceCtx, {
    type: 'pie',
    data: {
      labels: serviceData.labels,
      datasets: [{
        label: 'Bookings',
        data: serviceData.monthlyBookings[0],
        backgroundColor: ['#007bff', '#28a745', '#ffc107'],
        borderColor: '#fff',
        borderWidth: 1
      }]
    }
  });

  // Initialize Pie Chart for Month with Most Patients
  const patientsCtx = document.getElementById('mostPatientsChart').getContext('2d');
  let mostPatientsChart = new Chart(patientsCtx, {
    type: 'pie',
    data: {
      labels: serviceData.monthNames,
      datasets: [{
        label: 'Total Bookings per Month',
        data: serviceData.monthlyBookings.map(month => month.reduce((a, b) => a + b, 0)),
        backgroundColor: [
          '#007bff', '#28a745', '#ffc107', '#dc3545', '#17a2b8', '#6610f2',
          '#e83e8c', '#6f42c1', '#20c997', '#fd7e14', '#6c757d', '#343a40'
        ],
        borderColor: '#fff',
        borderWidth: 1
      }]
    }
  });

  // Update analytics data based on selected month
  function updateAnalytics() {
    const selectedMonth = document.getElementById('monthSelector').value;
    const bookingsForMonth = serviceData.monthlyBookings[selectedMonth];
    
    // Update Most Booked Services chart data
    serviceChart.data.datasets[0].data = bookingsForMonth;
    serviceChart.update();
    
    // Update Service Ranking Table
    const bookingTableBody = document.getElementById('bookingTableBody');
    bookingTableBody.innerHTML = '';

    const sortedBookings = serviceData.labels.map((service, index) => ({
      service: service,
      bookings: bookingsForMonth[index]
    })).sort((a, b) => b.bookings - a.bookings);

    sortedBookings.forEach(entry => {
      const row = `<tr><td>${entry.service}</td><td>${entry.bookings}</td></tr>`;
      bookingTableBody.innerHTML += row;
    });
  }

  // Initial data load
  updateAnalytics();
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

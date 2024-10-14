<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Most Booked Services (Monthly)</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <?php require('inc/links.php'); ?>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .sidebar {
      height: 100%;
      background-color: #343a40;
      padding-top: 20px;
    }
    .sidebar a {
      padding: 10px 15px;
      text-decoration: none;
      font-size: 18px;
      color: white;
      display: block;
    }
    .sidebar a:hover {
      background-color: #007bff;
    }
    .main-content {
      margin-left: 250px;
      padding: 20px;
    }
    .chart-container {
      width: 100%;
      height: 400px;
    }
  </style>
</head>
<body>
<?php require('inc/header.php'); ?>
   
<div class="container-fluid">
  <div class="row">

   

    <!-- Main Content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Admin Dashboard</h1>
      </div>

      <!-- Month Selector -->
      <div class="row mb-4">
        <div class="col-md-4">
          <label for="monthSelector" class="form-label">Select Month:</label>
          <select id="monthSelector" class="form-select" onchange="updateMonthlyData()">
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
      </div>

      <!-- Analytics Section -->
      <div class="row">
        <div class="col-md-12">
          <h4>Most Booked Services (Selected Month)</h4>
          <canvas id="serviceChart" class="chart-container"></canvas>
        </div>
      </div>

      <!-- Table of Bookings -->
      <div class="row mt-5">
        <div class="col-md-12">
          <h4>Service Overview</h4>
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">Service</th>
                <th scope="col">Bookings</th>
              </tr>
            </thead>
            <tbody id="bookingTableBody">
              <!-- Table rows will be dynamically updated based on selected month -->
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>
</div>

<!-- Script for Chart.js and Data Handling -->
<script>
  const serviceData = {
    labels: ['Groom', 'Deworming', 'Checkup',],
    months: [
      [150, 120, 90, 70, 50], 
      [160, 130, 100, 80, 60], 
      [170, 140, 110, 90, 65], 
      [180, 145, 115, 100, 70], 
      [190, 150, 120, 110, 75], 
      [200, 155, 125, 115, 80], 
      [210, 160, 130, 120, 85], 
      [220, 165, 135, 125, 90],
      [230, 170, 140, 130, 95], 
      [240, 175, 145, 135, 100], 
      [250, 180, 150, 140, 105] 
    ]
  };

  // Initialize the chart with January data
  const ctx = document.getElementById('serviceChart').getContext('2d');
  let serviceChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: serviceData.labels,
          datasets: [{
              label: 'Bookings',
              data: serviceData.months[0],
              backgroundColor: [
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(75, 192, 192, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });

  // Function to update chart and table based on the selected month
  function updateMonthlyData() {
      const selectedMonth = document.getElementById('monthSelector').value;
      const newData = serviceData.months[selectedMonth];

      // Update chart data
      serviceChart.data.datasets[0].data = newData;
      serviceChart.update();

      // Update table
      const tableBody = document.getElementById('bookingTableBody');
      tableBody.innerHTML = '';
      serviceData.labels.forEach((service, index) => {
          const row = `<tr><td>${service}</td><td>${newData[index]}</td></tr>`;
          tableBody.innerHTML += row;
      });
  }

  // Initialize table with January data
  updateMonthlyData();
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

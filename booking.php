<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Critters Agrivet - BOOKINGS</title>
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">
<?php
session_start();

if (!isset($_SESSION["id"])) {
    header('Location: landingpage.php?login=notLoggedIn');
    exit;
}

require('inc/header.php');
?>

<div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">BOOKING</h2> 
    <div class="h-line bg-dark"></div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-lg-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                <div class="container-fluid flex-lg-column align-items-stretch">
                    <h4 class="mt-2">Fill Up</h4>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                        <div class="border bg-light p-3 rounded mb-3">
                            <h5 class="mb-3" style="font-size: 18px;">SET APPOINTMENT</h5>
                            <label class="form-label">Select Date</label>
                            <input id="book_date" name="book_date" type="date" class="form-control shadow-none mb-3" required>

                            <!-- Time Slot Selection -->
                            <label class="form-label">Select Time Slot</label>
                            <select id="time_slot" name="time_slot" class="form-control shadow-none mb-3" required>
                                <option value="">Select a Time Slot</option>
                                <option value="9:00 AM - 9:30 AM">9:00 AM - 9:30 AM</option>
                                <option value="9:30 AM - 10:00 AM">9:30 AM - 10:00 AM</option>
                                <option value="10:00 AM - 10:30 AM">10:30 AM - 10:30 AM</option>
                                <option value="10:30 AM - 11:00 AM">10:30 AM - 11:00 AM</option>
                                <option value="11:00 AM - 11:30 AM">11:00 AM - 11:30 PM</option>
                                <option value="11:30 AM - 12:00 PM">11:30 AM - 12:00 PM</option>
                                <option value="1:00 PM - 1:30 PM">1:00 PM - 1:30 PM</option>
                                <option value="1:30 PM - 2:00 PM">1:30 PM - 2:00 PM</option>
                                <option value="2:00 PM - 2:30 PM">2:00 PM - 2:30 PM</option>
                                <option value="2:30 PM - 3:00 PM">2:30 PM - 3:00 PM</option>
                                <option value="3:00 PM - 3:30 PM">3:00 PM - 3:30 PM</option>
                                <option value="3:30 PM - 4:00 PM">3:30 PM - 4:00 PM</option>
                                <option value="4:00 PM - 4:30 PM">4:00 PM - 4:30 PM</option>
                                <option value="4:30 PM - 5:00 PM">4:30 PM - 5:00 PM</option>
                            </select>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        
        <div class="col-lg-9 col-md-12 px-4">
            <div id="services"></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $.ajax({
            type: "GET",
            url: "./admin/inc/getBookings.php",
            dataType: "json",
            success: function(data) {
                var html = "";
                $.each(data, function(index, service) {
                    var categories = service.categories.split(",");
                    var categoryHtml = "";
                    $.each(categories, function(index, category) {
                      categoryHtml += `
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="${category}" id="category_${index}">
                        <label class="form-check-label" for="category_${index}">
                            <span class="offer badge rounded-pill bg-light text-dark text-wrap">${category}</span>
                        </label>
                    </div>
                `;

                    });

                    html += `<div class="card mb-4 border-0 shadow">
                <div class="row g-0 p-3 align-items-center">
                    <div class="col-md-5 mb-lg-0 mb-mb-0 mb-3">
                    <img height=100px width=200px src="./admin/inc/uploads/${service.img}" class="img-fluid rounded">
                    </div>
                    <div class="col-md-3 px-lg-3 px-md-3 px">
                    <h5 class="mb-3">${service.service}</h5>
                    <div class="service-types mb-4">
                        <h6 class="mb-1">Services</h6>
                        ${categoryHtml}
                    </div>
                        <div class="slot mb-4">
                        <h6>Available Slot</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">${service.slot}</span>
                    </div>
                    </div>
                    <div class="col-md-2 text-align-center">
                    <button id="book-btn" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2" data-id="${service.id}">Book Now</button>
                    
                    </div>
                </div>
                </div>`;
                });
                $("#services").html(html);
            }
        });

        $(document).on("click", "#book-btn", function() {
            var id = $(this).data('id');
            var bookDate = $('#book_date').val();
            var timeSlot = $('#time_slot').val();  // Added time slot
            var currentDate = new Date();
            var maxDate = new Date(currentDate.getTime() + 2 * 30 * 24 * 60 * 60 * 1000); 
            var selectedDate = new Date(bookDate);

            if (bookDate === '' || timeSlot === '') {
                alert('Please select both a date and a time slot');
                return;
            }
            if (selectedDate < currentDate) {
                alert('Please select a date that is not in the past');
                return;
            }
            if (selectedDate > maxDate) {
                alert('Please select a date within the next 2 months');
                return;
            }
            
            $.ajax({
                type: "POST",
                url: "./inc/setAppointment.php",
                data: { book_date: bookDate, time_slot: timeSlot, bookingID: id }, // Pass time slot to server
                success: function(data) {
                    console.log(data);
                    alert('Booking was Successful');
                    window.location.reload();
                }
            });
        });
    });
</script>

<?php require('inc/footer.php'); ?>
</body>
</html>

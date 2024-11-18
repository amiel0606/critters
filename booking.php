<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Critters Agrivet - BOOKINGS</title>
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <?php require('inc/links.php'); ?>
</head>
<style>
    body {
        height: auto;
        width: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-color: #FFF0F5;
    }
    .booking-row{
        display: flex;
        flex-direction: row;

    }
    .card{
        background-color: #FFE5EC;
    }
    .navbar{
        background-color: #FFE5EC;
    }
    #app{
        background-color: #FFE5EC;
    }
</style>

<body >

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
        <p>
            Treat your pet to the best care explore our specialized services and book an appointment today to keep them
            happy, healthy, and thriving.
        <p></p>
    </div>

    <div class="container">
        <div class="booking-row">
            <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-lg-0">
                <nav class="navbar navbar-expand-lg navbar-light rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">Fill Up</h4>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                            <div class="border p-3 rounded mb-3" id="app">
                                <h5 class="mb-3" style="font-size: 18px;">SET APPOINTMENT</h5>
                                <label class="form-label">Select Pet</label>
                                <div>
                                    <select name="Pets" id="Pets">
                                        <option value="">Select a Pet</option>
                                    </select>
                                </div>
                                <label class="form-label">Select Date</label>
                                <input id="book_date" name="book_date" type="date" class="form-control shadow-none mb-3"
                                    required>
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
        $(document).ready(function () {
            function fetchBookedTimeSlots() {
                $.ajax({
                    type: "GET",
                    url: "./inc/getBookedTimeslot.php",
                    success: function (response) {
                        const bookedSlots = JSON.parse(response);
                        populateTimeSlots(bookedSlots);
                    },
                    error: function (xhr, status, error) {
                        console.error("Error fetching booked time slots:", error);
                    }
                });
            }
            function populateTimeSlots(bookedSlots) {
                const allTimeSlots = [
                    "9:00 AM - 9:30 AM",
                    "9:30 AM - 10:00 AM",
                    "10:00 AM - 10:30 AM",
                    "10:30 AM - 11:00 AM",
                    "11:00 AM - 11:30 AM",
                    "11:30 AM - 12:00 PM",
                    "1:00 PM - 1:30 PM",
                    "1:30 PM - 2:00 PM",
                    "2:00 PM - 2:30 PM",
                    "2:30 PM - 3:00 PM",
                    "3:00 PM - 3:30 PM",
                    "3:30 PM - 4:00 PM",
                    "4:00 PM - 4:30 PM",
                    "4:30 PM - 5:00 PM"
                ];
                $('#time_slot').empty().append('<option value="">Select a Time Slot</option>');
                allTimeSlots.forEach(function (slot) {
                    if (!bookedSlots.includes(slot)) {
                        $('#time_slot').append(`<option value="${slot}">${slot}</option>`);
                    }
                });
            }
            fetchBookedTimeSlots();
            $.ajax({
                type: "GET",
                url: "./admin/inc/getBookings.php",
                dataType: "json",
                success: function (data) {
                    var html = "";
                    console.log(data);
                    var visibleServices = data.filter(service => service.visibility === "true");
                    $.each(visibleServices, function (index, service) {
                        var category = service.category_name;
                        var serviceImage = service.service_image;
                        var serviceName = service.service_name;
                        var serviceDescription = service.service_description;
                        var servicePrice = service.service_price;
                        var visibility = service.visibility;
                        html += `
                        <div class="card mb-4 border-0 shadow">
                            <div class="row g-0 p-3 align-items-center">
                                <div class="col-md-5 mb-lg-0 mb-mb-0 mb-3">
                                    <img height="300px" width="400px" src="./admin/inc/uploads/${serviceImage}" class="img-fluid rounded" alt="${serviceName}">
                                </div>
                                <div class="col-md-3 px-lg-3 px-md-3 px">
                                    <h5 class="mb-3">${serviceName}</h5>
                                    <div class="service-types mb-4">
                                        <h6 class="mb-1">Category</h6>
                                        <div class="form-check">
                                            <p class="form-check-label" for="category_${index}">
                                                <span class="offer badge rounded-pill bg-light text-dark text-wrap">${category}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="slot mb-4">
                                        <h6>Price per Slot</h6>
                                        <span class="badge rounded-pill bg-light text-dark text-wrap">${servicePrice}</span>
                                    </div>
                                    <div class="description mb-4">
                                        <h6>Description</h6>
                                        <p>${serviceDescription}</p>
                                    </div>
                                </div>
                                <div class="col-md-2 text-align-center">
                                    <button id="book-btn" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2" data-id="${service.service_id}">Book Now</button>
                                </div>
                            </div>
                        </div>`;
                    });
                    $("#services").html(html);
                }
            });
            $.ajax({
                type: "POST",
                url: "./inc/getPets.php",
                data: { owner_id: "<?php echo $_SESSION['id'] ?>" },
                dataType: "json",
                success: function (response) {
                    $("#Pets").empty();
                    if (response.length > 0) {
                        $("#Pets").append('<option value="">Select a Pet</option>');
                        $.each(response, function (index, pet) {
                            var petOption = `<option value="${pet.id}">${pet.name} (${pet.type})</option>`;
                            $("#Pets").append(petOption);
                        });
                    } else {
                        $("#Pets").append('<option value="">No Pet Added yet</option>');
                    }
                    $(document).on("click", "#book-btn", function () {
                        var bookingID = $(this).data('id');
                        var petID = $("#Pets").val();
                        var bookDate = $('#book_date').val();
                        var timeSlot = $('#time_slot').val();
                        var currentDate = new Date();
                        var maxDate = new Date(currentDate.getTime() + 2 * 30 * 24 * 60 * 60 * 1000);
                        var selectedDate = new Date(bookDate);

                        // Check if any field is empty
                        if (bookDate === '' || timeSlot === '' || petID === '') {
                            alert('Please select a pet, date, and time slot');
                            return;
                        }

                        // Check if the selected date is in the past
                        if (selectedDate < currentDate) {
                            alert('Please select a date that is not in the past');
                            return;
                        }

                        // Check if the selected date is today
                        var isToday = selectedDate.toDateString() === currentDate.toDateString();

                        // If the date is today, check if the selected time is in the past
                        if (isToday) {
                            var selectedTime = new Date(selectedDate);
                            var timeParts = timeSlot.split(':');
                            selectedTime.setHours(parseInt(timeParts[0]), parseInt(timeParts[1]), 0);

                            if (selectedTime < currentDate) {
                                alert('Please select a time that is not in the past');
                                return;
                            }
                        }

                        // Check if the selected date is beyond the maximum allowed date
                        if (selectedDate > maxDate) {
                            alert('Please select a date within the next 2 months');
                            return;
                        }

                        // Proceed with the AJAX request
                        $.ajax({
                            type: "POST",
                            url: "./inc/setAppointment.php",
                            data: { book_date: bookDate, time_slot: timeSlot, bookingID: bookingID, pet_id: petID },
                            success: function (response) {
                                const data = JSON.parse(response);
                                if (data.success) {
                                    alert('Booking was successful');
                                    window.location.reload();
                                } else {
                                    alert(data.message);
                                }
                            },
                            error: function (xhr, status, error) {
                                console.log("AJAX error: ", error);
                            }
                        });
                    });
                },
                error: function (xhr, status, error) {
                    console.log("AJAX error: ", error);
                }
            });
        });
    </script>
    <?php require('inc/footer.php'); ?>
</body>

</html>
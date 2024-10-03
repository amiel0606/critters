<?php 
//  require('inc/essentials.php'); 
//  adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Service</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <h4 class="mb-4">SERVICE & OFFERS</h4>

            <!-- Service List -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="card-title m-0">Offer</h5>
                        <!-- Trigger Modal for Service -->
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#service-s">
                            <i class="bi bi-plus-square"></i> Add
                        </button>
                    </div>

                    <div class="table-responsive-md" style="height: 350px; overflow-y: scroll;">
                        <table class="table table-hover border">
                            <thead class="sticky-top">
                                <tr class="bg-dark text-light">
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="service-data">
                                <tr>
                                    <td>1</td>
                                    <td>Nail Clippings</td>
                                    <td><a class='btn btn-sm rounded-pill btn-danger'>Delete</a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>General Wellness</td>
                                    <td><a class='btn btn-sm rounded-pill btn-danger'>Delete</a></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Rabies Vaccine</td>
                                    <td><a class='btn btn-sm rounded-pill btn-danger'>Delete</a></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Tooth Brushing</td>
                                    <td><a class='btn btn-sm rounded-pill btn-danger'>Delete</a></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Vaccination</td>
                                    <td><a class='btn btn-sm rounded-pill btn-danger'>Delete</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Service Modal -->
            <div class="modal fade" id="service-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="./inc/addService.php" method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="serviceModalLabel">Add Offer</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Name</label>
                                    <input type="text" name="offer_name" id="service_name_inp" class="form-control shadow-none" required>
                                    <br>
                                    <input type="file" name="image" id="image" accept="image/png, image/jpeg">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" onclick="resetForm()" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
                                <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



                       <!-- Service List -->
                       <div class="card border-0 shadow-sm mb-4">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h5 class="card-title m-0">Service</h5>
                                    <!-- Trigger Modal for Service -->
                                    <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#offer-s">
                                        <i class="bi bi-plus-square"></i> Add
                                    </button>
                                </div>

                                <div class="table-responsive-md" style="height: 300px; overflow-y: scroll;">
                                    <table class="table table-hover border">
                                        <thead class="sticky-top">
                                            <tr class="bg-dark text-light">
                                                <th scope="col">#</th>
                                                <th scope="col">Icon</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="offers">
                                            <tr>
                                                <td>1</td>
                                                <td><img src="images/features/grooms.png" width="100px"></td>
                                                <td>Groom</td>
                                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis quaerat non nam aperiam exercitationem neque a!</td>
                                                <td><a class='btn btn-sm rounded-pill btn-danger'>Delete</a></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td><img src="images/features/diagnostic-icon.webp" width="100px"></td>
                                                <td>Checkup</td>
                                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis quaerat non nam aperiam exercitationem neque a!</td>
                                                <td><a class='btn btn-sm rounded-pill btn-danger'>Delete</a></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td><img src="images/features/syringe.png" width="100px"></td>
                                                <td>Vaccine</td>
                                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis quaerat non nam aperiam exercitationem neque a!</td>
                                                <td><a class='btn btn-sm rounded-pill btn-danger'>Delete</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <!-- Service MODAL -->
                        <div class="modal fade" id="offer-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="./inc/addOffer.php" method="POST" id="offer_s_form" enctype="multipart/form-data">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="serviceModalLabel">Add Service</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Name</label>
                                                <input type="text" name="offer_name" id="offer_name_inp" class="form-control shadow-none" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Icon</label>
                                                <input type="file" name="image" id="offer_icon_inp" class="form-control shadow-none" accept=".jpg,.jpeg,.png" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Description</label>
                                                <input type="text" name="discription_name" id="discriptionr_name_inp" class="form-control shadow-none" required>
                                            </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" onclick="resetForm()" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
                                            <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
        </div>
    </div>
</div>

<script>
    function resetForm() {
        document.getElementById('service_s_form').reset();
    }

    function resetForm() {
        document.getElementById('offer_s_form').reset();
    }
    $(document).ready(function() {
    $.ajax({
        type: "GET",
        url: "./inc/getOffers.php",
        dataType: "json",
        success: function(data) {
            var html = "";
            $.each(data, function(index, offer) {
                html += "<tr>";
                html += "<td>" + offer.offer_id + "</td>";
                html += "<td><img src='./inc/uploads/" + offer.offer_image + "' height='50px' width='50px'></td>";
                html += "<td>" + offer.offer_name + "</td>";
                html += "<td><a class='btn btn-sm rounded-pill btn-danger delete-btn' data-id='" + offer.offer_id + "'>Delete</a></td>";
                html += "</tr>";
            });
            $("#service-data").html(html);
        }
    });

    $.ajax({
        type: "GET",
        url: "./inc/getService.php", 
        dataType: "json",
        success: function(data) {
            var html = "";
            $.each(data, function(index, row) {
                html += "<tr>";
                html += "<td>" + row.service_id + "</td>";
                html += "<td><img src='./inc/uploads/" + row.service_image + "' height='50px' width='50px'></td>";
                html += "<td>" + row.service_name + "</td>";
                html += "<td>" + row.service_description + "</td>";
                html += "<td><a class='btn btn-sm rounded-pill btn-danger delete-btn' data-id='" + row.service_id + "'>Delete</a></td>";
                html += "</tr>";
            });
            $("#offers").html(html);
        }
    });

        $(document).on("click", ".delete-btn", function() {
            var id = $(this).data("id");
            $.ajax({
                type: "POST",
                url: "./inc/delete_offer.php", 
                data: { id: id },
                success: function() {
                    window.location.reload();
                }
            });
            $.ajax({ 
                type: "POST",
                url: "./inc/deleteService.php", 
                data: { id: id },
                success: function() {
                    window.location.reload();
                    $(this).closest("tr").remove();
                }
            });
        });
    });
</script>

<?php require('inc/scripts.php'); ?>
<script src="scripts/settings.js"></script>

</body>
</html>

<?php 
//  require('inc/essentials.php'); 
//  adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Carousel</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <h4 class="mb-4">CAROUSEL</h4>

            <!-- Carousel -->
            <div class="card border shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="card-title m-0">Image</h5>
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#carousel-s">
                            <i class="bi bi-plus-square"></i> Add
                        </button>
                    </div>

                    <!-- Container for viewing added images -->
                    <div id="image-preview-container" class="mt-3">
                        <h6>Added Images</h6>
                        <div class="row" id="image-preview-row">
                            <!-- Images will be displayed here -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carousel Modal -->
            <div class="modal fade" id="carousel-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form id="carousel_s_form" action="./inc/addCarousel.php" method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Add Image</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Picture</label>
                                    <input type="file" name="img1" id="carousel_picture_inp" class="form-control shadow-none" accept=".jpg,.jpeg,.png" required>
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
            <!-- Container for viewing added images -->
        <div id="image-preview-container" class="mt-3">
            <h6>Added Images</h6>
            <div class="row" id="image-preview-row">
                <!-- Images will be displayed dynamically here -->
            </div>
        </div>

        </div>
    </div>
</div>

<script>
function resetForm() {
    document.getElementById('carousel_s_form').reset();
}

// This function is to preview the image before submission
document.getElementById('carousel_picture_inp').addEventListener('change', function() {
    const imagePreviewRow = document.getElementById('image-preview-row');
    imagePreviewRow.innerHTML = ''; // Clear previous previews

    Array.from(this.files).forEach(file => {
        const reader = new FileReader();
        
        reader.onload = function(event) {
            const imgCol = document.createElement('div');
            imgCol.classList.add('col-6', 'col-md-4', 'mb-2');
            imgCol.innerHTML = `
                <div class="card">
                    <img src="${event.target.result}" class="card-img-top" alt="Preview Image">
                </div>
            `;
            imagePreviewRow.appendChild(imgCol);
        };

        reader.readAsDataURL(file);
    });
});
</script>

<?php require('inc/scripts.php'); ?>
<script src="scripts/settings.js"></script>

</body>
</html>

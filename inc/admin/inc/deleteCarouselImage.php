<?php
// Database connection
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT file_name FROM carousel_images WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $image = mysqli_fetch_assoc($result);

    if ($image) {
        unlink("../uploads/" . $image['file_name']); // Delete file from server

        $deleteQuery = "DELETE FROM carousel_images WHERE id = $id";
        if (mysqli_query($conn, $deleteQuery)) {
            echo "Image deleted successfully.";
        } else {
            echo "Error deleting image.";
        }
    }
}
?>

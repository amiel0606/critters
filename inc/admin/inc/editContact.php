<?php
session_start();
require_once './dbCon.php';

$address = $_POST['address'];
$gmap = $_POST['gmap'];
$pn1 = $_POST['pn1'];
$fb = $_POST['fb'];
$address_link = $_POST['gmap_link'];

$stmt = $conn->prepare("UPDATE tbl_cms SET address = ?, link_address = ?, map = ?, viber = ?, social = ? WHERE cms_id = 1");
$stmt->bind_param("sssss", $address, $address_link, $gmap, $pn1, $fb);

if ($stmt->execute()) {
    echo "
    <script>
        alert('CMS Updated successfully');
        window.location.href = '../settings.php';

    </script>
  ";
} else {
    echo "    
    <script>
          alert('CMS Updated Failed');
          window.location.href = '../settings.php';
  </script>";
}

$stmt->close();
$conn->close();

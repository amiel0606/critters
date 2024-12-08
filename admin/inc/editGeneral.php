<?php
session_start();
require_once './dbCon.php';

$siteTitle = $_POST['site_title'];
$siteAbout = $_POST['site_about'];

$stmt = $conn->prepare("UPDATE tbl_cms SET title = ?, about = ? WHERE cms_id = 1");
$stmt->bind_param("ss", $siteTitle, $siteAbout);

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
mysqli_close($conn);
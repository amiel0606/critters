<?php
require_once './dbCon.php';

$sql = "SELECT * FROM tbl_chatbot";
$result = mysqli_query($conn, $sql);
$questions = array();
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $questions[] = $row;
    }
}
header('Content-Type: application/json');
echo json_encode($questions);
mysqli_close($conn);
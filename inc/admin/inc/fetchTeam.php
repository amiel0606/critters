<?php
include_once './dbCon.php';

$sql = "SELECT * FROM tbl_team";
$result = $conn->query($sql);

$teamData = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $teamData[] = $row;
    }
}

echo json_encode($teamData);

$conn->close();
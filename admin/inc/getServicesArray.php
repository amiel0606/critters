<?php
require_once 'dbCon.php';

function getBothTableData() {
    global $conn;
    $sql = 'SELECT * FROM tbl_services'; 
    $result = $conn->query($sql);
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return json_encode($data);
}

echo getBothTableData(); 
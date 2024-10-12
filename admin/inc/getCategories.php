<?php
require_once 'dbCon.php';

function getCategoriesByServiceId() {
    global $conn;

    if (isset($_POST['service_id'])) {
        $serviceId = intval($_POST['service_id']);

        $sql = 'SELECT * FROM tbl_categories WHERE category_parent = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $serviceId); 
        $stmt->execute();
        $result = $stmt->get_result();

        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        
        $result->free();
        $stmt->close();

        return json_encode($data);
    } else {
        return json_encode([]);
    }
}

echo getCategoriesByServiceId();
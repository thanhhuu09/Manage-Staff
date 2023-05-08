<?php
    require_once ('../connection.php');

    $sql = 'SELECT * 
    FROM requestabsence
    WHERE status = ? AND role = ?
    ORDER BY date DESC';
    
    $status = 'waiting';
    $role = 2;

    $stmt = $dbCon->prepare($sql);
    $stmt->bind_param('si',$status,$role);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = array();
    while ($row = $result->fetch_assoc())
    {
        $data[] = $row;
    }
    echo json_encode(array('status' => true, 'data' => $data));
?>
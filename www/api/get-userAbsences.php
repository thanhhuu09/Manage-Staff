<?php
    session_start();
    require_once ('../connection.php');

    $sql = 'SELECT * 
    FROM requestabsence
    WHERE username = ? AND role = ?
    ORDER BY date DESC';
    
    try{
        $stmt = $dbCon->prepare($sql);
        $stmt->bind_param("si",$_SESSION['user'],$_SESSION['role']);
        $stmt->execute();
        $result = $stmt -> get_result();
    }
    catch(PDOException $ex){
        die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
    }

    $data = array();
    while ($row = $result->fetch_assoc())

    {
        $data[] = $row;
    }

    echo json_encode(array('status' => true, 'data' => $data));
?>
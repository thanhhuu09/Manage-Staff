<?php
    session_start();
    require_once ('../connection.php');
    $sql = 'SELECT * 
    FROM requestabsence
    WHERE status = ? AND role = ? AND department = ?
    ORDER BY date DESC';
    $wait = 'waiting';
    $role = 1;
    try{
        $stmt = $dbCon->prepare($sql);
        //$stmt->execute(array('waiting','1',$_SESSION['department']));
        $stmt->bind_param("sis",$wait,$role, $_SESSION['department']);
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
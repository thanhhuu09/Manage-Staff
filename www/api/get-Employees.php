<?php
    
    require_once ('../connection.php');

    $sql = 'SELECT * FROM account WHERE role != 3';

    try{
        $stmt = $dbCon->prepare($sql);
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
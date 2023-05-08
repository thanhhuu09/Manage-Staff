<?php
    session_start();

    require_once ('../connection.php');
    $department = $_SESSION['department'];
    $role = $_SESSION['role'];

    if ($role === 1){
        try{
            $sql = 'SELECT * FROM task WHERE `department` = ? and `employee` = ?';
            $user = $_SESSION['user'];
            $stmt = $dbCon->prepare($sql);
            $stmt->bind_param("ss", $department, $user);
            $stmt->execute();
            $result = $stmt -> get_result();
        }
        catch(PDOException $ex){
            die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
        }
    }
    else{
        try{
            $sql = 'SELECT * FROM task WHERE `department` = ?';
            $stmt = $dbCon->prepare($sql);
            $stmt->bind_param("s", $department);
            $stmt->execute();
            $result = $stmt -> get_result();
        }
        catch(PDOException $ex){
            die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
        }
    }

    $data = array();
    while ($row = $result->fetch_assoc())
    {
        $data[] = $row;
    }

    echo json_encode(array('status' => true, 'data' => $data));
?>
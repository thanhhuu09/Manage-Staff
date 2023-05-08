<?php
    session_start();
    header(header: 'Content-Type: application/json; charset=utf-8');
    require_once ('../connection.php');

    if ($_SERVER['REQUEST_METHOD'] != 'GET') {
        http_response_code(response_code:405);
        die(json_encode(array('code' => 4, 'message' => 'This API only supports GET')));
    }

    $department = $_SESSION['department'];

    $sql = 'SELECT username, name FROM account where department = ?';

    try{
        $stmt = $dbCon->prepare($sql);
        $stmt->bind_param("s", $department);
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

    echo json_encode(array('status' => true, 'data' => $data, 'department' =>$department));

?>
<?php
    header(header: 'Content-Type: application/json; charset=utf-8');
    require_once ('../connection.php');

    if ($_SERVER['REQUEST_METHOD'] != 'GET') {
        http_response_code(response_code:405);
        die(json_encode(array('code' => 4, 'message' => 'This API only supports GET')));
    }

    if (!isset($_GET['id']) ) {
        die(json_encode(array('code' => 1, 'message' => 'Parameters not valid')));
    }
      
    $id = $_GET['id'];

    $sql = 'SELECT * FROM requestabsence WHERE id = ?';

    try{
        $stmt = $dbCon->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result = $stmt -> get_result();
        $data = $result->fetch_assoc();
        die(json_encode(array('code' => 0, 'data' => $data)));
    }
    catch(PDOException $ex){
        die(json_encode(array('code' => 1, 'message' => $ex->getMessage())));
    }


?>